@extends('layouts.tray_layout')

@section('before_content')

@if($errors->any())
    <!--begin::Alert-->

    <div class="alert alert-dismissible bg-danger d-flex flex-column flex-sm-row p-5 mb-10 mx-3">
        <!--begin::Icon-->
        <span class="svg-icon svg-icon-2hx svg-icon-light me-4 mb-5 mb-sm-0">
        <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen044.svg-->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"/>
        <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black"/>
        <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"/>
    </svg>
    <!--end::Svg Icon-->
    </span>
    <!--end::Icon-->

    <!--begin::Wrapper-->
    <div class="d-flex flex-column text-light pe-0 pe-sm-10">
        <!--begin::Title-->
        <h4 class="mb-2 text-light">Error</h4>
        <!--end::Title-->
        
        <!--begin::Content-->
        <span>Terjadi kesalahan, mohon cek kembali isian form. Beberapa form tidak boleh dikosongi</span>
        <br>
        <span>Mohon dicek barangkali nilai yang anda masukkan sudah ada di dalam tabel</span>
        <br>
        <span>Pesan Error: </span>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->

    <!--begin::Close-->
    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
        <span class="svg-icon svg-icon-2x svg-icon-light">
            <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen034.svg-->   
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"/>
            <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black"/>
        <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black"/>
        </svg>
    <!--end::Svg Icon-->
        </span>
    </button>
    <!--end::Close-->
</div>
<!--end::Alert-->
@endif




<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Maintenance</h5>

                <!--begin::Close-->
                <div onclick="clearValue()" class="btn btn-icon btn-sm btn-active-light-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
                <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen034.svg-->
                <span class="svg-icon svg-icon-muted svg-icon-2hx">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"/>
                            <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black"/>
                            <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black"/>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>

            <form action="/maintenance/create/" method="post">
            @csrf
                <div class="modal-body">
            
                    <div class="mb-3">
                        <label for="maintenance_form" class="form-label float-start">Nama Maintenance</label>
                        <input type="text" class="form-control @error('nama_setup') is-invalid @enderror clear-form" id="maintenance_form" value="{{ old('nama_setup') }}" name="nama_setup">
                    </div>

                    <div class="mb-3">
                        <label for="periode_form" class="form-label float-start">Periode</label>
                        <input type="number" class="form-control @error('periode') is-invalid @enderror clear-form" id="periode_form" value="{{ old('periode') }}" name="periode">
                    </div>

                    <div class="input-group mb-3">
                        <button class="btn btn-primary btn-outline-secondary @error('satuan_periode') is-invalid @enderror dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Satuan</button>
                        <ul class="dropdown-menu"> 
                          <li><a class="dropdown-item" onclick="setSatuan('Jam')">Jam</a></li>
                          <li><a class="dropdown-item" onclick="setSatuan('Hari')">Hari</a></li>
                          <li><a class="dropdown-item" onclick="setSatuan('Minggu')">Minggu</a></li>
                          <li><a class="dropdown-item" onclick="setSatuan('Bulan')">Bulan</a></li>
                          <li><a class="dropdown-item" onclick="setSatuan('Tahun')">Tahun</a></li>

                        </ul>
                        <input type="text" class="form-control @error('satuan_periode') is-invalid @enderror clear-form" aria-label="Satuan" value="{{ old('satuan_periode') }}" name="satuan_periode" id="satuan_periode" readonly>
                      
                    </div>

                    <div class="input-group mb-3">

                        <span class="form-label float-start">Start Date</span>
                        <div class="input-group date">
                            <input type="text" class="form-control @error('start_date') is-invalid @enderror clear-form" id="tanggal_form" value="{{ old('start_date') }}" name="start_date" readonly>
                            <button class="btn btn-secondary @error('start_date') is-invalid @enderror" type="button">
                                <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil002.svg-->
                                <span class="svg-icon svg-icon-muted svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                        <path opacity="0.3" d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z" fill="black"/>
                                        <path d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z" fill="black"/>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                        </button>
                        
                        </div>
                    </div>


                    <div class="my-5">
                        <div class="p-2 fw-bold">Warna</div>
                        <div class="p-2 d-inline"><input type="color" name="warna" id="create_warna" value="{{ old('warna','#0095E8') }}">
                        </div>

                      </div>


            </div>

            <div class="modal-footer">
                <button type="button" onclick="clearValue()" class="btn btn-secondary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen034.svg-->
                    <span class="svg-icon svg-icon-muted svg-icon-3 text-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"/>
                            <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black"/>
                            <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black"/>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <span class="text-nowrap">Batal</span>
                </button>
                <button type="submit" class="btn btn-primary text-nowrap">
                    <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil025.svg-->
                    <span class="svg-icon svg-icon-muted svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="black"/>
                            <path d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z" fill="black"/>
                            <path opacity="0.3" d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z" fill="black"/>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    Simpan Perubahan
                </button>
            </div>

            </form>

        </div>
    </div>
