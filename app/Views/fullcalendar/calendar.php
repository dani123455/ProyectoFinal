<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario Dinámico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Metronic CSS -->
    <link href="path/to/metronic/assets/css/style.bundle.css" rel="stylesheet">
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <link href="../../assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="card card-xxl-stretch">
										<!--begin::Card header-->
		<div class="card-header">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark">My Calendar</span>
                <span class="text-muted mt-1 fw-bold fs-7">Preview monthly events</span>
			</h3>
			<div class="card-toolbar">
				<a href="../../demo1/dist/apps/calendar.html" class="btn btn-primary">Manage Calendar</a>
			</div>
		</div>
		<!--end::Card header-->
        <!--begin::Card body-->
		<div id="" class="card-body">
        <!--begin::Calendar-->
			<div id="calendar"></div>
			<!--end::Calendar-->
		</div>
        <!--end::Card body-->
	</div>
 
    <!-- Metronic JS -->
    <script src="path/to/metronic/assets/js/scripts.bundle.js"></script>
    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 
    <script>
        $(document).ready(function () {
            const calendarEl = document.getElementById('calendar');
 
            // Inicializar FullCalendar
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                editable: true,
 
                // Cargar eventos desde el servidor
                events: function(fetchInfo, successCallback, failureCallback) {
                 
                },
 
                // Añadir evento
                select: function (info) {
                    const title = prompt('Título del evento:');
                    if (title) {
                    
                    }
                },
 
                // Eliminar evento
                eventClick: function (info) {
                    if (confirm('¿Deseas eliminar este evento?')) {
                      
                    }
                }
            });
 
            calendar.render();
        });
    </script>
</body>
</html>