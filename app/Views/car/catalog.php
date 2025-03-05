<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
    
    <!-- Metronic Theme CSS -->
    <link href="<?= base_url('assets/plugins/global/plugins.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/style.bundle.css') ?>" rel="stylesheet" type="text/css" />
    
    <!-- Custom CSS -->
    <style>
        .product-card {
            transition: transform 0.3s;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
        }
        .category-item.active {
            background-color: #f5f8fa;
            color: #3699FF;
            font-weight: 500;
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">
    <!-- Main Container -->
    <div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
					<!--begin::Brand-->
					<div class="aside-logo flex-column-auto p-2" style="background-color:#21273a;" id="kt_aside_logo">
						<!--begin::Logo-->
						<a href="<?= base_url('admin/dashboard') ?>">
							<img alt="Logo" src="<?= base_url('assets/media/logos/LogoTiendaCoche.png') ?>" class="logo" style="width: 200px;" />
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
									<div class="menu-content pt-8 pb-2">
										<span class="menu-section text-muted text-uppercase fs-8 ls-1">Functionalities</span>
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
								<div class="menu-item">
									<a class="menu-link" href="<?= base_url('fullcalendar')?>">
										<span class="menu-icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="black">
                                            <path opacity="0.3" d="M3 11H21V13H3V11Z" fill="black"/>
                                            <path d="M5 16C4.45 16 4 16.45 4 17C4 17.55 4.45 18 5 18C5.55 18 6 17.55 6 17C6 16.45 5.55 16 5 16ZM19 16C18.45 16 18 16.45 18 17C18 17.55 18.45 18 19 18C19.55 18 20 17.55 20 17C20 16.45 19.55 16 19 16ZM5 14H19C20.1 14 21 14.9 21 16V17C21 18.1 20.1 19 19 19H5C3.9 19 3 18.1 3 17V16C3 14.9 3.9 14 5 14ZM5 10H19C20.1 10 21 10.9 21 12V14H3V12C3 10.9 3.9 10 5 10ZM5 6H19C20.1 6 21 6.9 21 8V10H3V8C3 6.9 3.9 6 5 6Z" fill="black"/>
                                        </svg>
										</span>
										<span class="menu-title">Catalog</span>
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
                            <img class="rounded-circle" src="<?= base_url('assets/media/avatars/150-8.jpg') ?>" alt="Avatar"/>
                        </div>
            
                        <span class="text-muted fs-4 text-center me-5"><?= session()->get('nombre') ?> #<?= session()->get('id') ?></span>
						<a class="text-danger" href="<?=base_url('auth/logout')?>"><i class="bi bi-box-arrow-in-right"></i></a>
                    </div>
					<!--end::Footer-->
				</div>
            
            <!-- Main Content -->
            <div class=" d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!-- Content -->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!-- Toolbar -->
                    <div class="toolbar" id="kt_toolbar">
                        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Catalog</h1>
                                <span class="h-20px border-gray-300 border-start mx-4"></span>
                                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                                    <li class="breadcrumb-item text-muted">
                                        <a href="<?= base_url() ?>" class="text-muted text-hover-primary">Introduction</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                                    </li>
                                    <li class="breadcrumb-item text-dark">Catalog</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Main Content -->
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <div id="kt_content_container" class="container-xxl">
                            <!-- Products Grid -->
                            <div class="row g-6 g-xl-9 mb-6 mb-xl-9">
            
            <?php 
            if (!isset($coches) || empty($coches)) {
                $db = \Config\Database::connect();
                $builder = $db->table('coches');
                $builder->select('coches.*, marcas.nombre as marca_nombre');
                $builder->join('marcas', 'marcas.id = coches.marca_id', 'left');
                $builder->where('coches.disponible', 1);
                $query = $builder->get();
                $coches = $query->getResultArray();
            }
            
            if (!empty($coches) && is_array($coches)): 
            ?>
                <?php foreach ($coches as $coche): ?>
                <!-- Product Card -->
                <div class="col-md-6 col-lg-4 col-xl-3 ">
                    <div class="card h-100 product-card">
                        <div class="position-relative">
                            <div class="position-absolute top-0 end-0 p-3">
                                <button class="btn btn-icon btn-active-color-primary btn-sm btn-shadow bg-body rounded-circle">
                                    <i class="bi bi-heart fs-2"></i>
                                </button>
                            </div>
                            <!-- Car Image from Database -->
                            <?php if (isset($coche['imagen']) && !empty($coche['imagen'])): ?>
                                <img src="<?= base_url('coches/imagen/' . $coche['id']) ?>" class="card-img-top" alt="<?= esc($coche['modelo']) ?>">
                            <?php else: ?>
                                <img src="<?= base_url('assets/images/no-image.jpg') ?>" class="card-img-top" alt="<?= esc($coche['modelo']) ?>">
                            <?php endif; ?>
                        </div>
                        <div class="card-body d-flex flex-column p-5">
                            <div class="d-flex flex-column mb-3">
                                <!-- Car Name from Database -->
                                <a href="<?= base_url('catalog/product/' . $coche['id']) ?>" class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-0">
                                    <?= isset($coche['marca_nombre']) ? esc($coche['marca_nombre']) : 'Marca' ?> <?= esc($coche['modelo']) ?>
                                </a>
                                <span class="text-muted fs-7"><?= esc($coche['año']) ?></span>
                            </div>
                            
                            <div class="mb-3">
                                <div class="rating mb-1">
                                    <?php 
                                    $rating = rand(3, 5);
                                    for ($j = 1; $j <= 5; $j++): 
                                    ?>
                                    <div class="rating-label <?= ($j <= $rating) ? 'checked' : '' ?>">
                                        <i class="bi bi-star-fill fs-6"></i>
                                    </div>
                                    <?php endfor; ?>
                                </div>
                                <span class="text-muted fw-bold">(<?= rand(10, 100) ?> reviews)</span>
                            </div>
                            
                            <div class="d-flex flex-column mb-7">
                                <span class="text-dark fw-bolder fs-3">$<?= number_format($coche['precio'], 2) ?></span>
                            </div>
                            
                            <div class="d-flex justify-content-between mt-auto">
                                <a href="<?= base_url('catalog/product/' . $coche['id']) ?>" class="btn btn-sm btn-light-primary btn-hover-rise me-3">
                                    <span class="indicator-label">Details</span>
                                </a>
                                <a href="<?= base_url('cart/add/' . $coche['id']) ?>" class="btn btn-sm btn-primary btn-hover-rise">
                                    <i class="bi bi-cart fs-4 me-1"></i>Add
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center p-10">
                            <i class="bi bi-car-front fs-3x text-muted mb-5"></i>
                            <h3 class="text-gray-800">No cars available</h3>
                            <p class="text-muted">There are no cars in the catalog at the moment.</p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Metronic Theme JS -->
    <script src="<?= base_url('assets/plugins/global/plugins.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/js/scripts.bundle.js') ?>"></script>
    
</body>
</html>

