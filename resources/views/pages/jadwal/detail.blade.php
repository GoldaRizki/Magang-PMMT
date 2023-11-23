@extends('layouts.tray_layout')


@section('customCss')
    
@endsection

@section('before_content')
<div class="modal fade" tabindex="-1" id="kt_modal_2">
    <div class="modal-dialog">
        <form action="/sparepart/jadwal/" method="post">
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

                <input type="hidden" id="jadwal_id" name="jadwal_id" value="{{ $jadwal->id }}">

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
        <td><b>Tipe Mesin</b></td>
        <td>{{ $mesin->tipe_mesin }}</td>
    </tr>
    <tr>
      <td><b>Kode Mesin</b></td>
      <td>{{ $mesin->kode_mesin }}</td>
    </tr>
    <tr>
      <td><b>Nomor Seri</b></td>
      <td>{{ $mesin->nomor_seri }}</td>
    </tr>
    <tr>
        <td><b>Ruang</b></td>
        <td>{{ $mesin->ruang->nama_ruang }}</td>
    </tr>
    <tr>
        <td><b>Kategori</b></td>
        <td>{{ $mesin->kategori->nama_kategori }}</td>
    </tr>
    <tr>
      <td colspan="2">
        <b>Spesifikasi</b><br>
        {!! $mesin->spesifikasi !!}
      </td>
    </tr>
  </table>

  @if($jadwal->trashed())
  <div class="p-5 bg-warning h2 fw-bolder text-center rounded">
    Jadwal Sudah dihapus
  </div>
  @elseif($jadwal->status == 2)
  <div class="p-4 bg-warning text-white h5 fw-bolder text-center rounded">
    Sudah Dikerjakan oleh Teknisi
  </div>
  @elseif($jadwal->status == 3)
  <div class="p-4 bg-info text-white h5 fw-bolder text-center rounded">
    Sudah verifikasi oleh Supervisor,<br> Menunggu verifikasi manager
  </div>
  @elseif($jadwal->status == 4)
  <div class="p-4 bg-success text-white h5 fw-bolder text-center rounded">
    Sudah Dikonfirmasi oleh Manager,<br>Status Close
  </div>
  @endif

@canany(['supervisor', 'admin'])
<form action="/laporan/maintenance" class="text-center" method="POST">
@csrf

<input type="hidden" name="jadwal_id" value="{{ $jadwal->id }}">
<button class="btn btn-lg btn-primary" type="submit">
    <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil009.svg-->
    <span class="svg-icon svg-icon-muted svg-icon-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM13 15.4V10C13 9.4 12.6 9 12 9C11.4 9 11 9.4 11 10V15.4H8L11.3 18.7C11.7 19.1 12.3 19.1 12.7 18.7L16 15.4H13Z" fill="black"/>
        <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black"/>
        </svg>
    </span>
    <!--end::Svg Icon-->
    LAPORAN
</button>

</form>
@endcanany

@endsection


@section('content_right')


<form action=" @if(session()->has('form_alasan')) /jadwal/update_alasan/ @else /jadwal/update/ @endif" method="POST">
    @csrf
    @method('PUT')
    <div class="my-4">
        <h1 class="display-6">{{ $maintenance->nama_maintenance }}</h1>
        <h4 class="text-muted">Periode : {{ $maintenance->periode }} {{ $maintenance->satuan_periode }}</h4>
    </div>
    <div class="input-group my-4">
        
        <input type="hidden" name="id" value="{{ old('id', $jadwal->id)}}">

    <span class="form-label float-start">Tanggal Rencana</span>
    <div class="input-group date">
        <input type="text" class="form-control @error('tanggal_rencana')is-invalid @enderror" id="form_tanggal_rencana" value="{{ old('tanggal_rencana', Illuminate\Support\Carbon::parse($jadwal->tanggal_rencana)->format('d-m-Y'))  }}" name="tanggal_rencana" readonly @if($jadwal->status > 2) disabled @endif>
        
        <button class="btn btn-secondary" type="button"  @if($jadwal->status > 2) disabled @endif>
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

