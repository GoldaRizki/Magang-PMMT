@extends('layouts/header')


@section('konten')

<div class="container-lg mt-5">


@if($errors->any())
<!--begin::Alert-->
<div class="alert alert-dismissible bg-danger d-flex flex-column flex-sm-row p-5 mb-10">
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


    <form action="/mesin/create" method="POST">

        @csrf
        <div class="mb-3">
            <label for="mesin" class="form-label">Nama Mesin</label>
            <input type="text" class="form-control @error('nama_mesin') is-invalid @enderror" id="mesin" placeholder="Nama Mesin" value="{{ old('nama_mesin') }}" name="nama_mesin">
            @error('nama_mesin')    
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        

        <div class="input-group mb-3">
            <button class="btn btn-primary btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">KATEGORI</button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/kategori">+ Tambah Kategori</a></li>
              <li><hr class="dropdown-divider"></li>
              
              @foreach($kategori as $k)

              <li><a class="dropdown-item" onclick="setKategori({{ $k->id }},'{{ $k->nama_kategori }}')">{{ $k->nama_kategori }}</a></li>
              
              @endforeach
             
            </ul>
            <input type="text" class="form-control @error('kategori_id') is-invalid @enderror" aria-label="Kategori" name="form_kategori" id="form_kategori" value="{{ old('form_kategori') }}" readonly>
            @error('kategori_id')    
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <input type="hidden" id="kategori" name="kategori_id" value="{{ old('kategori_id') }}">

        <div class="input-group mb-3">
            <button class="btn btn-primary btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">RUANG</button>
            <ul class="dropdown-menu"> 
              <li><a class="dropdown-item" href="/ruang">+ Tambah Ruang</a></li>
              <li><hr class="dropdown-divider"></li>

              @foreach ($ruang as $r)
              
              <li><a class="dropdown-item" onclick="setRuang({{ $r->id }},'{{ $r->nama_ruang }}')">{{ $r->nama_ruang }}</a></li>

              @endforeach

             
            </ul>
            <input type="text" class="form-control @error('ruang_id') is-invalid @enderror" aria-label="Ruang" name="form_ruang" value="{{ old('form_ruang') }}" id="form_ruang" readonly>
            @error('ruang_id')    
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <input type="hidden" id="ruang" name="ruang_id" value="{{ old('ruang_id') }}">
          
          
        <div class="mb-3">
            <label for="spesifikasi" class="form-label">Spesifikasi (opsional)</label>
            <textarea class="form-control" id="spesifikasi" name="spesifikasi" rows="9" value="{{ old('spesifikasi') }}"></textarea>
        </div>


        <input type="submit" value="+ Tambah" class="btn btn-lg btn-primary float-end">
        

    </form>
</div>




<script>
    function setKategori(id_kategori, nama_kategori){
        document.getElementById('kategori').value = id_kategori;
        document.getElementById('form_kategori').value = nama_kategori;

    }

    function setRuang(id_ruang, nama_ruang){
        document.getElementById('ruang').value = id_ruang;
        document.getElementById('form_ruang').value = nama_ruang;

    }
</script>

@endsection