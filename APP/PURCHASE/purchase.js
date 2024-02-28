let cont = 0;
const $itemcolumn = $('tbody');

$(document).ready(function () {
    $("#btnform").hide()
    $("#mainbuy").hide()
    $("#content1").hide()

    $('#buys').click(function (e) { 
        e.preventDefault();
        $("#mainpurchase").hide()
        $("#mainbuy").show()
    });

    $('#back').click(function (e) { 
        e.preventDefault();
        $("#mainbuy").hide()
        $("#mainpurchase").show()
        
    });

    $('#pluspurv').click(function (e) { 
        e.preventDefault();
        $('#contentact').modal('show');	
        //taxTable()
        
    });

    $('#optbuy1').click(function (e) { 
        e.preventDefault();
        $("#demo").hide()
        $("#content1").show()
        $("#btnform").show()
    });

    $('#clean').click(function (e) { 
        e.preventDefault();
        $('#formpurch').get(0).reset();
        $('#tablepurch tbody').empty();
        wipeData();
    });

    purtable = $('#purtable').DataTable({  
        //"pageLength": 50,
        "ajax":{            
            "url": "../PURVEYOR/purveyor_controller.php?op=enlist", 
            "method": 'POST', //usamos el metodo POST
            "dataSrc":""
        },
        "columns":[
            {"data": "CodPurv"},
            {"data": "DescriPurv"},
            {"data": "CodPurv1"},
        ],
    });

    storetable = $('#storetable').DataTable({  
        //"pageLength": 50,
        "ajax":{            
            "url": "../STORE/store_controller.php?op=enlist", 
            "method": 'POST', //usamos el metodo POST
            "dataSrc":""
        },
        "columns":[
            {"data": "CodStore"},
            {"data": "DescripStore"},
        ],
    });

    acttable = $('#acttable').DataTable({  
        //"pageLength": 50,
        "ajax":{            
            "url": "../SUPPLIES/supplies_controller.php?op=enlist", 
            "method": 'POST', //usamos el metodo POST
            "dataSrc":""
        },
        "columns":[
            {"data": "CodAct"},
            {"data": "DescripAct"},
            {"data": "RefeAct"},
        ],
    });

    $('#purtable tbody').on('click', 'tr', function () {
        
        data = purtable.row( this ).data();
        codpurv = data['CodPurv'];
        $.ajax({
            url: "../PURVEYOR/purveyor_controller.php?op=loaddata",
            method: "POST",
            dataType: "json",
            data:  {codpurv:codpurv},
            success: function (data) {
                //console.log(data)
                wipeData()
                $.each(data, function(idx, opt) {
                    //se itera con each para llenar el select en la vista
                    $("#codpurv2").val(opt.CodPurv1);
                    $("#descripurv2").text(opt.DescriPurv);
                    $('#contentpurv').modal('hide');
                }); 
            }
        });
    });

    $('#storetable tbody').on('click', 'tr', function () {
        
        data = storetable.row( this ).data();
        codstore = data['CodStore'];
        $.ajax({
            url: "../STORE/store_controller.php?op=loaddata",
            method: "POST",
            dataType: "json",
            data:  {codstore:codstore},
            success: function (data) {
                //console.log(data)
                wipeData()
                $.each(data, function(idx, opt) {
                    //se itera con each para llenar el select en la vista
                    $("#codstore").val(opt.CodStore);
                    $("#descripstore").text(opt.DescripStore);
                    $('#contentstore').modal('hide');
                }); 
            }
        });
    });

    $('#acttable tbody').on('click', 'tr', function () {
        //Disable Input Data
        $( "#descripact" ).prop( "disabled", true );
        $( "#refeact" ).prop( "disabled", true );
        $( "#codtund" ).prop( "disabled", true );
        $( "#costact" ).prop( "disabled", true );

        data = acttable.row( this ).data();
        codact = data['CodAct'];
        $.ajax({
            url: "../SUPPLIES/supplies_controller.php?op=loaddata",
            method: "POST",
            dataType: "json",
            data:  {codact:codact},
            success: function (data) {
                //console.log(data)
                wipeData()
                $.each(data, function(idx, opt) {
                    cont++;
                    const numero = $itemcolumn.children().length + 1;
                    const html = `
                    <tr name="ncolumn">
                        <td><input type="hidden" id="codact${numero}" value=`+opt.CodAct+`></td>
                        <td><input type="text" class="form-control" style="width : 135px;" id="refeact${numero}" value=`+opt.RefeAct+` disabled></td>
                        <td><input type="text" class="form-control" style="width : 280px;" id="descripact${numero}" value=`+opt.DescripAct+`  disabled></td>
                        <td><input type="number" class="form-control" style="width : 60px;" id="countact${numero}" value="1"></td>
                        <td><input type="text" class="form-control" style="width : 60px;" id="codtund${numero}" value=`+opt.CodTUnd+` disabled></td>
                        <td><input type="number" class="form-control" style="width : 80px;" id="costact${numero}" value=`+opt.CostAct+` disabled></td>
                        <td><input type="number" class="form-control" style="width : 100px;" id="costacttotal${numero}" value=`+opt.CostAct+` disabled></td> 
                        <td><button id="delcol" type="button" class="btn btn-danger"><i class="bi bi-x-circle"></i></button></td>  
                    </tr>`;
                    $itemcolumn.append(html);
        
                    $('#contentact').modal('hide');
                    taxTable()
                    $(document).on("change", "#countact" + (numero), function () {
                        costact  = $("#costact" + (numero)).val();
                        countact = $("#countact" + (numero)).val();
                        $("#costacttotal" + (numero)).val((costact*countact).toFixed(2));
                        taxTable()
                    });
                }); 
                	
            }
        });
    });

    $('#formpurch').submit(function (e) { 
        e.preventDefault();

        codpurv2    = $.trim($('#codpurv2').val());
        codstore   = $.trim($('#codstore').val());
        codpurch    = $.trim($('#codpurch').val());
        datepurch   = $.trim($('#datepurch').val());

        console.log(codpurv2+' '+codstore+' '+codpurch+' '+datepurch)
        
        
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
                url: "../PURVEYOR/purveyor_controller.php?op=savedata",
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

                        $('#createpurv').modal('hide');
                        wipeData()

                        setTimeout(() => {
                            purtable.ajax.reload(null, false);
                          }, 1000);                        
                    } 

                 
                }
        
              });

        }
        
    });

    $(document).on("click", "#codpurv2", function () {
        $('#contentpurv').modal('show');	
    });

    $(document).on("click", "#codstore", function () {
        $('#contentstore').modal('show');	
    });

    $(document).on("click", "#newpurv", function () {
        $('#createpurv').modal('show');	
    });

    $(document).on("click", "#delcol", function () {
        var column = $(this).closest('tr')
        column.remove();
        wipeData()
        taxTable()
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

    $('#stotal').val("");
    $('#tax').val("");
    $('#total').val("");
    $('#subtotal').text("");
    $('#iva').text("");
    $('#tota').text("");
    $('#descripurv2').text("");
    $('#descripstore').text("");
    $("#tcount").val("");
    $("#tcountt").text("");
}


function taxTable() {
    let data_suplies = [];
    let data_amounts = [];
    var suplies = 0;
    var amounts = 0;
    var ncolumn = document.getElementsByName("ncolumn");
    var ndata = ncolumn.length;
    for (var i = 0; i < ndata; i++) {

        
        amounts = $("#countact" + (i + 1)).val();
        suplies = $("#codact" + (i + 1)).val();
        data_suplies.push(suplies);
        data_amounts.push(amounts)
        //console.log('prod: '+data_suplies+' cant: '+data_amounts)
            
        $.ajax({
            url: "../SUPPLIES/supplies_controller.php?op=dataglobal",
            method: "POST",
            dataType: "json",
            data: {codact:data_suplies,countact:data_amounts},
            success: function (data) {

                console.log(data)
                $.each(data, function(idx, opt) {
                    $("#stotal").val(opt.subt);
                    $("#subtotal").text(opt.subt);
                    $("#tax").val(opt.iva);
                    $("#iva").text(opt.iva);
                    $("#total").val(opt.total);
                    $("#tota").text(opt.total);
                    $("#tcount").val(opt.cantidad);
                    $("#tcountt").text(opt.cantidad);
                });
                //data_suplies.pop();
                //data_amounts.pop();
                //console.log('prod: '+data_suplies+' cant: '+data_amounts)
            }
        });
      }
      
    
    
}
                                                
