@extends('layouts.tabel')

@section('tableHead')
    <th>Item Number</th>
    <th>Sparepart</th>
    <th>Harga</th>
    <th>Jumlah</th>
    <th>Satuan</th>
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
},
{
  targets: 2,
  className: 'dt-right'  
},
{
  targets: 3,
  className: 'dt-right'
}

],
pageLength: 25,
responsive: true,
processing: true,
dom:'<"top"lf>rtip<"bottom"><"clear">',
serverSide: true,
ajax: "/sparepart",
columns: [
{data: 'id', name: 'id'},
{data: 'nama_sparepart', name: 'nama_sparepart'},
{data: 'harga', name: 'harga', render: $.fn.dataTable.render.number( '.', '.', 0, 'Rp. ' )},
{data: 'jumlah', name: 'jumlah'},
{data: 'satuan', name: 'satuan'},
{data: 'aksi', name: 'aksi', orderable: false, searchable: false},
//{data: 'kategori', name: 'kategori', orderable: false, searchable: false},
        ]

    });
  

</script>
@endsection