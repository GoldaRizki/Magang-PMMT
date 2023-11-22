@extends('layouts.tray_layout')


@section('customCss')

@endsection

@section('before_content')







<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Setup Maintenance</h5>

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

            <form action="/setupMaintenance/create/" method="POST">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="kategori_id" value="{{ $id }}">
            
                    <div class="mb-3">
                        <label for="setup_maintenance_form" class="form-label float-start">Nama Maintenance</label>
                        <input type="text" class="form-control clear-form" id="setup_maintenance_form" value="{{ old('nama_setup_maintenance') }}" name="nama_setup_maintenance">
                    </div>

                    <div class="mb-3">
                        <label for="periode_form" class="form-label float-start">Periode</label>
                        <input type="number" class="form-control clear-form" id="periode_form" value="{{ old('periode') }}" name="periode">
                    </div>

                    <div class="input-group mb-3">
                        <button class="btn btn-primary btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Satuan</button>
                        <ul class="dropdown-menu"> 
                          <li><a class="dropdown-item" onclick="setSatuan('Jam')">Jam</a></li>
                          <li><a class="dropdown-item" onclick="setSatuan('Hari')">Hari</a></li>
                          <li><a class="dropdown-item" onclick="setSatuan('Minggu')">Minggu</a></li>
                          <li><a class="dropdown-item" onclick="setSatuan('Bulan')">Bulan</a></li>
                          <li><a class="dropdown-item" onclick="setSatuan('Tahun')">Tahun</a></li>

                        </ul>
                        <input type="text" class="form-control clear-form" aria-label="Satuan" name="satuan_periode" value="{{ old('satuan_periode') }}" id="satuan_periode" readonly>
                      
                    </div>

                    <div class="my-5">
                        <div class="p-2 fw-bold">Warna</div>
                        <div class="p-2"><input type="color" class="form-control form-control-color" name="warna" id="create_warna" value="{{ old('warna','#0095E8') }}">
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
                <h5 class="modal-title">Edit Setup Maintenance</h5>

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

            <form action="/setupMaintenance/edit" method="POST">
                @method('put')
                @csrf
            <div class="modal-body">
                <input type="hidden" name="id" class="clear-form" id="edit_id">
                <input type="hidden" name="kategori_id" class="clear-form" id="edit_kategori_id">

                    <div class="mb-3">
                        <label for="edit_setup_maintenance_form" class="form-label float-start">Nama Maintenance</label>
                        <input type="text" class="form-control clear-form" id="edit_setup_maintenance_form" value="{{ old('nama_setup_maintenance') }}" name="nama_setup_maintenance">
                    </div>

                    <div class="mb-3">
                        <label for="edit_periode_form" class="form-label float-start">Periode</label>
                        <input type="number" class="form-control clear-form" id="edit_periode_form" value="{{ old('periode') }}" name="periode">
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

                    <div class="my-5">
                        <div class="p-2 fw-bold">Warna</div>
                        <div class="p-2"><input type="color" class="form-control form-control-color" name="warna" id="edit_warna" value="{{ old('warna','#0095E8') }}">
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
                <h5 class="modal-title">Tambah Kategori</h5>

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

            <form action="/setupMaintenance/kategori/update" method="POST">
            @method('put')
            @csrf
            <div class="modal-body">
            
                    <input type="hidden" name="id" id="edit_for_kategori_id">
                    <div class="mb-3">
                        <label for="kategori_form" class="form-label float-start">Edit Kategori</label>
                        <input type="text" class="form-control clear-form" id="edit_kategori_form" name="nama_kategori">
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
                <h5 class="modal-title">Tambah Setup Form</h5>

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

            <form action="/setupForm/create/" method="POST">
                @csrf
            <div class="modal-body">
            
                    <input type="hidden" name="kategori_id" value="{{ $id }}">
                    <input type="hidden" name="setup_maintenance_id" id="create_setup_maintenance_id">
                    <div class="mb-3">
                        <label for="create_form_form" class="form-label float-start">Nama Form</label>
                        <input type="text" class="form-control clear-form" id="create_form_form" name="nama_setup_form">
                    </div>
                    <div class="mb-3">
                        <label for="create_form_syarat" class="form-label float-start">Syarat</label>
                        <input type="text" class="form-control clear-form" id="create_form_syarat" name="syarat">
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



<div class="modal fade" tabindex="-1" id="kt_modal_5">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Setup Form</h5>

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

            <form action="/setupForm/edit/" method="POST">
                @method('put')
                @csrf
            <div class="modal-body">
            
                    <input type="hidden" name="kategori_id" value="{{ $id }}">
                    <input type="hidden" name="id" id="edit_setup_form_id">
                    <div class="mb-3">
                        <label for="edit_form_form" class="form-label float-start">Nama Form</label>
                        <input type="text" class="form-control clear-form" id="edit_form_form" name="nama_setup_form">
                    </div>
                    <div class="mb-3">
                        <label for="edit_form_syarat" class="form-label float-start">Syarat</label>
                        <input type="text" class="form-control clear-form" id="edit_form_syarat" name="syarat">
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

   

@endsection


