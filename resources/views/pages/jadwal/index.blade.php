@extends('layouts.header')

@section('customCss')
<link href="/assets/js-year-calendar/dist/js-year-calendar.min.css" rel="stylesheet" type="text/css" />


@endsection

@section('konten')
<!--Start Modal-->


<div id='tampil_jadwal' class="modal fade" tabindex="-1">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Maintenance</h4>

               <!--begin::Close-->
               <div class="btn btn-icon btn-sm btn-active-light-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
                <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen034.svg-->
                <span class="svg-icon svg-icon-muted svg-icon-2hx">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"/>
                            <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black"/>
                            <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black"/>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
          </div>

          <div class="modal-body">


            <h4 id="tanggal_jadwal" class="mb-5 pb-2"></h4>

            <table id="tabel_jadwal_maintenance" class="table fs-4 table-row-dashed table-row-gray-300 gy-2">

            </table>

          </div>


          
          <div class="modal-footer">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
          </div>
      </div>
  </div>
</div>

<!--End Modal-->
 
 
  <div id="calendar"></div>
@endsection

@section('customJs')
<script src="\assets\js-year-calendar\dist\js-year-calendar.min.js"></script>
<script src="\assets\js-year-calendar\locales\js-year-calendar.id.js"></script>

    <script>

        const currentYear = {{ now()->year }};
        //const currentYear = new Date().getFullYear();

// Initialize calendar
new Calendar('#calendar', {
  language: 'id',
  dataSource: [

    @foreach($maintenance as $m)
        @foreach($m->jadwal as $j)
             {
              @php
               $tanggal_rencana = Illuminate\Support\Carbon::parse($j->tanggal_rencana);
              @endphp
              startDate: new Date({{ $tanggal_rencana->year }}, {{ ($tanggal_rencana->month) - 1 }}, {{ $tanggal_rencana->day }}), 
              endDate: new Date({{ $tanggal_rencana->year }}, {{ ($tanggal_rencana->month) - 1 }}, {{ $tanggal_rencana->day }}),
              nama: '{{ $m->nama_maintenance }}',
              color: '{{ $m->warna }}',
              id: {{ $j->id }},
            }, 
        @endforeach
    @endforeach

  ],
  enableRangeSelection: false
})

// Register events
document.querySelector('#calendar').addEventListener('clickDay', function(e) {
  

  var bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ];

  $('#tampil_jadwal').modal('show');

  
  //appendLog("Click on day: " + e.date.toLocaleDateString() + " (" + e.events.length + " events)")
  var a = e.events;
  var tanggal = e.date.getDate()+' '+bulan[e.date.getMonth()]+' '+e.date.getFullYear();
  var maintenance = '';

  a.forEach(element => {

    maintenance += '<tr><td><a style="color:'+ element.color +';" href="/jadwal/detail/'+ element.id +'">'+ element.nama +'</a><td></tr>';
  });

  document.getElementById('tabel_jadwal_maintenance').innerHTML = maintenance;
  document.getElementById('tanggal_jadwal').innerHTML = tanggal;

})


    </script>
@endsection