</div>




<div class="modal fade" tabindex="-1" id="kt_modal_2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Maintenance</h5>

                <!--begin::Close-->
                <div onclick="clearValue()" class="btn btn-icon btn-sm btn-active-light-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
                <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen034.svg-->
                <span class="svg-icon svg-icon-muted svg-icon-2hx">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"/>
                            <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black"/>
                            <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black"/>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>

            <form action="/maintenance/edit/" method="POST">
    
                @csrf
            <div class="modal-body">

                <input type="hidden" class="clear-form" name="index" id="edit_index">
                    <div class="mb-3">
                        <label for="nama_maintenance_form" class="form-label float-start">Nama Maintenance</label>
                        <input type="text" class="form-control clear-form" id="edit_maintenance_form" name="nama_setup">
                    </div>

                    <div class="mb-3">
                        <label for="periode" class="form-label float-start">Periode</label>
                        <input type="number" class="form-control clear-form" id="edit_periode_form" name="periode">
                    </div>

                    <div class="input-group mb-3">
                        <button class="btn btn-primary btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Satuan</button>
                        <ul class="dropdown-menu"> 
                          <li><a class="dropdown-item" onclick="setEditSatuan('Jam')">Jam</a></li>
                          <li><a class="dropdown-item" onclick="setEditSatuan('Hari')">Hari</a></li>
                          <li><a class="dropdown-item" onclick="setEditSatuan('Minggu')">Minggu</a></li>
                          <li><a class="dropdown-item" onclick="setEditSatuan('Bulan')">Bulan</a></li>
                          <li><a class="dropdown-item" onclick="setEditSatuan('Tahun')">Tahun</a></li>

                        </ul>
                        <input type="text" class="form-control clear-form" aria-label="Satuan" name="satuan_periode" value="{{ old('satuan_periode') }}" id="edit_satuan_periode" readonly>
                      
                    </div>

                    <div class="input-group mb-3">

                        <span class="form-label float-start">Start Date</span>
                        <div class="input-group date">
                            <input type="text" class="form-control clear-form" id="edit_tanggal_form" name="start_date" readonly>
                            <button class="btn btn-secondary" type="button">
                                <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil002.svg-->
                                <span class="svg-icon svg-icon-muted svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                        <path opacity="0.3" d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z" fill="black"/>
                                        <path d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z" fill="black"/>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                        </button>
                        
                        </div>
                    </div>


                    <div class="my-5">
                        <div class="p-2 fw-bold">Warna</div>
                        <div class="p-2 d-inline"><input type="color" name="warna" id="edit_warna">
                        </div>

                      </div>



            </div>

            <div class="modal-footer">
                <button type="button" onclick="clearValue()" class="btn btn-secondary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen034.svg-->
                    <span class="svg-icon svg-icon-muted svg-icon-3 text-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"/>
                            <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black"/>
                            <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black"/>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <span class="text-nowrap">Batal</span>
                </button>
                <button type="submit" class="btn btn-primary text-nowrap">
                    <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil025.svg-->
                    <span class="svg-icon svg-icon-muted svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="black"/>
                            <path d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z" fill="black"/>
                            <path opacity="0.3" d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z" fill="black"/>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    Simpan Perubahan
                </button>
            </div>

            </form>

        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="kt_modal_3">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Form</h5>

                <!--begin::Close-->
                <div onclick="clearValue()" class="btn btn-icon btn-sm btn-active-light-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
                <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen034.svg-->
                <span class="svg-icon svg-icon-muted svg-icon-2hx">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"/>
                            <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black"/>
                            <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black"/>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>

            <form action="/maintenance/form/create" method="POST">
                @csrf
            <div class="modal-body">
            
                    <input type="hidden" class="clear-form" id="maintenance_index" name="maintenance_index">
                    <div class="mb-3">
                        <label for="create_form_form" class="form-label float-start">Nama Form</label>
                        <input type="text" class="form-control clear-form" id="create_form_form" name="nama_setup_form">
                    </div>
                    <div class="mb-3">
                        <label for="create_form_syarat" class="form-label float-start">Syarat</label>
                        <input type="text" class="form-control clear-form" id="create_form_syarat" name="syarat_setup_form">
                    </div>

            </div>

            <div class="modal-footer">
                <button type="button" onclick="clearValue()" class="btn btn-secondary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen034.svg-->
                    <span class="svg-icon svg-icon-muted svg-icon-3 text-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"/>
                            <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black"/>
                            <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black"/>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <span class="text-nowrap">Batal</span>
                </button>
                <button type="submit" class="btn btn-primary text-nowrap">
                    <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil025.svg-->
                    <span class="svg-icon svg-icon-muted svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="black"/>
                            <path d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z" fill="black"/>
                            <path opacity="0.3" d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z" fill="black"/>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    Simpan Perubahan
                </button>
            </div>

            </form>

        </div>
    </div>
