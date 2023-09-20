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

            <form action="/setupMaintenance/create" method="POST">
            @csrf
            <div class="modal-body">

                <input type="hidden" name="kategori_id" value="{{ $id }}">
            
                    <div class="mb-3">
                        <label for="setup_maintenance_form" class="form-label float-start">Nama Maintenance</label>
                        <input type="text" class="form-control" id="setup_maintenance_form" name="nama_setup_maintenance">
                    </div>

                    <div class="mb-3">
                        <label for="periode_form" class="form-label float-start">Periode</label>
                        <input type="number" class="form-control" id="periode_form" name="periode">
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
                        <input type="text" class="form-control satuan_form" aria-label="Satuan" name="satuan_periode" value="{{ old('satuan_periode') }}" id="satuan_periode" readonly>
                      
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
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_1">+</button>
        </td>
    </tr>

    <tr>
    @if ($setup->isEmpty())
    
        <td>(kosong)</td>
    
    @else
    
    <td colspan="3">
    <table class="table align-middle">
        @foreach ($setup as $s)
        <tr>
            <td>{{ $s->nama_setup_maintenance }}</td>
            <td>{{ $s->periode }}</td>
            <td>{{ $s->satuan_periode }}</td>
            <td>
                <a href="#">
                    <button class="btn btn-sm btn-primary py-0 text-nowrap d-inline">
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
                </a>
                
                <form action="" method="post" onSubmit="return hapus(this);" style ="display:inline-block;">
                    @method("delete")
                    @csrf
                    <input type="hidden" name="id" value="">
                    <button class="btn btn-sm btn-danger py-0 text-nowrap" type="submit">
                      <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen027.svg-->
                    <span class="svg-icon svg-icon-muted svg-icon-7"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"/>
                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"/>
                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"/>
                    </svg></span>
                        <!--end::Svg Icon-->
                    </span>
                    <!--end::Svg Icon-->
                    <span>Hapus</span>
                    </button>
                </form>
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
    document.getElementById('setup_maintenance_form').value = "";
    document.getElementById('periode_form').value = "";
    document.getElementById('satuan_periode').value = "";
 }

 function setSatuan(periode) {
    document.getElementById('satuan_periode').value = periode;
    }
</script>
@endsection