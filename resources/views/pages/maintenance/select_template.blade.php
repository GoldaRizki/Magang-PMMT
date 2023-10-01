@extends('layouts.tray_layout')




@section('content_left')
    <p>DIkei tombil balik</p>


@endsection


@section('content_right')
<h1 class="text-center my-3">Pilih Template</h1>

<form action="/maintenance/form/pilih/kirim/" method="post">
    @csrf
    <select name="id" class="form-select mx-5" aria-label="Pilih">
        
        <option value="{{ $mesin->kategori_id }}">{{ $mesin->kategori->nama_kategori }}</option>
        
        @foreach ($kategori as $k)
        
        <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
        
        @endforeach
        
    </select>

    <div class="row m-5 text-center">
        <div class="col-6"></div>
        <div class="col-6"><button class="btn btn-primary btn-lg" type="submit">Pilih</button></div>
      </div>
   
    
</form>
    
    
@endsection