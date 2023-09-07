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


    <form action="/mesin/update" method="POST">

        @method('put')
        @csrf

        <input type="hidden" name="id" value="{{ $mesin->id }}">

        <div class="mb-3">
            <label for="mesin" class="form-label">Nama Mesin</label>
            <input type="text" class="form-control @error('nama_mesin') is-invalid @enderror" id="mesin" placeholder="Nama Mesin" value="{{ old('nama_mesin', $mesin->nama_mesin) }}" name="nama_mesin">
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
            <input type="text" class="form-control @error('kategori_id') is-invalid @enderror" aria-label="Kategori" name="form_kategori" id="form_kategori" value="{{ old('form_kategori', $mesin->kategori->nama_kategori) }}" readonly>
            @error('kategori_id')    
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <input type="hidden" id="kategori" name="kategori_id" value="{{ old('kategori_id', $mesin->kategori_id) }}">

        <div class="input-group mb-3">
            <button class="btn btn-primary btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">RUANG</button>
            <ul class="dropdown-menu"> 
              <li><a class="dropdown-item" href="/ruang">+ Tambah Ruang</a></li>
              <li><hr class="dropdown-divider"></li>

              @foreach ($ruang as $r)
              
              <li><a class="dropdown-item" onclick="setRuang({{ $r->id }},'{{ $r->nama_ruang }}')">{{ $r->nama_ruang }}</a></li>

              @endforeach

             
            </ul>
            <input type="text" class="form-control @error('ruang_id') is-invalid @enderror" aria-label="Ruang" name="form_ruang" value="{{ old('form_ruang', $mesin->ruang->nama_ruang) }}" id="form_ruang" readonly>
            @error('ruang_id')    
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <input type="hidden" id="ruang" name="ruang_id" value="{{ old('ruang_id', $mesin->ruang_id) }}">
          
          
        <div class="mb-3">
            <label for="spesifikasi" class="form-label">Spesifikasi (opsional)</label>
            <textarea class="form-control" id="spesifikasi" name="spesifikasi" rows="9">{{ old('spesifikasi', $mesin->spesifikasi) }}</textarea>
        </div>

        <div class="container-fluid">
            
            <a href="/mesin">
            <button type="button" class="btn btn-lg btn-secondary d-inline">

                    <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr046.svg-->
                    <span class="svg-icon svg-icon-muted svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M14 6H9.60001V8H14C15.1 8 16 8.9 16 10V21C16 21.6 16.4 22 17 22C17.6 22 18 21.6 18 21V10C18 7.8 16.2 6 14 6Z" fill="black"/>
                            <path opacity="0.3" d="M9.60002 12L5.3 7.70001C4.9 7.30001 4.9 6.69999 5.3 6.29999L9.60002 2V12Z" fill="black"/>
                        </svg>
                    </span>
                    <span>Kembali</span>
                    <!--end::Svg Icon-->
                </button>
                    
                </a>
                
        <button type="submit" class="btn btn-lg btn-primary d-inline">
            <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil008.svg-->
            <span class="svg-icon svg-icon-muted svg-icon-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM11.7 17.7L16.7 12.7C17.1 12.3 17.1 11.7 16.7 11.3C16.3 10.9 15.7 10.9 15.3 11.3L11 15.6L8.70001 13.3C8.30001 12.9 7.69999 12.9 7.29999 13.3C6.89999 13.7 6.89999 14.3 7.29999 14.7L10.3 17.7C10.5 17.9 10.8 18 11 18C11.2 18 11.5 17.9 11.7 17.7Z" fill="black"/>
            <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black"/>
            </svg></span>
            <!--end::Svg Icon-->
            Simpan Perubahan
        </button>
       
        </div>
        

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