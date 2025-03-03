<!DOCTYPE html>
<html lang="en">
<head>
    <base href="ProyectoFinal"
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($usuario) ? 'Editar Usuario' : 'Crear Usuario' ?></title>
    <title>Metronic - the world's #1 selling Bootstrap Admin Theme Ecosystem for HTML, Vue, React, Angular &amp; Laravel by Keenthemes</title>
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="<?=base_url('assets/media/logos/favicon.ico')?>" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="<?=base_url('assets/plugins/custom/datatables/datatables.bundle.css')?>" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="<?=base_url('assets/plugins/global/plugins.bundle.css')?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/css/style.bundle.css')?>" rel="stylesheet" type="text/css" />
</head>
<body class="bg-secondary">
<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
					<!--begin::Brand-->
					<div class="aside-logo flex-column-auto p-2" style="background-color:#21273a;" id="kt_aside_logo">
						<!--begin::Logo-->
						<a href="<?= base_url('admin/dashboard') ?>">
							<img alt="Logo" src="../assets/media/logos/LogoTiendaCoche.png" class="logo" style="width: 200px;" />
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
						</div>
					</div>			<!--end::Aside menu-->
					<!--begin::Footer-->
					<div style="background-color:#21273a" class="aside-footer pt-5 pb-7 px-10 flex-column align-items-center" id="kt_aside_footer">

						<div class="symbol symbol-50px mb-2 me-5">
							<img class="rounded-circle" src="../assets/media/avatars/150-8.jpg" alt="Avatar"/>
						</div>

						<span class="text-muted fs-4 text-center me-5"><?= session()->get('nombre') ?> #<?= session()->get('id') ?></span>
						<a class="text-danger" href="<?=base_url('auth/logout')?>"><i class="bi bi-box-arrow-in-right"></i></a>
					</div>
					<!--end::Footer-->
				</div>

<div class="container mt-5">
    <div class="card shadow-none rounded-0 mt-5">
        <div class="card-header text-center" id="kt_activities_header">
            <h1 class="p-5"><?= $isEdit ? 'Editar Usuario' : 'Crear Usuario' ?></h1>
        </div>
        <div class="card-body position-relative" id="kt_activities_body" style="max-height: 500px;">
            <div id="kt_activities_scroll" class="position-relative scroll-y me-n5 pe-5" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_activities_body" data-kt-scroll-dependencies="#kt_activities_header, #kt_activities_footer" data-kt-scroll-offset="5px">
            <!-- Mostrar errores de validación -->
                <?php if (isset($validation)): ?>
                    <div class="alert alert-danger">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>

                <!-- Formulario -->
                <form action="<?= isset($usuario) ? base_url('usuarios/save/' . $usuario['id']) : base_url('usuarios/save') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-bold">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" 
                            value="<?= isset($usuario) ? esc($usuario['nombre']) : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" name="email" id="email" class="form-control" 
                            value="<?= isset($usuario) ? esc($usuario['email']) : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="rol_id" class="form-label fw-bold">Rol</label>
                        <select name="rol_id" id="rol_id" class="form-control" required>
                            <?php foreach ($roles as $rol): ?>
                                <option value="<?= $rol['id'] ?>" <?= isset($usuario['rol_id']) && $usuario['rol_id'] == $rol['id'] ? 'selected' : '' ?>><?= $rol['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label fw-bold">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" class="form-control" 
                            value="<?= isset($usuario) ? esc($usuario['telefono']) : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label fw-bold">Dirección</label>
                        <input type="text" name="direccion" id="direccion" class="form-control" 
                            value="<?= isset($usuario) ? esc($usuario['direccion']) : '' ?>" required>
                    </div>
                    <button type="submit" class="btn btn-success"><?= isset($usuario) ? 'Actualizar' : 'Guardar' ?></button>
                    <a href="<?= base_url('usuarios') ?>" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
<script>var hostUrl = "<?=base_url('assets/')?>";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="<?=base_url('assets/plugins/global/plugins.bundle.js')?>"></script>
		<script src="<?=base_url('assets/js/scripts.bundle.js')?>"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="<?=base_url('assets/plugins/custom/datatables/datatables.bundle.js')?>"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="<?=base_url('assets/js/custom/apps/customers/list/export.js')?>"></script>
		<script src="<?=base_url('assets/js/custom/apps/customers/list/list.js')?>"></script>
		<script src="<?=base_url('assets/js/custom/apps/customers/add.js')?>"></script>
		<script src="<?=base_url('assets/js/custom/widgets.js')?>"></script>
		<script src="<?=base_url('assets/js/custom/apps/chat/chat.js')?>"></script>
		<script src="<?=base_url('assets/js/custom/modals/create-app.js')?>"></script>
		<script src="<?=base_url('assets/js/custom/modals/upgrade-plan.js')?>"></script>
</body>
</html>