</div>



<div class="modal fade" tabindex="-1" id="kt_modal_4">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Form</h5>

                <!--begin::Close-->
                <div onclick="clearValue()" class="btn btn-icon btn-sm btn-active-light-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
                <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen034.svg-->
                <span class="svg-icon svg-icon-muted svg-icon-2hx">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"/>
                            <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black"/>
                            <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black"/>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>

            <form action="/maintenance/form/update/" method="POST">
                @csrf
            <div class="modal-body">
            
                    <input type="hidden" class="clear-form" id="edit_maintenance_index" name="maintenance_index">
                    <input type="hidden" class="clear-form" id="edit_form_index" name="form_index">
                    <div class="mb-3">
                        <label for="create_form_form" class="form-label float-start">Nama Form</label>
                        <input type="text" class="form-control clear-form" id="edit_form_form" name="nama_setup_form">
                    </div>

                    <div class="mb-3">
                        <label for="edit_form_syarat" class="form-label float-start">Syarat</label>
                        <input type="text" class="form-control clear-form" id="edit_form_syarat" name="syarat_setup_form">
                    </div>


            </div>

            <div class="modal-footer">
                <button type="button" onclick="clearValue()" class="btn btn-secondary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen034.svg-->
                    <span class="svg-icon svg-icon-muted svg-icon-3 text-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"/>
                            <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black"/>
                            <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black"/>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <span class="text-nowrap">Batal</span>
                </button>
                <button type="submit" class="btn btn-primary text-nowrap">
                    <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil025.svg-->
                    <span class="svg-icon svg-icon-muted svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="black"/>
                            <path d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z" fill="black"/>
                            <path opacity="0.3" d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z" fill="black"/>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    Simpan Perubahan
                </button>
            </div>

            </form>

        </div>
    </div>
</div>

@endsection

@section('content_left')
    

    <table class="table table-row-dashed table-row-gray-400 gs-1">
        <tr>
            <td><b>Nama Mesin</b></td>
            <td>{{ $mesin->get('nama_mesin') }}</td>
        </tr>
        <tr>
            <td><b>Nomor Asset</b></td>
            <td>{{ $mesin->get('no_asset') }}</td>
        </tr>
        <tr>
            <td><b>Ruang</b></td>
            <td>{{ $mesin->get('ruang')['nama_ruang'] }}</td>
        </tr>
        <tr>
            <td><b>Kategori</b></td>
            <td>{{ $mesin->get('kategori')['nama_kategori'] }}</td>
        </tr>
    </table>

    @if($attach->get('aksi') != 'edit')
            <button class="btn btn-primary mb-3 container-fluid" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen035.svg-->
                <span class="svg-icon svg-icon-muted svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"/>
                        <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black"/>
                        <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black"/>
                    </svg>
                </span>
        <!--end::Svg Icon-->
                <span>Maintenance</span>
            </button>
    @endif


          <form action="@if($attach->isEmpty()) /maintenance/submit/ @elseif($attach->get('aksi') == 'tambah') /mesin/maintenance/create/submit @else /mesin/maintenance/edit/submit @endif" method="post">
            @method('put')
            @csrf
            <button class="btn btn-warning mb-3 text-dark container-fluid" type="submit">
            <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen037.svg-->
            <span class="svg-icon-dark svg-icon-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"/>
                <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black"/>
                </svg>
            </span>
            <!--end::Svg Icon-->
    
            <span>Simpan Perubahan</span>
            </button>
        </form>


