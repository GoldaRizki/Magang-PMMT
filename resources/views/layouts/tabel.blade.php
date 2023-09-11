@extends('layouts.header')

@section('customCss')
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>

    <style>
    .tombolAksi{
    min-width: 180px;
    }
    </style>

@endsection

@section('konten')
    
<div class="container my-3">

    <form action="/test" method="get">
        @csrf
    <input type="hidden" name="test" id="test">
    <input type="submit" value="jajal wae">
    </form>
        
    <table id="tabelTemplate" class="table table-row-bordered table-row-gray-400 gy-3 gs-7 gx-1">
        <thead>
                <tr class="fw-bolder fs-6 text-gray-800">
                    @yield('tableHead')
                </tr>
        </thead>
        <tbody>
            @yield('tableBody')
        </tbody>
    </table>

</div>

@endsection


@section('customJs')
<script>
    
    //makan bang
mboh = $('#tabelTemplate').DataTable({
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

responsive: true

});


//var data = mboh.rows().data();
//console.log(JSON.stringify(data.toArray()));

$(document).ready(function(){

  function getData(mboh){
    document.getElementById('test').value = mboh;
}
        getData(JSON.stringify(mboh.rows().data().toArray()));
    

});



</script>
@endsection