@section('content_right')
<table class="table gs-7 align-middle">
    <tr class="table-primary">
        <td class="fw-bold fs-2">{{ $nama_kategori }}</td>
        <td class="text-end">
            @canany(['supervisor', 'admin'])

            <form action="/kategori/destroy" method="post" onSubmit="return hapus(this);" style ="display:inline-block;">
                @method("delete")
                @csrf
                <input type="hidden" name="id" value="{{ $id }}">
                <button class="btn btn-sm btn-danger text-nowrap" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path fill="white" d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                        <path fill="white" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                    </svg>
                </button>
            </form>


            <button class="btn btn-sm btn-dark text-nowrap d-inline" data-bs-toggle="modal" data-bs-target="#kt_modal_3" onclick="setEditKategori({{ $id }}, '{{ $nama_kategori }}')">
                <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen055.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="white"/>
                        <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="white"/>
                        <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="white"/>
                    </svg>
            <!--end::Svg Icon-->
            </button>


            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="white">
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="white"/>
                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="white"/>
                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="white"/>
                </svg>
            </button>
            @endcanany
        </td>
    </tr>

    <tr>
    @if ($kategori->setupMaintenance->isEmpty())
    
        <td>(kosong)</td>
    
    @else
    
    <td colspan="2">
    <table class="table fs-5 align-middle">
        @foreach ($kategori->setupMaintenance as $s)
        <tr class="fs-3 bg-secondary">
            <td class="fw-bolder">{{ $s->nama_setup_maintenance }}</td>
            <td class="text-end">{{ $s->periode }}</td>
            <td>{{ $s->satuan_periode }}</td>
            <td><span style="color: {{ $s->warna }};" class="bg-white px-2 rounded-2">{{ $s->warna }}</span></td>
            <td>
                @canany(['supervisor', 'admin'])
                    <!-- panggil modal -->
                <button class="btn btn-sm btn-primary py-0 text-nowrap d-inline"  data-bs-toggle="modal" data-bs-target="#kt_modal_2" onclick="setEdit({{ $s->id }}, {{ $s->kategori_id }},'{{ $s->nama_setup_maintenance }}', {{ $s->periode }}, '{{ $s->satuan_periode }}', '{{ $s->warna }}')">
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
                
                
                <form action="/setupMaintenance/destroy" method="post" onSubmit="return hapus(this);" style ="display:inline-block;">
                    @method("delete")
                    @csrf
                    <input type="hidden" name="id" value="{{ $s->id }}">
                    <input type="hidden" name="kategori_id" value="{{ $s->kategori_id }}">
                    <button class="btn btn-sm btn-danger py-0 text-nowrap" type="submit">
                      <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen027.svg-->
                     <span class="svg-icon svg-icon-muted svg-icon-7">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path fill="white" d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                        <path fill="white" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                      </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <span>Hapus</span>
                    </button>
                </form>

                <button class="btn btn-sm btn-warning text-dark py-0 text-nowrap d-inline"  data-bs-toggle="modal" data-bs-target="#kt_modal_4" onclick="createSetupForm({{ $s->id }})">

                    <span class="svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="black">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"/>
                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black"/>
                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black"/>
                        </svg>
                    </span>


                    
                    <span>Form</span>
            </button>
                @endcanany
            </td>
        </tr>
        <tr>
            <td colspan="5">
                       @if ($kategori->setupForm->where('setup_maintenance_id', $s->id)->isNotEmpty())
                   
                   <table class="table table-row-dashed table-row-gray-400 gs-7 g-1">
                        <tr class="fw-bolder text-gray-800">
                            <th>Nama Form</th>
                            <th>Syarat</th>
                            <th>Aksi</th>
                        
                        </tr>
                        @foreach ($kategori->setupForm->where('setup_maintenance_id', $s->id) as $f)
                        <tr>
                            <td>{{ $f->nama_setup_form }}</td>
                            <td>{{ $f->syarat }}</td>
                            <td>
                                @canany(['supervisor', 'admin'])
                                <button onclick="editSetupForm({{ $f->id }}, '{{ $f->nama_setup_form }}', '{{ $f->syarat }}')" data-bs-toggle="modal" data-bs-target="#kt_modal_5" class="btn text-primary p-0 m-0">Edit</button>&nbsp;|
                                <form action="/setupForm/delete/" method="post" onSubmit="return hapus(this);" style ="display:inline-block;">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="kategori_id" value="{{ $id }}">
                                    <input type="hidden" name="id" value="{{ $f->id }}">
                                    <button class="btn text-danger p-0 m-0">Hapus</button>
                                </form>
                                @else
                                 - 
                                @endcanany
                                

                            </td>
                        
                        </tr>
                        @endforeach
                        
                    
      
                    </table>
                   
                   @else

                   <p>*kosong*</p>

                   @endif
                    

            </td>
        </tr>
            
        @endforeach
    </table>
    </td>
    
    @endif
    </tr>
   



    
@endsection


@section('customJs')
<script>

 function clearValue(){

    x = document.getElementsByClassName('clear-form');
    x.forEach(element => {
        element.value = ""
    });


 }

 function setSatuan(periode) {
    document.getElementById('satuan_periode').value = periode;
    }

function setEditSatuan(periode) {
    document.getElementById('edit_satuan_periode').value = periode;
    }

function setEdit(id,kategori_id ,nama_setup_maintenance, periode, satuan_periode, warna){
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_kategori_id').value = kategori_id; 
    document.getElementById('edit_setup_maintenance_form').value = nama_setup_maintenance;
    document.getElementById('edit_periode_form').value = periode;
    document.getElementById('edit_satuan_periode').value = satuan_periode;
    document.getElementById('edit_warna').value = warna;

}

function setEditKategori(id, kategori) {
    document.getElementById('edit_for_kategori_id').value = id;
    document.getElementById('edit_kategori_form').value = kategori;
}

function setEditSatuan(periode) {
    document.getElementById('edit_satuan_periode').value = periode;
    }




function createSetupForm(setup_maintenance_id){
    document.getElementById('create_setup_maintenance_id').value = setup_maintenance_id;
}

function editSetupForm(id, nama_setup, syarat) {
    document.getElementById('edit_setup_form_id').value = id;
    document.getElementById('edit_form_form').value = nama_setup;
    document.getElementById('edit_form_syarat').value = syarat;
}


</script>
@endsection