@if($attach->isEmpty())
<form action="/maintenance/ubah_template/" onSubmit="return ubahKategori(this);" method="post">
    @csrf
    <button class="btn btn-secondary mt-9 container-fluid" type="submit">
        
        <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen055.svg-->
                <span class="svg-icon svg-icon-muted svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="black"/>
                        <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="black"/>
                        <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="black"/>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                
                <span>Ubah Kategori</span>
            </button>
        </form>
@endif
        
        <a href="/mesin" class="btn btn-dark container-fluid mt-3">
            <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr046.svg-->
            <span class="svg-icon svg-icon-muted svg-icon-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M14 6H9.60001V8H14C15.1 8 16 8.9 16 10V21C16 21.6 16.4 22 17 22C17.6 22 18 21.6 18 21V10C18 7.8 16.2 6 14 6Z" fill="black"/>
                    <path opacity="0.3" d="M9.60002 12L5.3 7.70001C4.9 7.30001 4.9 6.69999 5.3 6.29999L9.60002 2V12Z" fill="black"/>
                </svg>
            </span>
            <!--end::Svg Icon-->
            
            <span>Kembali</span>
        </a>

@endsection




@section('content_right')
    @if($attach->get('aksi') == 'tambah')
        <div class="p-5 bg-primary h1 text-light fw-bolder text-center rounded">
            Tambahkan Maintenance
        </div>
    @elseif($attach->get('aksi') == 'edit')
    <div class="p-5 bg-primary h1 text-light fw-bolder text-center rounded">
        Ubah Maintenance
    </div>
    @endif