<div class="input-group my-4">
    
    <span class="form-label float-start">Tanggal Realisasi</span>
    <div class="input-group date">
        <input type="text" class="form-control @error('tanggal_realisasi') is-invalid @enderror" id="form_tanggal_realisasi" @if($jadwal->tanggal_realisasi == NULL) value="{{ old('tanggal_realisasi') }}" @else value="{{ old('tanggal_realisasi', Illuminate\Support\Carbon::parse($jadwal->tanggal_realisasi)->format('d-m-Y')) }}" @endif name="tanggal_realisasi" readonly  @if($jadwal->status > 2) disabled @endif>
        <button class="btn btn-secondary" type="button"  @if($jadwal->status > 2) disabled @endif>
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


<div class="mb-3">
    <label for="lama_pekerjaan" class="form-label">Lama Pekerjaan</label>
    <input type="text" class="form-control @error('lama_pekerjaan') is-invalid @enderror" placeholder="lama pekerjaan" id="lama_pekerjaan" value="{{ old('lama_pekerjaan', $jadwal->lama_pekerjaan) }}" name="lama_pekerjaan">
    @error('lama_pekerjaan')    
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="personel" class="form-label">Personel</label>
    <input type="text" class="form-control @error('personel') is-invalid @enderror" placeholder="personel" id="personel" value="{{ old('personel', $jadwal->personel) }}" name="personel">
    @error('personel')    
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

@if($jadwal->alasan)
<div class="form-floating my-4">
    <textarea class="form-control @error('alasan') is-invalid @enderror" placeholder="Tulis Keterangan disini...." id="form_alasan_2" style="height: 150px" name="alasan"  @if($jadwal->status > 2) disabled @endif>{{ old('alasan', $jadwal->alasan) }}</textarea>
    <label for="form_alasan_2">Alasan Terlambat</label>
</div>
@endif

