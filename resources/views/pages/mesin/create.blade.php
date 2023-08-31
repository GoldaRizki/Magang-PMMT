@extends('layouts/header')


@section('konten')

<div class="container-lg mt-5">

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Pesan Error disini
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

    <form action="/mesin/create" method="POST">

        @csrf
        <div class="mb-3">
            <label for="mesin" class="form-label">Nama Mesin</label>
            <input type="text" class="form-control" id="mesin" placeholder="Nama Mesin" name="nama_mesin">
        </div>
        

        <div class="input-group mb-3">
            <button class="btn btn-primary btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">KATEGORI</button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">+ Tambah Kategori</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" onclick="setKategori(1,'HVAC')">HVAC</a></li>
              <li><a class="dropdown-item" onclick="setKategori(2,'AHU')">AHU</a></li>
              <li><a class="dropdown-item" onclick="setKategori(3,'Genset')">Genset</a></li>
             
            </ul>
            <input type="text" class="form-control" aria-label="Kategori" id="form_kategori" readonly disabled>
        </div>

        <input type="hidden" id="kategori" name="kategori_id">

        <div class="input-group mb-3">
            <button class="btn btn-primary btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">RUANG</button>
            <ul class="dropdown-menu"> 
              <li><a class="dropdown-item" href="#">+ Tambah Ruang</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" onclick="setRuang(1,'Produksi')">Produksi</a></li>
              <li><a class="dropdown-item" onclick="setRuang(2,'Administrasi')">Administrasi</a></li>
              <li><a class="dropdown-item" onclick="setRuang(3,'Kamar Mandi')">Kamar Mandi</a></li>
             
            </ul>
            <input type="text" class="form-control" aria-label="Ruang" id="form_ruang" readonly disabled>
        </div>
        
        <input type="hidden" id="ruang" name="ruang_id">
          
          
        <div class="mb-3">
            <label for="spesifikasi" class="form-label">Spesifikasi</label>
            <textarea class="form-control" id="spesifikasi" name="spesifikasi" rows="9"></textarea>
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