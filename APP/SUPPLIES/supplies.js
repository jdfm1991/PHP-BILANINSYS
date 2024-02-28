
$(document).ready(function () {
    $("#save").hide()
    $( "#trash" ).prop( "disabled", true );

    acttable = $('#acttable').DataTable({  
        //"pageLength": 50,
        "ajax":{            
            "url": "supplies_controller.php?op=enlist", 
            "method": 'POST', //usamos el metodo POST
            "dataSrc":""
        },
        "columns":[
            {"data": "CodAct"},
            {"data": "DescripAct"},
            {"data": "RefeAct"},
        ],
    });

    $('#acttable tbody').on('click', 'tr', function () {
        //Disable Input Data
        $( "#descripact" ).prop( "disabled", true );
        $( "#refeact" ).prop( "disabled", true );
        $( "#codcact" ).prop( "disabled", true );
        $( "#codtact" ).prop( "disabled", true );
        $( "#codtund" ).prop( "disabled", true );
        $( "#brandact" ).prop( "disabled", false );
        $( "#taxtype" ).prop( "disabled", false );
        $( "#actact" ).prop( "disabled", false );
        $( "#curcost" ).prop( "disabled", true );
        $( "#precost" ).prop( "disabled", true );
        $( "#avecost" ).prop( "disabled", true );
        $( "#exempt" ).prop( "disabled", true );

        //Enable button 
        $( "#new" ).prop( "disabled", false );
        $( "#edit" ).prop( "disabled", false );
        $( "#trash" ).prop( "disabled", false );
        $("#save").hide()

        $("#opt1").addClass("show");
        $("#demo").hide();
        data = acttable.row( this ).data();
        codact = data['CodAct'];
        $.ajax({
            url: "supplies_controller.php?op=loaddata",
            method: "POST",
            dataType: "json",
            data:  {codact:codact},
            success: function (data) {
                //console.log(data)
                wipeData()
                $.each(data, function(idx, opt) {
                    //se itera con each para llenar el select en la vista
                    $("#datecreate").text(opt.DateCreate);
                    $("#codact").val(opt.CodAct);
                    $("#descripact").val(opt.DescripAct);
                    $("#refeact").val(opt.RefeAct);
                    $("#codcact").val(opt.CodCAct);
                    $("#codtact").val(opt.CodTAct);
                    $("#codtund").val(opt.CodTUnd);
                }); 
            }
        });
    });

    $("#new").click(function (e) { 
        e.preventDefault();
        wipeData()
        $("#opt1").addClass("show");
        $("#opt2").removeClass("show");
        $("#opt3").removeClass("show");
        $("#demo").hide();
        $("#save").show()

        //Disable button 
        $( "#new" ).prop( "disabled", true );
        $( "#edit" ).prop( "disabled", true );
        $( "#trash" ).prop( "disabled", true );
        //Enable Input Data
        $( "#descripact" ).prop( "disabled", false );
        $( "#refeact" ).prop( "disabled", false );
        $( "#codcact" ).prop( "disabled", false );
        $( "#codtact" ).prop( "disabled", false );
        $( "#codtund" ).prop( "disabled", false );
        $( "#brandact" ).prop( "disabled", false );
        $( "#taxtype" ).prop( "disabled", false );
        $( "#actact" ).prop( "disabled", false );
        $( "#curcost" ).prop( "disabled", false );
        $( "#precost" ).prop( "disabled", false );
        $( "#avecost" ).prop( "disabled", false );
        $( "#exempt" ).prop( "disabled", false );
        
        
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
        $( "#descripact" ).prop( "disabled", false );
        $( "#refeact" ).prop( "disabled", false );
        $( "#codcact" ).prop( "disabled", false );
        $( "#codtact" ).prop( "disabled", false );
        $( "#codtund" ).prop( "disabled", false );
        $( "#brandact" ).prop( "disabled", false );
        $( "#taxtype" ).prop( "disabled", false );
        $( "#actact" ).prop( "disabled", false );
        $( "#curcost" ).prop( "disabled", false );
        $( "#precost" ).prop( "disabled", false );
        $( "#avecost" ).prop( "disabled", false );
        $( "#exempt" ).prop( "disabled", false );
        
    });

    $('#trash').click(function (e) { 
        e.preventDefault();

        codact      = $.trim($('#codact').val());
        descripact  = $.trim($('#descripact').val());
        Swal.fire({
            title: '¿Estas estas seguro de esto?',
            text: "Se eliminara el registro de "+descripact+"!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, lo borrare!'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "supplies_controller.php?op=deletedata",
                    type: "POST",
                    dataType:"json",    
                    data:  {codact:codact},
                    success: function(data) {
                      if (data.status == 'Eliminar') {
                        Swal.fire(
                            '¡Borrado!',
                            'El articulo se borro exitosamente',
                            'success'
                          )
                                  
                        setTimeout(() => {
                            acttable.ajax.reload(null, false);
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

    $('#formactv').submit(function (e) { 
        e.preventDefault();
        
        codact      = $.trim($('#codact').val());
        descripact  = $.trim($('#descripact').val());
        refeact     = $.trim($('#refeact').val());
        codcact     = $.trim($('#codcact').val());
        codtact     = $.trim($('#codtact').val());
        codtund     = $.trim($('#codtund').val());

        if (codcact == '-'||codtact == '-'||codtund == '-') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: '<h2>¡Al parecer ocurrio un error!</h2><br><h4>Verifique que todos los campos esten llenos</h4>',
            })
            
        }else{
            var datos = new FormData();

            datos.append('codact', codact)
            datos.append('descripact', descripact)
            datos.append('refeact', refeact)
            datos.append('codcact', codcact)
            datos.append('codtact', codtact)
            datos.append('codtund', codtund)

            $.ajax({
                url: "supplies_controller.php?op=savedata",
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
                            acttable.ajax.reload(null, false);
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
                            acttable.ajax.reload(null, false);
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
    
    $('#curcost').change(function (e) { 
        e.preventDefault();
        
        
    });

    
});

function wipeData() {
    $("#codact").val("");
    $('#descripact').val("");
    $("#refeact").val("");
    $('#codcact').val("-");
    $("#codtact").val("-");
    $('#codtund').val("-");
    $("#costact").val("");
    $('#exempt').val("");
    //$('#datecreate').text("");
}

function getcategory() {
    $.ajax({
        url: "supplies_controller.php?op=getcategory",
        method: "POST",
        dataType: "json",
        success: function (data) {
            $.each(data, function(idx, opt) {
                $('#codcact').append('<option name="" value="' + opt.CodCAct +'">' + opt.DescripCAct + '</option>');
            }); 
        }
    }); 
}

function gettunid() {
    $.ajax({
        url: "supplies_controller.php?op=gettunid",
        method: "POST",
        dataType: "json",
        success: function (data) {
            $.each(data, function(idx, opt) {
                $('#codtund').append('<option name="" value="' + opt.CodTUnd +'">' + opt.DescripTUnd + '</option>');
            }); 
        }
    }); 
}

function gettype() {
    $.ajax({
        url: "supplies_controller.php?op=gettype",
        method: "POST",
        dataType: "json",
        success: function (data) {
            $.each(data, function(idx, opt) {
                $('#codtact').append('<option name="" value="' + opt.CodTAct +'">' + opt.DescripTAct + '</option>');
            }); 
        }
    });
}

getcategory()
gettunid()
gettype()