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












@endsection

@section('content_left')
    
    <table class="table table-row-dashed table-row-gray-400 gs-1">
        <tr>
            <td><b>Nama Mesin</b></td>
            <td>{{ $mesin->nama_mesin }}</td>
        </tr>
        <tr>
            <td><b>Nomor Asset</b></td>
            <td>{{ $mesin->no_asset }}</td>
        </tr>
        <tr>
            <td><b>Ruang</b></td>
            <td>{{ $mesin->ruang->nama_ruang }}</td>
        </tr>
        <tr>
            <td><b>Kategori</b></td>
            <td>{{ $mesin->kategori->nama_kategori }}</td>
        </tr>
    </table>

    @canany(['supervisor', 'admin'])
          <form action="/mesin/maintenance/create/" method="post">
            @csrf
            <input type="hidden" name="mesin_id" value="{{ $mesin->id }}">

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
        </form>
<!--
          <form action="/maintenance/submit/" method="post">
            @method('put')
            @csrf
            <button class="btn btn-warning mb-3 text-dark container-fluid" type="submit">
            <span class="svg-icon-dark svg-icon-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"/>
                <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black"/>
                </svg>
            </span>
    
            <span>Simpan Perubahan</span>
            </button>
        </form>
    -->


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

        @endcanany


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
    
@if($maintenance->isNotEmpty())
<table class="table gs-7 align-middle">
    
    
    @foreach ($maintenance as $m)
    
    <tr class="table-primary">
        <td class="fw-bold fs-1">{{ $m->nama_maintenance }}</td>

        <td class="text-end">
            @canany(['supervisor', 'admin'])

            <form action="/mesin/maintenance/delete/" method="post" onSubmit="return hapusSetup(this);" style ="display:inline-block;">
                @method('delete')
                @csrf
                <input type="hidden" name="maintenance_id" value="{{ $m->id }}">
                <input type="hidden" name="mesin_id" value="{{ $mesin->id }}">
                <button class="btn btn-sm btn-danger text-nowrap" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path fill="white" d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                        <path fill="white" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                    </svg>
                </button>
            </form>
            
            <form action="/mesin/maintenance/edit/" method="post" style ="display:inline-block;">
                @method('put')
                @csrf
                <input type="hidden" name="mesin_id" value="{{ $mesin->id }}">
                <input type="hidden" name="maintenance_id" value="{{ $m->id }}">
                <button type="submit" class="btn btn-sm btn-dark text-nowrap d-inline">
                    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen055.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="white"/>
                            <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="white"/>
                            <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="white"/>
                        </svg>
                <!--end::Svg Icon-->
                </button>
            </form>

            @endcanany

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
                        {{ $m->periode }}&nbsp;{{ $m->satuan_periode }}
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


                        {{ Illuminate\Support\Carbon::parse($m->start_date)->formatLocalized('%d %B %Y') }}
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
                        <span style="color: {{ $m->warna }};"><b>{{ $m->warna }}</b></span>
                    </td>
                </tr>
                
            </table>
        </td>
        <td></td>
    </tr>

    
    <tr><td colspan="2"><h2>Form :</h2></td></tr>
    <tr>
        
        @if($form->where('maintenance_id', $m->id)->isNotEmpty())
        
        <td colspan="2">
            <table class="table align-middle table-row-dashed table-row-gray-400">
                    <tr class="fw-bolder border-bottom border-gray-600 fs-4">
                        <th>Nama Form</th>
                        <th>Syarat</th>
                        
                    </tr>        

                @foreach ($form->where('maintenance_id', $m->id) as $f)
                <tr>
                    <td>{{ $f->nama_form }}</td>
                    <td>{{ $f->syarat }}</td>
                    
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