<div class="mb-3">
    <label for="kt_docs_tinymce_basic" class="form-label">Keterangan</label>
    <p>Isian tidak boleh mengandung karakter petik (") maupun (')</p>
    <p class="text-danger">
        @error('keterangan')    
         {{ $message }}
        @enderror
    </p>
    <textarea id="kt_docs_tinymce_basic" name="keterangan" class="tox-target" @if($jadwal->status > 2) disabled @endif>{{ old('keterangan', $jadwal->keterangan) }}</textarea>

</div>








<div class="container m-5">

    <table class="table fs-3 table-row-dashed table-row-gray-600 gy-5 gx-4 gs-7">
        
        <tr>
            <td class="text-end"><h2>Form</h2></td>
            <td class="text-center">Syarat</td>
            <td></td>
        </tr>
  
        

        @foreach ($isi_form as $i)
        <tr>
            <td class="text-end"><b>{{ $i->form->nama_form }}</b></td>
            <td class="text-center">{{ $i->form->syarat }}</td>
            <td>
                <input type="text" class="form-control" @if(old('isi_form')) value="{{ old('isi_form')[$i->id] }}" @else value="{{ $i->nilai }}" @endif name="isi_form[{{ $i->id }}]" required  @if($jadwal->status > 2 || $jadwal->trashed()) disabled @endif>
            </td>
        </tr>
        @endforeach


    </table>
    
</div>


@if($jadwal->status == 2 && Gate::allows('supervisor'))  
    <div class="form-check my-4">
        <input class="form-check-input" type="checkbox" value="divalidasi" name="validasi" id="flexCheckDefault">
        <label class="form-check-label h2" for="flexCheckDefault">
        KONFIRMASI
        </label>
    </div>
@endif


<div class="container-fluid text-end">
    
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


@if(!$jadwal->trashed() && (Gate::allows('superuser') || Gate::denies('admin')))

<button type="submit" class="btn btn-lg btn-primary d-inline" @if($jadwal->status > 2 && !$jadwal->trashed()) disabled @endif>
    <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil008.svg-->
    <span class="svg-icon svg-icon-muted svg-icon-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM11.7 17.7L16.7 12.7C17.1 12.3 17.1 11.7 16.7 11.3C16.3 10.9 15.7 10.9 15.3 11.3L11 15.6L8.70001 13.3C8.30001 12.9 7.69999 12.9 7.29999 13.3C6.89999 13.7 6.89999 14.3 7.29999 14.7L10.3 17.7C10.5 17.9 10.8 18 11 18C11.2 18 11.5 17.9 11.7 17.7Z" fill="black"/>
            <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black"/>
    </svg></span>
    <!--end::Svg Icon-->
    Simpan Perubahan
</button>

@endif

</div>






<!-- Form Alasan -->

@if (session()->has('form_alasan'))

<div class="modal fade" tabindex="-1" id="kt_modal_1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ALASAN</h5>

   
            </div>

            <div class="modal-body">
                <p>Silahkan diisi alasan kenapa realisasi mundur (wajib)</p>
                <div class="form-floating my-4">
                    <textarea class="form-control @error('alasan') is-invalid @enderror" placeholder="Tulis Alasan disini...." id="form_alasan" style="height: 150px" name="alasan"></textarea>
                    <label for="form_alasan">Alasan</label>
                    @error('alasan')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror  
                </div>
            </div>

            <div class="modal-footer">
                
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>

            </div>

        </div>
    </div>
</div>

@endif


</form>

<table class="table gs-5 my-9">

    <tr class="table-primary">
        <td class="fw-bold fs-1">Pemakaian Sparepart</td>
    
        <td class="text-end">
            @if($jadwal->status < 3 && !$jadwal->trashed() && (Gate::allows('superuser') || Gate::denies('admin'))) 
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="white">
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="white"/>
                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="white"/>
                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="white"/>
                </svg>
            </button>
            @endif
    
        </td>
    </tr>
    
    <tr>
        <td colspan="2">
    
            @if($jadwal->sparepart->isNotEmpty())
            <table class="table align-middle fs-5 table-row-dashed table-row-gray-400 gs-7 g-3">
                
                <tr class="fw-bolder text-gray-800">
                    <td>Item Number</td>
                    <td>Nama Sparepart</td>
                    <td>Harga</td>
                    <td>Jumlah</td>
                    <td>Satuan</td>
                    <td>Aksi</td>
                </tr>
                
            @foreach ($jadwal->sparepart as $s)
                <tr>
                    <td>{{ $s->id }}</td>
                    <td>{{ $s->nama_sparepart }}</td>
                    <td>{{ $s->harga }}</td>
                    <td>{{ $s->pivot->jumlah }}</td>
                    <td>{{ $s->satuan }}</td>
                    <td>
                        @if($jadwal->status < 3) 
                        <form action="/sparepart/jadwal/delete" method="post" onSubmit="return hapusSetup(this);" style ="display:inline-block;">
                        @method('delete')
                        @csrf
                        <input type="hidden" name="jadwal_id" value="{{ $jadwal->id }}">
                        <input type="hidden" name="sparepart_id" value="{{ $s->id }}">
                        <button class="btn btn-sm py-1 btn-danger text-nowrap" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path fill="white" d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                <path fill="white" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                            </svg>
                        </button>
                    </form>
                    @endif
                </td>
                </tr>
                
               
                @endforeach
                
    
                
            </table>
            @else
                <b>Tidak ada pemakaian sparepart</b>
            @endif
            
            
        </td>
    </tr>
    
    
    </table>


@endsection



@section('customJs')
<script src="/assets/plugins/custom/tinymce/tinymce.bundle.js"></script>

    <script>

var options = {
    selector: "#kt_docs_tinymce_basic",
    forced_root_block: false,
    newline_behavior: 'block',
    toolbar: false,
    menubar: false,
};



tinymce.init(options);

$('.input-group.date').datepicker({
    format: "dd-mm-yyyy",
    todayBtn: "linked",
    language: "id",
    autoclose: true,
    todayHighlight: true,
    orientation: "bottom left"
});


@if (session()->has('form_alasan'))

$(document).ready(function(){

    $('#kt_modal_1').modal('show');

});


@endif

@error('sparepart')
Swal.fire({
		title: 'Sparepart sudah pernah ditambahkan, tidak perlu ditambahkan lagi!',
		confirmButtonText: 'OK',
		confirmButtonColor : '#F14182',
		icon: 'error',
	});
@enderror
    </script>
@endsection