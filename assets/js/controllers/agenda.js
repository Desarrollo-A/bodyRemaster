    sp = { 
        initFormExtendedDatetimepickers: function () {
            $('.datepicker').datetimepicker({
                format: 'DD/MM/YYYY hh:mm:ss',
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove',
                    inline: true
                }
            });
        }
    }

    $(document).ready(function() {
        sp.initFormExtendedDatetimepickers();
        $('.datepicker').datetimepicker({locale: 'es'});
    });
    
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            longPressDelay: 0,
            headerToolbar: {
                start: 'prev next today',
                center: 'title',
                end:   'timeGridDay timeGridWeek dayGridMonth',
            },
            timeZone: 'none',
            locale: 'es',
            initialView: 'dayGridMonth',
            allDaySlot: false,
            weekends: true,
            height: 'auto',
            selectable: true,
            dateClick: function(info) {
                /*alert('Clicked on: ' + info.dateStr);*/
                const fechaInicio = moment(info.dateStr).format('DD/MM/YYYY hh:mm:ss');
                //console.log(fechaInicio);
                document.getElementById("dateStart").value = fechaInicio;
                document.getElementById("dateEnd").value = fechaInicio;

                $("#myModalCitaAgendada").modal("show");
            }
        });
        calendar.render();
    });


    $(".myselect").select2();
    $("#idCliente").ready(function(){
        $('#loader').removeClass('hidden');
        $("#idCliente").append('<option value="">Seleccione un cliente</option>');
        $.getJSON("Clientes/get_clientes").done(function(data){
            $.each(data, function(i, v){
                $("#idCliente").append('<option value="'+v.id_cliente+'" data-value="'+v.id_cliente+'">'+v.nombre+'</option>');
            });
            $('#loader').addClass('hidden');
        });
    });

    $(".serviciosMultiSelect").select2();
    $("#idCliente").change(function() {
        $('#loader').removeClass('hidden');
        var combo = $('#idCliente').val();
        var id_cliente = $('#idCliente').val();
        var element = $('#idCliente').find('option:selected');
        $.getJSON("Clientes/get_areas_clientes/"+id_cliente).done(function(data){
                $.each(data, function(i, v){
                    if(v.tipo == '1'){
                        $(".option-group-d").append('<option value="'+v.id_area+'" data-duracion="'+v.duracion+'" data-tipo="'+v.tipo+'" data-servicio="'+v.tipo+'" data-nombre="'+v.nombre+'">'+v.nombre+'</option>');
                    }
                    else if(v.tipo == "2"){
                        $(".option-group-m").append('<option value="'+v.id_area+'" data-duracion="'+v.duracion+'" data-tipo="'+v.tipo+'" data-servicio="'+v.tipo+'" data-nombre="'+v.nombre+'">'+v.nombre+'</option>');
                    } 
                    else if(v.tipo == "4"){
                        $(".option-group-r").append('<option value="'+v.id_area+'" date-duracion="'+v.duracion+'" data-tipo="'+v.tipo+'" data-servicio="'+v.tipo+'" data-nombre="'+v.nombre+'">'+v.nombre+'</option>');
                    }
                });
                $('#loader').addClass('hidden');
            });
    });

    $(".serviciosMultiSelect").change(function() {
        calcularDuracion();
    });

    $("#dateStart").change(function() { 
        calcularDuracion();
    });

    function calcularDuracion(){
        var a = 0;
        /*var areas = [];
        //DURACION
        $(".serviciosMultiSelect :selected").map(function(i, e){
            let area = {
                id: $(e).attr("value"),
                duracion : parseInt($(e).data("duracion")),
                tipo: $(e).data("tipo")
            }

            areas.push(area);
            //area['duracion'] = parseInt($(e).data("duracion"));
            
            //console.log(areas);
            /*duracion = parseInt($(e).data("duracion"));
            a = a + duracion;

            var ini = moment(document.getElementById("dateStart").value).format("DD/MM/YYYY hh:mm:ss");
            var fechaFin = new Date(ini);

            fechaFin.setMinutes(fechaFin.getMinutes() + a);

            document.getElementById("dateEnd").value = moment(fechaFin).format("DD/MM/YYYY hh:mm:ss");

        }).get();*/
        
        var arrayAreas = contruirArrayAreas();
        console.log(arrayAreas);

        //AREAS
        var areas = $(".serviciosMultiSelect :selected").map(function(){
            return $(this).attr("value");
        }).get();
        var str = areas.join(',');
        document.getElementById("areas").value = str;
        
        //TIPO
        var servicio = $(".serviciosMultiSelect :selected").map(function(){
            return $(this).attr("data-servicio");
        }).get();
        
        var tipo = $(".serviciosMultiSelect :selected").map(function(){
            return $(this).attr("data-tipo");
        }).get();
        tipo.includes('1') == true ? depi = 1:depi = 0;
        tipo.includes('2') == true ? mold = 1:mold = 0;
        tipo.includes('4') == true ? rej = 1:rej = 0;
        var ser = depi == 1 && mold == 1 ? servicio[0] = 3: depi == 1 && mold == 0 ? servicio[0] = 1: depi == 0 && mold == 1 ? servicio[0] = 2: servicio[0] = 4;
        document.getElementById("servicio").value = ser;

    }

    function contruirArrayAreas(){
        var areas = [];
        $('.serviciosMultiSelect :selected').each(function(i, el) {
            let area = {
                id: $(el).attr("value"),
                duracion : parseInt($(el).data("duracion")),
                tipo: $(el).data("tipo")
            }

            areas.push(area);
            
        });
        areas.forEach(object =>{
            //console.log("ID: %i, Duracion: %d, Tipo: ", object.id, object.duracion, object.tipo);
            console.log(object.id);
            console.log(object.duracion);
            console.log(object.tipo);
        });

        return areas;
    }
    
    //INSERTAR CITA
    $(document).on("submit", "#insertCita", function (e) {
        e.preventDefault();
        let idCliente = $("#idCliente").val();
        let data = new FormData($(this)[0]);
        $.ajax({
            url: "Agenda/nuevaCita",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function (response) {
                $("#myModalCitaAgendada").modal("hide");
                jQuery.alert("¡CITA AGENDADA EXITOSAMENTE!");
            }
        });
    });
