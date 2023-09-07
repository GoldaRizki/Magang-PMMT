@extends('layouts.simpleTable')

@section('customAddData')

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
        <br>
        <span>Mohon dicek barangkali nilai yang anda masukkan sudah ada di dalam tabel</span>
        <br>
        
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



        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#kt_modal_2">
            <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen035.svg-->
            <span class="svg-icon svg-icon-muted svg-icon-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"/>
                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black"/>
                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black"/>
                </svg>
            </span>
    <!--end::Svg Icon-->
            Tambahkan
        </button>


<div class="modal fade" tabindex="-1" id="kt_modal_2">
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
        
                    <form action="/ruang/create" method="post">
        
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
                                  <li><a class="dropdown-item" onclick="setBagian1('Keuangan')">Keuangan</a></li>
                                  <li><a class="dropdown-item" onclick="setBagian1('Admin')">Admin</a></li>
                                  <li><a class="dropdown-item" onclick="setBagian1('Manajemen')">Manajemen</a></li>

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


<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Ruang</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" onclick="aksiBatal()" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <form action="/ruang/update" method="POST">

                @method('put')
                @csrf

            <div class="modal-body">
                <table class="table table-sm table-stripped text-center">
                    <thead>
                        <tr class="fw-bold fs-6 text-gray-900 border-bottom-1 border-gray-400">
                            <th>Id</th>
                            <th>Ruang</th>
                            <th>No Ruang</th>
                            <th>Bagian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id='idRuang'></td>
                            <td id='noRuang'></td>
                            <td id='namaRuang'></td>
                            <td id='bagianRuang'></td>
                            
                        </tr>
                    </tbody>
                </table>

                <div class="separator separator-dashed border-gray-600 my-11"></div>

                <input type="hidden" name="id" id="edit_id">
                    <div class="mb-3">
                        <label for="ruang_form" class="form-label float-start">Ruang</label>
                        <input type="text" class="form-control ruang_form" id="edit_nama_ruang" name="nama_ruang" required>
                    </div>

                    <div class="mb-3">
                        <label for="no_ruang_form" class="form-label float-start">No Ruang</label>
                        <input type="text" class="form-control no_ruang_form" id="edit_no_ruang" name="no_ruang" required>
                    </div>

                    <div class="input-group mb-3">
                        <button class="btn btn-primary btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">BAGIAN</button>
                        <ul class="dropdown-menu"> 
                          <li><hr class="dropdown-divider"></li>                                  
                          <li><a class="dropdown-item" onclick="setBagian2('Keuangan')">Keuangan</a></li>
                          <li><a class="dropdown-item" onclick="setBagian2('Admin')">Admin</a></li>
                          <li><a class="dropdown-item" onclick="setBagian2('Manajemen')">Manajemen</a></li>

                        </ul>
                        <input type="text" class="form-control bagian_form @error('bagian') is-invalid @enderror" aria-label="Bagian" name="bagian" value="{{ old('bagian') }}" id="bagian2" readonly>
                        @error('bagian')    
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
@endsection

    <!-- iki Thead -->
@section('tableHead')

        <th>Id</th>
        <th>Ruang</th>
        <th>No Ruang</th>
        <th>Bagian</th>
        <th>Aksi</th>

@endsection

     
@section('tableBody')

        @foreach ($ruang as $r)
        <tr>
            <td>{{ $r->id }}</td>
            <td>{{ $r->nama_ruang }}</td>
            <td>{{ $r->no_ruang }}</td>
            <td>{{ $r->bagian }}</td>
            <td class="tombolAksi">

                <button type="button" class="btn btn-sm btn-primary py-0" onclick="aksiEdit({{ $r->id }}, '{{ $r->nama_ruang }}', '{{ $r->no_ruang }}', '{{ $r->bagian }}')" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                    Edit
                </button>
               

       
             
             <form action="/ruang/destroy" method="post" style ='display:inline-block;'>
                 @method('delete')
                 @csrf
                 <input type="hidden" name="id" value="{{ $r->id }}">
                 <button class="btn btn-sm btn-danger py-0" type="submit">
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
    
@endsection

@section('customJs2')
<script>

    function aksiBatal(){
   

        x = document.getElementsByClassName('ruang_form');
        y = document.getElementsByClassName('no_ruang_form');
        z = document.getElementsByClassName('bagian_form');


        x.forEach(element => {
            element.value = "";
        });

        y.forEach(element => {
            element.value = "";
        });

        z.forEach(element => {
            element.value = "";
        });

        
    }

        function aksiEdit(id, ruang, noRuang, bagian){
       
       document.getElementById('bagianRuang').innerHTML = bagian;
       document.getElementById('idRuang').innerHTML = id;
       document.getElementById('namaRuang').innerHTML = ruang;
       document.getElementById('noRuang').innerHTML = noRuang;


       document.getElementById('edit_id').value = id;
       document.getElementById('bagian2').value = bagian;
       document.getElementById('edit_nama_ruang').value = ruang;
       document.getElementById('edit_no_ruang').value = noRuang;


       
        }


        function setBagian1(bagian) {
            document.getElementById('bagian1').value = bagian;
        }

        function setBagian2(bagian) {
            document.getElementById('bagian2').value = bagian;
        }

        

</script>
@endsection