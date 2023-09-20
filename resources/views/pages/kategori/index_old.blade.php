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
        <span>Pesan Error: </span>
        @foreach ($errors as $e)
            <span>{{ $e }}</span>
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

<form action="/kategori/create" method="POST" class="row g-3 justify-content-center">

    @csrf
  
    <div class="col-auto">
        <label for="inputKategori" class="visually-hidden">Kategori</label>
        <input type="text" class="form-control" id="inputKategori" name="nama_kategori">
       
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">
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
      </div>

</form>



<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kategori</h5>

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

            <form action="/kategori/update" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <table class="table table-sm table-stripped text-center">
                    <thead>
                        <tr class="fw-bold fs-6 text-gray-900 border-bottom-1 border-gray-400">
                            <th>Id</th>
                            <th>Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id='idKategori'></td>
                            <td id='namaKategori'></td>
                        </tr>
                    </tbody>
                </table>

                <div class="separator separator-dashed border-gray-600 my-11"></div>

                    <div class="mb-3">
                        <input type="hidden" name="id" id="idKategori_input">
                        <label for="kategori_form" class="form-label float-start">Kategori</label>
                        <input type="text" class="form-control" id="kategori_form" name="nama_kategori">
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
                    <span class="text-nowrap">Tutup</span>
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

        <th>No</th>
        <th>Kategori</th>
        <th>Aksi</th>

@endsection



@section('data')
<script>
			//makan bang
    $('#tabelTemplate').DataTable({
      
pageLength: 25,
responsive: true,
processing: true,
dom:'<"top"lf>rtip<"bottom"><"clear">',
serverSide: true,
ajax: "/kategori",
columns: [
{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
{data: 'nama_kategori', name: 'nama_kategori'},
{data: 'aksi', name: 'aksi', orderable: false, searchable: false},
//{data: 'kategori', name: 'kategori', orderable: false, searchable: false},
]

    });
  

</script>
@endsection

@section('customJs2')
<script>

    function aksiEdit(id, kategori){
            document.getElementById('idKategori').innerHTML = id;
            document.getElementById('idKategori_input').value = id;
            document.getElementById('namaKategori').innerHTML = kategori;
            
        }

    function clearValue() {
        document.getElementById('kategori_form').value = "";
    }
    
</script>
@endsection