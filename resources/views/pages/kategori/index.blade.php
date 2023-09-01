@extends('layouts.simpleTable')

    <!-- iki Thead -->
@section('tableHead')

        <th>Id</th>
        <th>Kategori</th>

@endsection

     
@section('tableBody')

        @foreach ($kategori as $k)
        <tr>
            <td>{{ $k->id }}</td>
            <td><a class="text-dark" href="/kategori/detail/{{ $k->id }}">{{ $k->nama_kategori }}</a></td>
        </tr>
        @endforeach
    
@endsection


