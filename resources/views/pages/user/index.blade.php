@extends('layouts.tabel')

@section('tableHead')
    <th>No</th>
    <th>Nama</th>
    <th>UserName</th>
    <th>Level/Role</th>
    <th>Terakhir Login</th>
    <th>Aksi</th>
@endsection

@section('data')
<script>
        //makan bang
    $('#tabelTemplate').DataTable({

    columnDefs: [
    {
    class:'all',
    target: 1
    },
    {
    responsivePriority:11005,
    class:'min-tablet-l',
    target:[-1,-2]
    }
    ],
    pageLength: 25,
    responsive: true,
    processing: true,
    dom:'<"top"lf>rtip<"bottom"><"clear">',
    serverSide: true,
    ajax: "/user/all",
    columns: [
    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
    {data: 'nama', name: 'nama'},
    {data: 'username', name: 'username'},
    {data: 'level', name: 'level'},
    {data: 'last_login', name: 'last_login'},
    {data: 'aksi', name: 'aksi', orderable: false, searchable: false},

    //{data: 'kategori', name: 'kategori', orderable: false, searchable: false},

    ]

});


</script>
@endsection