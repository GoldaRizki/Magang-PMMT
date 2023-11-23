@extends('layouts.header')

@section('konten')
    <div class="card mb-5 mb-xl-10">

        <div class="card-header border-0">
            <div class="card-title m-0">
                <h1>Profil Saya</h1>
            </div>
        </div>

        <!--begin::Form-->
            <form id="kt_account_profile_details_form" class="form" action="/user/akun/update/" method="POST" enctype="multipart/form-data">
				@csrf
				@method('put')
											<!--begin::Card body-->
											<div class="card-body border-top p-9">
												<!--begin::Input group-->
												<div class="row mb-6">
													<!--begin::Label-->
													<label class="col-lg-4 col-form-label fw-bold fs-6">Foto Profil</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-8">
														<!--begin::Image input-->
														<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(/assets/default/blank.png)">
															<!--begin::Preview existing avatar-->
															@if(auth()->user()->foto)
															<div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ '/storage/'. auth()->user()->foto }}')"></div>
															@else
															<div class="image-input-wrapper w-125px h-125px" style="background-image: url(/assets/default/blank.png)"></div>
															@endif
															<!--end::Preview existing avatar-->
															<!--begin::Label-->
															<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Ganti Foto Profil">
																<i class="bi bi-pencil-fill fs-7"></i>
																<!--begin::Inputs-->
																<input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
																<input type="hidden" name="avatar_remove" />
																<!--end::Inputs-->
															</label>
															<!--end::Label-->
															<!--begin::Cancel-->
															<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
																<i class="bi bi-x fs-2"></i>
															</span>
															<!--end::Cancel-->
															<!--begin::Remove-->
															<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Hapus">
																<i class="bi bi-x fs-2"></i>
															</span>
															<!--end::Remove-->
														</div>
														<!--end::Image input-->
														<!--begin::Hint-->
														<div class="form-text">Format yang bisa diterima: png, jpg, jpeg.</div>
														@error('avatar')
														<p class="text-danger">
															{{ $message }}
														</p>
														@enderror
														<!--end::Hint-->
													</div>
													<!--end::Col-->
												</div>
												<!--end::Input group-->

												<input type="hidden" name="id" value="{{ auth()->user()->id }}">
												
                                                <!--begin::Input group-->
												<div class="row mb-6">
													<!--begin::Label-->
													<label class="col-lg-4 col-form-label fw-bold fs-6">Username</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-8 fv-row">
														<input type="text" name="username" class="form-control form-control-lg form-control-solid @error('username') is-invalid @enderror" placeholder="username" value="{{ old('username', auth()->user()->username) }}" />
													</div>
													@error('username')
													<p class="text-danger">
														{{ $message }}
													</p>
													@enderror
													<!--end::Col-->
												</div>
												<!--end::Input group-->


												<!--begin::Input group-->
												<div class="row mb-6">
													<!--begin::Label-->
													<label class="col-lg-4 col-form-label fw-bold fs-6">Nama</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-8 fv-row">
														<input type="text" name="nama" class="form-control form-control-lg form-control-solid @error('nama') is-invalid @enderror" placeholder="nama" value="{{ old('nama', auth()->user()->nama) }}" />
													</div>
													<!--end::Col-->
													@error('nama')
													<p class="text-danger">
														{{ $message }}
													</p>
													@enderror
												</div>
												<!--end::Input group-->                                                




                                           
												<!--begin::Input group-->
												<div class="row mb-6">
													<!--begin::Label-->
													<label class="col-lg-4 col-form-label fw-bold fs-6">Level/Role</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-8 fv-row">
														<input type="text" class="form-control form-control-lg form-control-solid" value="{{ auth()->user()->level }}" disabled/>
													</div>
													<!--end::Col-->
												</div>
												<!--end::Input group-->                      
												
					
												


											                                           
                                                
                                                


											</div>
											<!--end::Card body-->
											<!--begin::Actions-->
											<div class="card-footer d-flex justify-content-end py-6 px-9">
												<button type="reset" class="btn btn-light btn-active-light-primary me-2">Reset</button>
												<button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Simpan Perubahan</button>
											</div>
											<!--end::Actions-->
										</form>
										<!--end::Form-->
                                    </div>





									<div class="card mb-5 mb-xl-10">

										<div class="card-header border-0">
											<div class="card-title m-0">
												<h1>Ganti Password</h1>
											</div>
										</div>
								
										<!--begin::Form-->
											<form id="kt_account_profile_details_form_2" class="form" action="/user/akun/update/password/" method="POST">
												@csrf
												@method('put')
																			<!--begin::Card body-->
																			<div class="card-body border-top p-9">
					            
																				
																				<input type="hidden" name="id" value="{{ auth()->user()->id }}">
																				<!--begin::Input group-->
																				<div class="row mb-6">
																					<!--begin::Label-->
																					<label class="col-lg-4 col-form-label fw-bold fs-6">Password Baru</label>
																					<!--end::Label-->
																					<!--begin::Col-->
																					<div class="col-lg-8 fv-row">
																						<input type="text" name="password_baru" class="form-control form-control-lg form-control-solid @error('password_baru') is-invalid @enderror" placeholder="password baru" />
																					</div>
																					<!--end::Col-->
																					@error('password_baru')
																					<p class="text-danger">
																						{{ $message }}
																					</p>
																					@enderror
																				</div>
																				<!--end::Input group--> 
								
																				<!--begin::Input group-->
																				<div class="row mb-6">
																					<!--begin::Label-->
																					<label class="col-lg-4 col-form-label fw-bold fs-6">Password Lama</label>
																					<!--end::Label-->
																					<!--begin::Col-->
																					<div class="col-lg-8 fv-row">
																						<input type="text" name="password_lama" class="form-control form-control-lg form-control-solid @error('password_lama') is-invalid @enderror" placeholder="password lama" />
																					</div>
																					<!--end::Col-->
																					@error('password_lama')
																					<p class="text-danger">
																						{{ $message }}
																					</p>
																					@enderror
																					
								
								
																				</div>
																				<!--end::Input group--> 
																				
								
								
																													   
																				
																				
								
								
																			</div>
																			<!--end::Card body-->
																			<!--begin::Actions-->
																			<div class="card-footer d-flex justify-content-end py-6 px-9">
																				<button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Ganti Password</button>
																			</div>
																			<!--end::Actions-->
																		</form>
																		<!--end::Form-->
																	</div>

									

@endsection

@section('customJs')
	<script>

@if($errors->any())
		Swal.fire({
		icon: 'error',
		title: 'Error',
		text: 'Submit Gagal, Ada kesalahan dalam input anda.... Pastikan tidak ada form yang kosong',
		});
@endif

	</script>
@endsection