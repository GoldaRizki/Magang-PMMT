@extends('layouts.header')

@section('customCss')
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>

    <style>
    .tombolAksi{
    min-width: 180px;
    }
    .dataTables_filter input[type="search"]{
      background-color: white;
    }

    .dataTables_filter input[type="search"]:focus{
      background-color: #e0e0e0;
    }

    .dataTables_wrapper .dataTables_length select{
      background-color: white !important;
    }

    </style>



@endsection

@section('konten')
    
<div class="container my-3">

        
    <table id="tabelTemplate" class="table table-row-bordered table-row-gray-400 gy-3 gs-7 gx-1">
        <thead>
                <tr class="fw-bolder fs-6 text-gray-800">
                    <th>Id</th>
                    <th>Mesin</th>
                    <th>Ruang</th>
                    <th>Kategori</th>
                </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

</div>

@endsection



@section('customJs')
<script>
			//makan bang
    $('#tabelTemplate').DataTable({
      /*
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
*/
responsive: true,
processing: true,
dom:'<"top"lf>rtip<"bottom"><"clear">',
serverSide: true,
ajax: "/mesin",
columns: [
{data: 'id', name: 'id'},
{data: 'nama_mesin', name: 'nama_mesin'},
{data: 'ruang.nama_ruang', name: 'ruang.nama_ruang'},
{data: 'kategori.nama_kategori', name: 'kategori.nama_kategori'}
//{data: 'kategori', name: 'kategori', orderable: false, searchable: false},
        ]

    });
  

</script>
@endsection