@extends('layouts/header')


@section('konten')
<div class="modal fade" tabindex="-1" id="kt_modal_1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Ruang</h5>
        
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" onclick="aksiBatal()" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>
        
                    <form action="/mesin/ruang/create" method="post">
        
                    @csrf
                    <div class="modal-body">
              
                            <div class="mb-3">
                                <label for="ruang_form" class="form-label float-start">Ruang</label>
                                <input type="text" class="form-control ruang_form" name="nama_ruang" required>
                            </div>
        
                            <div class="mb-3">
                                <label for="no_ruang_form" class="form-label float-start">No Ruang</label>
                                <input type="text" class="form-control no_ruang_form" name="no_ruang" required>
                            </div>


                            <div class="input-group mb-3">
                                <button class="btn btn-primary btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">BAGIAN</button>
                                <ul class="dropdown-menu"> 
                                  <li><hr class="dropdown-divider"></li>                                  
                                  <li><a class="dropdown-item" onclick="setBagian1('Gedung A')">Gedung A</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung B')">Gedung B</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung C')">Gedung C</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung D')">Gedung D</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung E')">Gedung E</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung F')">Gedung F</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung G')">Gedung G</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung H')">Gedung H</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung I')">Gedung I</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung J')">Gedung J</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung K')">Gedung K</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung L')">Gedung L</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung M')">Gedung M</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung N')">Gedung N</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung O')">Gedung O</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung P')">Gedung P</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung Q')">Gedung Q</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung R')">Gedung R</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung S')">Gedung S</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung T')">Gedung T</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung U')">Gedung U</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung V')">Gedung V</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung W')">Gedung W</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung X')">Gedung X</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung Y')">Gedung Y</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung Z')">Gedung Z</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung AA')">Gedung AA</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung AB')">Gedung AB</a></li>
                                    <li><a class="dropdown-item" onclick="setBagian1('Gedung AC')">Gedung AC</a></li>

                                </ul>
                                <input type="text" class="form-control bagian_form" aria-label="Bagian" name="bagian" value="{{ old('bagian') }}" id="bagian1" readonly>
                              
                            </div>
                                                          
        
                    </div>
        
                    <div class="modal-footer">
                        <button type="button" onclick="aksiBatal()" class="btn btn-secondary" data-bs-dismiss="modal">
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

        <div class="mb-3">
            <label for="no_asset" class="form-label">No Asset</label>
            <input type="text" class="form-control @error('no_asset') is-invalid @enderror" id="no_asset" placeholder="Nomor Asset" value="{{ old('no_asset') }}" name="no_asset">
            @error('no_asset')    
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="tipe_mesin" class="form-label">Tipe Mesin</label>
            <input type="text" class="form-control @error('tipe_mesin') is-invalid @enderror" id="tipe_mesin" placeholder="Tipe Mesin" value="{{ old('tipe_mesin') }}" name="tipe_mesin">
            @error('tipe_mesin')    
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kode_mesin" class="form-label">Kode Mesin</label>
            <input type="text" class="form-control @error('kode_mesin') is-invalid @enderror" id="kode_mesin" placeholder="Kode Mesin" value="{{ old('kode_mesin') }}" name="kode_mesin">
            @error('kode_mesin')    
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nomor_seri" class="form-label">Nomor Seri</label>
            <input type="text" class="form-control @error('nomor_seri') is-invalid @enderror" id="nomor_seri" placeholder="Nomor Seri" value="{{ old('nomor_seri') }}" name="nomor_seri">
            @error('nomor_seri')    
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="input-group mb-4">
            <button class="btn btn-primary btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">RUANG</button>
            <ul class="dropdown-menu"> 
              <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#kt_modal_1">+ Tambah Ruang</a></li>
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
          

        <div class="mb-4">
        <label for="pic" class="form-label">Person In Charge (PIC)</label>
         <select class="form-select @error('user_id') is-invalid @enderror" id="pic" aria-label="Pilihan untuk PIC" value="{{ old('user_id') }}" name="user_id">
            <option value="" selected> -- Pilih PIC -- </option>

            @foreach ($user as $u)
            <option value="{{ $u->id }}">{{ $u->nama }}</option>
            @endforeach
            
          </select>
          @error('user_id')    
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
          
        <div class="mb-3">
            <label for="spesifikasi" class="form-label">Spesifikasi (opsional)</label>
            <p>Isian tidak boleh mengandung karakter petik (") maupun (')</p>
            <p class="text-danger">
                @error('spesifikasi')    
                 {{ $message }}
                @enderror
            </p>
            <textarea id="kt_docs_tinymce_basic" name="spesifikasi" class="tox-target">{{ old('spesifikasi') }}</textarea>

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


<script src="/assets/plugins/custom/tinymce/tinymce.bundle.js"></script>

<script>

    function setRuang(id_ruang, nama_ruang){
        document.getElementById('ruang').value = id_ruang;
        document.getElementById('form_ruang').value = nama_ruang;

    }

    function setBagian1(bagian) {
            document.getElementById('bagian1').value = bagian;
        }



var options = {
    selector: "#kt_docs_tinymce_basic",
    forced_root_block: false,
    newline_behavior: 'block',
    toolbar: false,
    menubar: false,
};

tinymce.init(options);

</script>


@endsection