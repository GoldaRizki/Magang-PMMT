@extends('layouts.tabel')


@section('tableHead')
    
                    <th>No</th>
                    <th>Mesin</th>
                    <th>PIC</th>
                    <th>No. Asset</th>
                    <th>Ruang</th>
                    <th>Kategori</th>
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
ajax: "/mesin",
columns: [
{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
{data: 'nama_mesin', name: 'nama_mesin'},
{data: 'user', name: 'user.nama'},
{data: 'no_asset', name: 'no_asset'},
{data: 'ruang', name: 'ruang.nama_ruang'},
{data: 'kategori', name: 'kategori.nama_kategori'},
{data: 'aksi', name: 'aksi', orderable: false, searchable: false},

//{data: 'kategori', name: 'kategori', orderable: false, searchable: false},

        ]

    });
  

</script>
@endsection