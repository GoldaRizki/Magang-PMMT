								<!--begin::Topbar-->
								<div class="d-flex align-items-stretch flex-shrink-0">
									<!--begin::Toolbar wrapper-->
									<div class="d-flex align-items-stretch flex-shrink-0">
										



										<!--begin::Activities-->
	
										<!--end::Activities-->


										<!--begin::Notifications-->
		
										<!--end::Notifications-->


										<!--begin::Chat-->
										
										<!--end::Chat-->
										<!--begin::Quick links-->
										
										<!--end::Quick links-->

                                    
                                        <div class="d-flex justify-content-center flex-column align-items-end ms-1 ms-lg-0">
											@auth
											<span class="fw-bolder">{{ auth()->user()->nama }}</span>
											<span class="fw-bold text-muted">{{ auth()->user()->username }}</span>
											@else
											<span class="fw-bolder">Tamu</span>
										
											@endauth
                                        
                                        </div>
                                        
										<!--begin::User-->
										@auth
										<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
											<!--begin::Menu wrapper-->
											<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
												<img src="/assets/media/avatars/blank.png" alt="user" />
											</div>
											<!--begin::Menu-->
											<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
												<!--begin::Menu item-->
												<div class="menu-item px-3">
													<div class="menu-content d-flex align-items-center px-3">
														<!--begin::Avatar-->
														<div class="symbol symbol-50px me-5">
															<img alt="Logo" src="/assets/media/avatars/blank.png" />
														</div>
														<!--end::Avatar-->
														<!--begin::Username-->
														<div class="d-flex flex-column">
															<div class="fw-bolder d-flex align-items-center fs-5">
																{{ auth()->user()->nama }}

																@if(auth()->user()->level === 'Teknisi')
																<span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Teknisi</span>
																@elseif(auth()->user()->level === 'Supervisor')
																<span class="badge badge-light-warning fw-bolder fs-8 px-2 py-1 ms-2">Supervisor</span>
																@elseif(auth()->user()->level === 'Manager')
																<span class="badge badge-light-danger fw-bolder fs-8 px-2 py-1 ms-2">Manager</span>
																@else
																<span class="badge badge-dark fw-bolder fs-8 px-2 py-1 ms-2">Superuser</span>
																@endif
																
															
															</div>
															<a class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->username }}</a>
														</div>
														<!--end::Username-->
													</div>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu separator-->
												<div class="separator my-2"></div>
												<!--end::Menu separator-->
												<!--begin::Menu item-->
												<div class="menu-item px-5">
													<a href="../../demo1/dist/account/overview.html" class="menu-link px-5">Akun Saya</a>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<div class="menu-item px-5">
													<a href="../../demo1/dist/pages/projects/list.html" class="menu-link px-5">
														<span class="menu-text">My Projects</span>
														<span class="menu-badge">
															<span class="badge badge-light-danger badge-circle fw-bolder fs-7">3</span>
														</span>
													</a>
												</div>
												<!--end::Menu item-->

											
												<!--begin::Menu separator-->
												<div class="separator my-2"></div>
												<!--end::Menu separator-->
												
												<!--begin::Menu item-->
												<div class="menu-item px-5 my-1">
													<a href="../../demo1/dist/account/settings.html" class="menu-link px-5">Account Settings</a>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu item-->
														<div class="menu-item px-5">
															<form action="/logout" method="post">
																@csrf
															<input type="submit" class="dropdown-item menu-link fw-bold px-5" value="Log Out">
															</form>

														</div>
												<!--end::Menu item-->
												<!--begin::Menu separator-->
												<div class="separator my-2"></div>
												<!--end::Menu separator-->
												
											</div>
											<!--end::Menu-->
											<!--end::Menu wrapper-->
										</div>
										@endauth
										<!--end::User -->



                                            <!--begin::Heaeder menu toggle-->
										<div class="d-flex align-items-center d-lg-none ms-2 me-n1" title="Show header menu">
											<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">
												<!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
												<span class="svg-icon svg-icon-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="2" y="2" width="9" height="9" rx="2" fill="black"/>
                                                        <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black"/>
                                                        <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black"/>
                                                        <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black"/>
                                                    </svg>
												</span>
												<!--end::Svg Icon-->
											</div>
										</div>
										<!--end::Heaeder menu toggle-->

										
									</div>
									<!--end::Toolbar wrapper-->
								</div>
								<!--end::Topbar-->