@if($setup->isNotEmpty())
<table class="table gs-7 align-middle">
    
    
    @foreach ($setup as $s)
    
    <tr class="table-primary">
        <td class="fw-bold fs-1">{{ $s->get('nama_setup') }}</td>

        <td class="text-end">

            <form action="/maintenance/delete/" method="post" onSubmit="return hapusSetup(this);" style ="display:inline-block;">

                @csrf
                <input type="hidden" name="index" value="{{ $loop->index }}">
                <button class="btn btn-sm btn-danger text-nowrap" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path fill="white" d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                        <path fill="white" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                    </svg>
                </button>
            </form>


            <button class="btn btn-sm btn-dark text-nowrap d-inline" data-bs-toggle="modal" data-bs-target="#kt_modal_2" onclick="setEdit({{ $loop->index }}, '{{ $s->get('nama_setup') }}', {{ $s->get('periode') }}, '{{ $s->get('satuan_periode') }}', '{{ Illuminate\Support\Carbon::parse($s->get('start_date'))->format('d-m-Y') }}', '{{ $s->get('warna') }}')">
                <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen055.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="white"/>
                        <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="white"/>
                        <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="white"/>
                    </svg>
            <!--end::Svg Icon-->
            </button>


            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_3" onclick="indexMaintenance({{ $loop->index }})">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="white">
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="white"/>
                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="white"/>
                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="white"/>
                </svg>
            </button>

        </td>
    </tr>
    
    <tr>
        <td>
            <table class="table g-1">
                <tr>
                    <td>
                        <b>Periode</b>
                    </td>
                    <td>
                        <b>:</b>
                    </td>
                    <td>
                        {{ $s->get('periode') }}&nbsp;{{ $s->get('satuan_periode') }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Start Date</b>
                    </td>
                    <td>
                        <b>:</b>
                    </td>
                    <td>
@php
    setlocale(LC_ALL, 'IND');

@endphp


                        {{ Illuminate\Support\Carbon::parse($s->get('start_date'))->formatLocalized('%d %B %Y') }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Warna</b>
                    </td>
                    <td>
                        <b>:</b>
                    </td>
                    <td>
                        <span style="color: {{ $s->get('warna') }};"><b>{{ $s->get('warna') }}</b></span>
                    </td>
                </tr>
                
            </table>
        </td>
        <td></td>
    </tr>

    
    <tr><td colspan="2"><h2>Form :</h2></td></tr>
    <tr>
        @if($s->get('setupForm')->isNotEmpty())
        
        <td colspan="2">
            <table class="table align-middle table-row-dashed table-row-gray-400">
                    <tr class="fw-bolder border-bottom border-gray-600 fs-4">
                        <th>Nama Form</th>
                        <th>Syarat</th>
                        <th>Aksi</th>
                    </tr>        

                @foreach ($s->get('setupForm') as $f)
                <tr>
                    <td>{{ $f->get('nama_setup_form') }}</td>
                    <td>{{ $f->get('syarat_setup_form') }}</td>
                    <td>
                        <!-- panggil modal -->
                        <button class="btn btn-sm btn-primary py-0 text-nowrap d-inline"  data-bs-toggle="modal" data-bs-target="#kt_modal_4" onclick="indexEditMaintenance({{ $loop->parent->index }}, {{ $loop->index }}, '{{ $f->get('nama_setup_form') }}', '{{ $f->get('syarat_setup_form') }}')">
                            <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen055.svg-->
                            <span class="svg-icon svg-icon-muted svg-icon-7"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="black"/>
                                <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="black"/>
                                <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="black"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <span>Edit</span>
                    </button>
                    
                    
                    <form action="/maintenance/form/delete/" method="post" onSubmit="return hapusSetup(this);" style ="display:inline-block;">
                        @csrf
                        <input type="hidden" name="maintenance_index" value="{{ $loop->parent->index }}">
                        <input type="hidden" name="form_index" value="{{ $loop->index }}">
                        <button class="btn btn-sm btn-danger py-0 text-nowrap" type="submit">
                        <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen027.svg-->
                            <span class="svg-icon svg-icon-muted svg-icon-7">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path fill="white" d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                    <path fill="white" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                  </svg>
                                </span>
                            <!--end::Svg Icon-->
                        <!--end::Svg Icon-->
                        <span>Hapus</span>
                        </button>
                    </form>
                </td>
            </tr>
            
            @endforeach

        </table>
    </td>
          
                
        
        
        @else
        <td colspan="2">(kosong)</td>
        @endif
    </tr>
    
    
    
    
    @endforeach
    
</table>
@else

<h2 class="text-center my-7">*Masih Kosong*</h2>

@endif

@endsection


@section('customJs')
    <script>
function setSatuan(periode) {
    document.getElementById('satuan_periode').value = periode;
    }

function setEditSatuan(periode) {
    document.getElementById('edit_satuan_periode').value = periode;
    }

function setEdit(index, nama_setup_maintenance, periode, satuan_periode, start_date, warna){
    document.getElementById('edit_index').value = index;
    document.getElementById('edit_maintenance_form').value = nama_setup_maintenance;
    document.getElementById('edit_periode_form').value = periode;
    document.getElementById('edit_satuan_periode').value = satuan_periode;
    document.getElementById('edit_tanggal_form').value = start_date;
    document.getElementById('edit_warna').value = warna;
    }    

function indexMaintenance(index) {
    document.getElementById('maintenance_index').value = index;
}

function indexEditMaintenance(indexMaintenance, index, form, syarat){
    document.getElementById('edit_maintenance_index').value = indexMaintenance;
    document.getElementById('edit_form_index').value = index;
    document.getElementById('edit_form_form').value = form;
    document.getElementById('edit_form_syarat').value = syarat;
}


function clearValue(){

x = document.getElementsByClassName('clear-form');
x.forEach(element => {
    element.value = ""
});
}


$('.input-group.date').datepicker({
    format: "dd-mm-yyyy",
    todayBtn: "linked",
    language: "id",
    autoclose: true,
    todayHighlight: true
});


    </script>
@endsection