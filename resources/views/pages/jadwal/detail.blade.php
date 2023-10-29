@extends('layouts.tray_layout')


@section('customCss')
    
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
    <tr>
      <td colspan="2">
        <b>Spesifikasi</b><br>
        {{ $mesin->kategori->nama_kategori }}
      </td>
    </tr>
  </table>


  @if($jadwal->status == 2)
  <div class="p-5 bg-success text-white h2 fw-bolder text-center rounded">
    Sudah Dikonfirmasi
  </div>
  @elseif($jadwal->trashed())
  <div class="p-5 bg-warning h2 fw-bolder text-center rounded">
    Jadwal Sudah dihapus
  </div>
  @endif

@endsection


@section('content_right')


<form action=" @if(session()->has('form_alasan')) /jadwal/update_alasan/ @else /jadwal/update/ @endif" method="POST">
    @csrf
    @method('PUT')
    <div class="input-group my-4">
        <h1>{{ $maintenance->nama_maintenance }}</h1>
    </div>
    <div class="input-group my-4">
        
        <input type="hidden" name="id" value="{{ old('id', $jadwal->id)}}">

    <span class="form-label float-start">Tanggal Rencana</span>
    <div class="input-group date">
        <input type="text" class="form-control @error('tanggal_rencana')is-invalid @enderror" id="form_tanggal_rencana" value="{{ old('tanggal_rencana', Illuminate\Support\Carbon::parse($jadwal->tanggal_rencana)->format('d-m-Y'))  }}" name="tanggal_rencana" readonly>
        
        <button class="btn btn-secondary" type="button">
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
        <input type="text" class="form-control @error('tanggal_realisasi') is-invalid @enderror" id="form_tanggal_realisasi" @if($jadwal->tanggal_realisasi == NULL) value="{{ old('tanggal_realisasi') }}" @else value="{{ old('tanggal_realisasi', Illuminate\Support\Carbon::parse($jadwal->tanggal_realisasi)->format('d-m-Y')) }}" @endif name="tanggal_realisasi" readonly>
        <button class="btn btn-secondary" type="button">
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

@if($jadwal->alasan)
<div class="form-floating my-4">
    <textarea class="form-control @error('alasan') is-invalid @enderror" placeholder="Tulis Keterangan disini...." id="form_alasan_2" style="height: 150px" name="alasan">{{ old('alasan', $jadwal->alasan) }}</textarea>
    <label for="form_alasan_2">Alasan Terlambat</label>
</div>
@endif

<div class="form-floating my-4">
    <textarea class="form-control @error('keterangan') is-invalid @enderror" placeholder="Tulis Keterangan disini...." id="form_keterangan" style="height: 150px" name="keterangan">{{ old('keterangan', $jadwal->keterangan) }}</textarea>
    <label for="form_keterangan">Keterangan</label>
</div>

<div class="form-check my-4">
    <input class="form-check-input" type="checkbox" value="divalidasi" name="validasi" id="flexCheckDefault">
    <label class="form-check-label h3" for="flexCheckDefault">
      Konfirmasi
    </label>
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
                <input type="text" class="form-control" @if(old('isi_form')) value="{{ old('isi_form')[$i->id] }}" @else value="{{ $i->nilai }}" @endif name="isi_form[{{ $i->id }}]" required>
            </td>
        </tr>
        @endforeach


    </table>
    
</div>


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


@if(!$jadwal->trashed())

<button type="submit" class="btn btn-lg btn-primary d-inline" @if($jadwal->status > 1) disabled @endif>
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
                
                <a href="/jadwal/{{ $mesin->id }}">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                </a>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>

            </div>

        </div>
    </div>
</div>

@endif


</form>

@endsection



@section('customJs')
    <script>
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

    </script>
@endsection