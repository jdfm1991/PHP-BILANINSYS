$(document).ready(function () {
    $("#save").hide()
    $("#trash" ).prop( "disabled", true );

    purtable = $('#purtable').DataTable({  
        //"pageLength": 50,
        "ajax":{            
            "url": "purveyor_controller.php?op=enlist", 
            "method": 'POST', //usamos el metodo POST
            "dataSrc":""
        },
        "columns":[
            {"data": "CodPurv"},
            {"data": "DescriPurv"},
            {"data": "CodPurv1"},
        ],
    });

    $('#purtable tbody').on('click', 'tr', function () {
        //Disable Input Data
        $( "#codpurv" ).prop( "disabled", true );
        $( "#statpurv" ).prop( "disabled", true );
        $( "#typpurv" ).prop( "disabled", true );
        $( "#typcpurv" ).prop( "disabled", true );
        $( "#descripurv" ).prop( "disabled", true );
        $( "#codpurv1" ).prop( "disabled", true );
        $( "#codlaepurv" ).prop( "disabled", true );
        $( "#addrespurv" ).prop( "disabled", true );
        $( "#phonepurv" ).prop( "disabled", true );
        $( "#emailpurv" ).prop( "disabled", true );

        //Enable button 
        $( "#new" ).prop( "disabled", false );
        $( "#edit" ).prop( "disabled", false );
        $( "#trash" ).prop( "disabled", false );
        $("#save").hide()

        $("#opt1").addClass("show");
        $("#demo").hide();
        data = purtable.row( this ).data();
        codpurv = data['CodPurv'];
        $.ajax({
            url: "purveyor_controller.php?op=loaddata",
            method: "POST",
            dataType: "json",
            data:  {codpurv:codpurv},
            success: function (data) {
                //console.log(data)
                wipeData()
                $.each(data, function(idx, opt) {
                    //se itera con each para llenar el select en la vista
                    $("#datecreate").text(opt.DateCreate);
                    $("#codpurv").val(opt.CodPurv);
                    $("#statpurv").val(opt.StatPurv);
                    $("#typpurv").val(opt.TypPurv);
                    $("#typcpurv").val(opt.TypCPurv);
                    $("#descripurv").val(opt.DescriPurv);
                    $("#codpurv1").val(opt.CodPurv1);
                    $("#codlaepurv").val(opt.CodLAEPurv);
                    $("#addrespurv").val(opt.AddresPurv);
                    $("#phonepurv").val(opt.PhonePurv);
                    $("#emailpurv").val(opt.EmailPurv);
                }); 
            }
        });
    });

    $("#new").click(function (e) { 
        e.preventDefault();
        wipeData()
        $("#opt1").addClass("show");
        $("#demo").hide();
        $("#save").show()

        //Disable button 
        $( "#new" ).prop( "disabled", true );
        $( "#edit" ).prop( "disabled", true );
        $( "#trash" ).prop( "disabled", true );
        //Enable Input Data
        $( "#statpurv" ).prop( "disabled", false );
        $( "#typpurv" ).prop( "disabled", false );
        $( "#typcpurv" ).prop( "disabled", false );
        $( "#descripurv" ).prop( "disabled", false );
        $( "#codpurv1" ).prop( "disabled", false );
        $( "#codlaepurv" ).prop( "disabled", false );
        $( "#addrespurv" ).prop( "disabled", false );
        $( "#phonepurv" ).prop( "disabled", false );
        $( "#emailpurv" ).prop( "disabled", false );        
    });

    $("#edit").click(function (e) { 
        e.preventDefault();
        $("#demo").hide();
        $("#save").show()

        //Disable button 
        $( "#new" ).prop( "disabled", true );
        $( "#edit" ).prop( "disabled", true );
        $( "#trash" ).prop( "disabled", true );
        //Enable Input Data
        $( "#statpurv" ).prop( "disabled", false );
        $( "#typpurv" ).prop( "disabled", false );
        $( "#typcpurv" ).prop( "disabled", false );
        $( "#descripurv" ).prop( "disabled", false );
        $( "#codpurv1" ).prop( "disabled", false );
        $( "#codlaepurv" ).prop( "disabled", false );
        $( "#addrespurv" ).prop( "disabled", false );
        $( "#phonepurv" ).prop( "disabled", false );
        $( "#emailpurv" ).prop( "disabled", false ); 
        
    });

    $('#trash').click(function (e) { 
        e.preventDefault();

        codpurv      = $.trim($('#codpurv').val());
        descripurv  = $.trim($('#descripurv').val());
        Swal.fire({
            title: '¿Estas estas seguro de esto?',
            text: "Se eliminara el registro de "+descripurv+"!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, lo borrare!'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "purveyor_controller.php?op=deletedata",
                    type: "POST",
                    dataType:"json",    
                    data:  {codpurv:codpurv},
                    success: function(data) {
                      if (data.status == 'Eliminar') {
                        Swal.fire(
                            '¡Borrado!',
                            'El articulo se borro exitosamente',
                            'success'
                          )
                                  
                        setTimeout(() => {
                            purtable.ajax.reload(null, false);
                        }, 1000);
          
                      } else {
                        Swal.fire("¡Error eliminar articulo!", {
                          buttons: false,
                          icon: "error",
                          timer: 1000,
                          
                        });
                      }
                                          
                      }
                  });
             
            }
          })
        
    });

    $('#formpurv').submit(function (e) { 
        e.preventDefault();
        
        codpurv    = $.trim($('#codpurv').val());
        statpurv   = $.trim($('#statpurv').val());
        typpurv    = $.trim($('#typpurv').val());
        typcpurv   = $.trim($('#typcpurv').val());
        descripurv = $.trim($('#descripurv').val());
        codpurv1   = $.trim($('#codpurv1').val());
        codlaepurv = $.trim($('#codlaepurv').val());
        addrespurv = $.trim($('#addrespurv').val());
        phonepurv  = $.trim($('#phonepurv').val());
        emailpurv  = $.trim($('#emailpurv').val());

        if (statpurv == '-'||typpurv == '-'||typcpurv == '-') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: '<h2>¡Al parecer ocurrio un error!</h2><br><h4>Verifique que todos los campos esten llenos</h4>',
            })
            
        }else{
            var datos = new FormData();

            datos.append('codpurv', codpurv)
            datos.append('statpurv', statpurv)
            datos.append('typpurv', typpurv)
            datos.append('typcpurv', typcpurv)
            datos.append('descripurv', descripurv)
            datos.append('codpurv1', codpurv1)
            datos.append('codlaepurv', codlaepurv)
            datos.append('addrespurv', addrespurv)
            datos.append('phonepurv', phonepurv)
            datos.append('emailpurv', emailpurv)

            $.ajax({
                url: "purveyor_controller.php?op=savedata",
                type: "POST",
                dataType:"json",    
                data:  datos,
                cache: false,
                contentType: false,
                processData: false, 
                error : function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        html: '<h2>¡Al parecer ocurrio un error!</h2><br><h4>Al tratar de Guardar la infomacion la informacion</h4>',
                      })
                }, 
                success: function(data) {
                    console.log(data.status)
                    if (data.status == 'Guardar') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Se ha Guardado exitosamente la infomacion',
                            showConfirmButton: false,
                            timer: 1000
                        })

                        wipeData()

                        setTimeout(() => {
                            purtable.ajax.reload(null, false);
                          }, 1000);                        
                    } 

                    if (data.status == 'Actualizar') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Se ha actualizado exitosamente la infomacion',
                            showConfirmButton: false,
                            timer: 1000
                        })

                        wipeData()

                        setTimeout(() => {
                            purtable.ajax.reload(null, false);
                          }, 1000);                        
                    } 
                 
                }
        
              });

        }
        
    });

    $('#btnopt1').click(function (e) { 
        e.preventDefault();
        $("#demo").hide()
    });
    $('#btnopt2').click(function (e) { 
        e.preventDefault();
        $("#demo").hide()
    });
    $('#btnopt3').click(function (e) { 
        e.preventDefault();
        $("#demo").hide()
    });

});

function wipeData() {
    $("#codpurv").val("");
    $('#statpurv').val("-");
    $("#typpurv").val("-");
    $('#typcpurv').val("-");
    $("#descripurv").val("");
    $('#codpurv1').val("");
    $("#codlaepurv").val("");
    $('#addrespurv').val("");
    $('#phonepurv').val("");
    $('#emailpurv').val("");
}
