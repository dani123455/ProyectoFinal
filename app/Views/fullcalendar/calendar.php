<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Metronic CSS -->
    <link href="../assets/css/style.bundle.css" rel="stylesheet">
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <link href="../assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
</head>
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
		<!--begin::Brand-->
		<div class="aside-logo flex-column-auto p-2" style="background-color:#21273a;" id="kt_aside_logo">
            <!--begin::Logo-->
			<a href="<?= base_url('admin/dashboard') ?>">
				<img alt="Logo" src="<?= base_url('assets/media/logos/LogoTiendaCoche.png')?>" class="logo" style="width: 200px;" />
			</a>
			<!--end::Logo-->
			<!--begin::Aside toggler-->
			<div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
				<!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
				<span class="svg-icon svg-icon-1 rotate-180">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="black" />
						<path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="black" />
					</svg>
				</span>
				<!--end::Svg Icon-->
			</div>
			<!--end::Aside toggler-->
		</div>
			<!--end::Brand-->
			<!--begin::Aside menu-->
		<div style="background-color:#0c1e35" class="aside-menu flex-column-fluid">
            <!--begin::Aside Menu-->
			<div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
                <!--begin::Menu-->
				<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
					<div class="menu-item">
						<div class="menu-content pt-8 pb-2">
							<span class="menu-section text-muted text-uppercase fs-8 ls-1">Tables</span>
						</div>
					</div>
					<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
						<span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="black" />
                                        <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="black" />
                                    </svg>
                                </span>
                                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Tables</span>
                            <span class="menu-arrow"></span>
						</span>
						<div class="menu-sub menu-sub-accordion">
							<div class="menu-item">
								<a class="menu-link" href="<?= base_url('coches') ?>">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-item">Cars</span>
								</a>
							</div>
							<div class="menu-item">
								<a class="menu-link" href="<?= base_url('marcas') ?>">
									<span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-item">Brands</span>
								</a>
							</div>
							<div class="menu-item">
								<a class="menu-link" href="<?= base_url('usuarios') ?>">

									<span class="menu-bullet">
										<span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-item">Users</span>
								</a>
							</div>
							<div class="menu-item">
								<a class="menu-link" href="<?= base_url('ventas') ?>">
									<span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-item">Sales</span>
								</a>
							</div>
						</div>
					</div>
					<div class="menu-item">
						<a class="menu-link" href="<?= base_url('fullcalendar')?>">
							<span class="menu-icon">
								<span class="svg-icon svg-icon-2">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path opacity="0.3" d="M3 4C3 3.4 3.4 3 4 3H20C20.6 3 21 3.4 21 4V5H3V4Z" fill="black"/>
										<path d="M21 8V19C21 20.1 20.1 21 19 21H5C3.9 21 3 20.1 3 19V8H21ZM9 11H7V13H9V11ZM13 11H11V13H13V11ZM17 11H15V13H17V11ZM9 15H7V17H9V15ZM13 15H11V17H13V15ZM17 15H15V17H17V15Z" fill="black"/>
									</svg>
								</span>
							</span>
							<span class="menu-title">Calendar</span>
						</a>
					</div>
				</div>
			<!--end::Menu-->
			</div>
		<!--end::Aside Menu-->
		</div>
		<!--end::Aside menu-->
		<!--begin::Footer-->
		<div style="background-color:#21273a" class="aside-footer pt-5 pb-7 px-10 flex-column align-items-center" id="kt_aside_footer">
            <div class="symbol symbol-50px mb-2 me-5">
                <img class="rounded-circle" src="<?= base_url('assets/media/avatars/150-8.jpg')?>" alt="Avatar"/>
            </div>
            <span class="text-muted fs-4 text-center me-5"><?= session()->get('nombre') ?> #<?= session()->get('id') ?></span>
			<a class="text-danger" href="<?=base_url('auth/logout')?>"><i class="bi bi-box-arrow-in-right"></i></a>
        </div>
		<!--end::Footer-->
	</div>
   <!-- Reemplaza solo la sección del contenido principal, manteniendo el resto igual -->

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Card-->
        <div class="card card-flush">
            <!--begin::Card header-->
            <div class="card-header mt-6">
                <div class="card">
                    <h2 class="fw-bold">Calendar</h2>
                </div>
                
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Calendar-->
                <div id="calendar" class="fc fc-media-screen fc-direction-ltr fc-theme-standard" style="height: 800px;"></div>
                <!--end::Calendar-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!-- Modal para agregar evento -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eventModalLabel">Add event </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="eventForm">
          <div class="form-group">
            <label for="titulo">Title</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
          </div>
          <div class="form-group">
            <label for="descripcion_es">Description in spanish</label>
            <textarea class="form-control" id="descripcion_es" name="descripcion_es"></textarea>
          </div>
          <div class="form-group">
            <label for="descripcion_eng">Description in english</label>
            <textarea class="form-control" id="descripcion_eng" name="descripcion_eng"></textarea>
          </div>
          <div class="form-group">
            <label for="fecha_inicio">Start date</label>
            <input type="datetime-local" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
          </div>
          <div class="form-group">
            <label for="fecha_fin">End date</label>
            <input type="datetime-local" class="form-control" id="fecha_fin" name="fecha_fin">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveEventBtn">Add Event</button>
      </div>
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Metronic JS -->
    <script src="path/to/metronic/assets/js/scripts.bundle.js"></script>
    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
     $(document).ready(function () {
    const calendarEl = document.getElementById('calendar');
    
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        selectable: true,
        editable: true,
        displayEventTime: false,
        firstDay: '1',

        // Cargar eventos desde el servidor
        events: function(fetchInfo, successCallback, failureCallback) {
            $.ajax({
                url: '<?= base_url('/fetch-events') ?>',
                method: 'GET',
                success: function(data) {
                    console.log("Eventos cargados desde el servidor: ", data);  // Verificar los eventos
                    successCallback(data);
                },
                error: function(xhr, status, error) {
                    console.error("Error al cargar los eventos: ", status, error);
                    failureCallback();
                }
            });
        },

        // Acción cuando se selecciona un rango de fechas en el calendario
        select: function(info) {
            // Limpiar el formulario cada vez que se abra el modal
            $('#eventForm')[0].reset();
            $('#fecha_inicio').val(info.startStr);  // Coloca la fecha de inicio
            $('#fecha_fin').val(info.endStr);        // Coloca la fecha de fin

            // Mostrar el modal para agregar el evento
            var myModal = new bootstrap.Modal(document.getElementById('eventModal'), {});
            myModal.show();

            // Enlazar el evento 'click' para el botón de guardar
            $('#saveEventBtn').off('click').on('click', function () {
                // Recoger los datos del formulario
                const eventData = {
                    titulo: $('#titulo').val(),
                    fecha_inicio: $('#fecha_inicio').val(),
                    fecha_fin: $('#fecha_fin').val(),
                    descripcion_es: $('#descripcion_es').val(),
                    descripcion_eng: $('#descripcion_eng').val(),
                    fecha_eliminacion: $('#fecha_eliminacion').val()
                };

                // Verificar que el título y la fecha de inicio estén presentes
                if (!eventData.titulo || !eventData.fecha_inicio) {
                    alert("El título y la fecha de inicio son obligatorios.");
                    return;
                }

                // Realizar la petición AJAX para agregar el evento
                $.ajax({
                    url: '<?= base_url('/add-event') ?>',
                    method: 'POST',
                    data: eventData,
                    success: function(response) {
                        if (response.status === 'success') {
                            // Refrescar los eventos y cerrar el modal
                            calendar.refetchEvents();
                            myModal.hide();
                        } else {
                            alert("Error al agregar el evento: " + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error al agregar el evento: ", status, error);
                    }
                });
            });
        },

        // Acción cuando se hace clic en un evento (SweetAlert para la eliminación)
        eventClick: function(info) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Este evento será eliminado permanentemente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminarlo',
                cancelButtonText: 'No, cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('/delete-event') ?>/' + info.event.id,
                        method: 'DELETE',
                        success: function(response) {
                            if (response.status === 'success') {
                                info.event.remove();
                                Swal.fire(
                                    'Eliminado!',
                                    'El evento ha sido eliminado.',
                                    'success'
                                );
                            } else {
                                Swal.fire(
                                    'Error',
                                    'No se pudo eliminar el evento.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error en la petición AJAX: ", status, error);
                            Swal.fire(
                                'Error',
                                'Hubo un problema al intentar eliminar el evento.',
                                'error'
                            );
                        }
                    });
                } else {
                    Swal.fire(
                        'Cancelado',
                        'El evento no fue eliminado.',
                        'info'
                    );
                }
            });
        }
    });

    // Inicializar el calendario
    calendar.render();
});

    </script>
</body>
</html>