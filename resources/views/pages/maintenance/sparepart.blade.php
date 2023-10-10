@extends('layouts.tray_layout')

@section('before_content')
<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <form action="/sparepart/maintenance/" method="post">
        @csrf
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Sparepart</h5>
                    
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
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

            <div class="modal-body">

                <input type="hidden" id="maintenance_id" name="maintenance_id">

                <div class="mb-3">
                    <label for="id_sparepart" class="form-label">Sparepart</label>
                    <select class="form-select" id="id_sparepart" @error('sparepart_id') is-invalid @enderror name="sparepart_id">
                    <option selected> -- Silahkan Pilih -- </option>
                    
                    @foreach ($sparepart as $s)
                    
                    <option value="{{ $s->id }}">{{ $s->nama_sparepart }} -- {{ $s->id }}</option>
                        
                    @endforeach   
                </select>
                </div>


                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Jumlah" value="{{ old('jumlah', 1) }}" name="jumlah">
                    @error('jumlah')    
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
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

<table class="table gs-5">

    @foreach ($maintenance as $m)
    
<tr class="table-primary">
    <td class="fw-bold fs-1">{{ $m->nama_maintenance }}</td>

    <td class="text-end">

        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_1" onclick="indexMaintenance({{ $m->id }})">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="white">
                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="white"/>
                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="white"/>
                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="white"/>
            </svg>
        </button>

    </td>
</tr>

<tr>
    <td colspan="2">

        @if($m->sparepart->isNotEmpty())
        <table class="table align-middle fs-5 table-row-dashed table-row-gray-400 gs-7 g-3">
            
            <tr class="fw-bolder text-gray-800">
                <td>Item Number</td>
                <td>Nama Sparepart</td>
                <td>Harga</td>
                <td>Jumlah</td>
                <td>Satuan</td>
                <td>Aksi</td>
            </tr>
            
        @foreach ($m->sparepart as $s)
            <tr>
                <td>{{ $s->id }}</td>
                <td>{{ $s->nama_sparepart }}</td>
                <td>{{ $s->harga }}</td>
                <td>{{ $s->pivot->jumlah }}</td>
                <td>{{ $s->satuan }}</td>
                <td><form action="/sparepart/maintenance/delete/" method="post" onSubmit="return hapusSetup(this);" style ="display:inline-block;">
                    @method('delete')
                    @csrf
                    <input type="hidden" name="maintenance_id" value="{{ $m->id }}">
                    <input type="hidden" name="sparepart_id" value="{{ $s->id }}">
                    <button class="btn btn-sm py-1 btn-danger text-nowrap" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path fill="white" d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                            <path fill="white" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                        </svg>
                    </button>
                </form></td>
            </tr>
            
           
            @endforeach
            

            
        </table>
        @else
            <b>Kosong</b>
        @endif
        
        
    </td>
</tr>

@endforeach

</table>

@endsection

@section('customJs')
    <script>

    function indexMaintenance(index) {
        document.getElementById('maintenance_id').value = index;
    }

    </script>
@endsection