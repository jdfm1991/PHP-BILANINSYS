$(document).ready(function () {
    $("#save").hide()
    $( "#trash" ).prop( "disabled", true );

    menutable = $('#menutable').DataTable({  
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

    $('#menutable tbody').on('click', 'tr', function () {
        //Disable Input Data
        $( "#namemenu" ).prop( "disabled", true );
        $( "#scrpostnmenu" ).prop( "disabled", true );
        $( "#fathmenu" ).prop( "disabled", true );


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
        $( "#costact" ).prop( "disabled", false );
        $( "#exempt" ).prop( "disabled", false );
        
    });
});