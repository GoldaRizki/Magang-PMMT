@extends('layouts.tray_layout')




@section('content_left')

<table class="table table-row-dashed table-row-gray-400 gs-1">
    <tr>
        <td><b>Nama Mesin</b></td>
        <td>{{ $mesin['nama_mesin'] }}</td>
    </tr>
    <tr>
        <td><b>Nomor Asset</b></td>
        <td>{{ $mesin['no_asset'] }}</td>
    </tr>
    <tr>
        <td><b>Ruang</b></td>
        <td>{{ $mesin['ruang']['nama_ruang'] }}</td>
    </tr>
    <tr>
        <td><b>Kategori</b></td>
        <td>{{ $mesin['kategori']['nama_kategori'] }}</td>
    </tr>
</table>

 

    <a href="/mesin" class="btn btn-dark container-fluid mt-12">
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

@canany(['supervisor','admin'])
<h1 class="text-center my-3">Pilih Template</h1>

<form action="/maintenance/form/pilih/kirim/" method="post">
    @csrf
    <select name="id" class="form-select mx-5" aria-label="Pilih">
        
        <option value="{{ $mesin['kategori_id'] }}">{{ $mesin['kategori']['nama_kategori'] }}</option>
        
        @foreach ($kategori as $k)
        
        <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
        
        @endforeach
        
    </select>

    <div class="row m-5 text-center">
        <div class="col-6"></div>
        <div class="col-6"><button class="btn btn-primary btn-lg" type="submit">Pilih</button></div>
      </div>
   
    
</form>
@else
<h3>Mesin ini tidak punya jadwal maintenance</h3>
<p>Silahkan hubungi PIC dari mesin ini atau admin untuk dibuatkan jadwal</p>
@endcanany
    
    
@endsection