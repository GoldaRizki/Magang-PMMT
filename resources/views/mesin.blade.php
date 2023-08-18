@extends('layouts.tabel')

@section('tableTemplate')
    <thead>
    <tr>
        <th>Id</th>
        <th>Mesin</th>
        <th>Kategori</th>
       
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($mesin as $m)
        <tr>
            <td>{{ $m->id }}</td>
            <td>{{ $m->nama_mesin }}</td>
            <td>{{ $m->kategori->nama_kategori }}</td>
           
            <td><input type="button" class="btn btn-primary btn-sm py-0 small" value="Jajal tok"></td>
         </tr>
        @endforeach
    
    </tbody>
@endsection