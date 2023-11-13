@extends('layouts.header')

@section('customCss')
    <style>
        .tabel-tampil-jadwal td{
    position: relative;
    /*border: 1px #1a1a1a; */ 
    text-align: center;
    min-width: 40px;
}

.tabel-tampil-jadwal thead th, 
.tabel-tampil-jadwal thead td{
   /* border-collapse: collapse; */
   font-size: small;
   position: sticky;
   top: 0;
   background-color: white;
   z-index: 1;
}
.tabel-tampil-jadwal thead th:first-child,
.tabel-tampil-jadwal td:first-child{
    position: sticky;
    left: 0;
    color: #212529;
    z-index: 2;
    min-width: 300px;
    font-size: small;
    text-align: left;
    background-color: #009EF7;
}


.tabel-tampil-jadwal thead th:first-child{
    z-index: 4;
}
    </style>
@endsection

@section('konten')


<div class="card">
    <div class="card-body">
<form action="/approve" method="get">

    <div class="row g-4">
        <div class="col-md-4">
            <div class="form-floating">
                <div class="input-group date">
                    <input type="text" name="tanggal_awal" placeholder="masukkan tanggal awal..." class="form-control @error('tanggal_awal')is-invalid @enderror">
                    
                    <button class="btn btn-secondary" type="button">
                        <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil002.svg-->
                        <span class="svg-icon svg-icon-muted svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                <path opacity="0.3" d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z" fill="black"/>
                                <path d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z" fill="black"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                </div>
              </div>
            </div>

            <div class="col-md-1">
            <h1 class="text-center">s/d</h1>
            </div>

            <div class="col-md-4">
              <div class="form-floating">
             
                <div class="input-group date">
                    <input type="text" name="tanggal_akhir" placeholder="masukkan tanggal akhir..." class="form-control @error('tanggal_akhir')is-invalid @enderror">
                    
                    <button class="btn btn-secondary" type="button">
                        <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil002.svg-->
                        <span class="svg-icon svg-icon-muted svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                <path opacity="0.3" d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z" fill="black"/>
                                <path d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z" fill="black"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                </div>

            </div>

          </div>


          <div class="col-md-3">
            <button type="submit" class="btn btn-primary px-5 py-3">Filter</button>
        </div>
    </div>
</form>


@if($jadwal->isNotEmpty())
<div class="container-fluid px-1 py-4">

<div class="container text-center mt-7"><h1>Realisasi</h1></div>

    <div class="container-fluid my-3 table-responsive p-0" style="overflow-y: scroll; max-height:450px;">
        
        @php
            $start = $tglAwal->copy();
            $akhir = $tglAkhir->copy();
        
            $selisihHari = $tglAwal->diffInDays($tglAkhir, $tglAwal) + 1; 
        @endphp



    <table class="table table-rounded table-row-dashed table-row-gray-300 p-0 m-0 g-5 tabel-tampil-jadwal">
        <thead>
            <tr>
                <th class="text-center text-light fs-3 fw-bold">Mesin</th>

                    @while($akhir->greaterThanOrEqualTo($start))
                        <td>{{ $akhir->year }}<br>{{ $akhir->shortMonthName }}</td>

                        @php
                            $akhir->subDay();
                            @endphp
                    @endwhile         

            </tr>
            
        </thead>
        <tbody>


            @foreach ($jadwal as $mesinKey => $mesinVal)
                
            <tr>
                <td class="text-light fs-5 fw-bold">{{ $mesinKey }}</td> 
                <td colspan="{{ $selisihHari }}"></td>             
            </tr>

                @foreach ($mesinVal as $maintenanceKey => $maintenanceVal)
                    <tr>
                        <td class="text-light">&nbsp;&nbsp;-&nbsp;{{ $maintenanceKey }}</td>
                        
                        @php
                            $tglMulai = $tglAwal->copy();
                            $tglSelesai = $tglAkhir->copy();

                        @endphp
                            @while($tglSelesai->greaterThanOrEqualTo($tglMulai))
                                <td class="align-middle">
                                   
                                    @php
                                    $jd = $maintenanceVal->first(function($value, $key) use ($tglSelesai){
                                        /*
                                        if(Illuminate\Support\Carbon::parse($item->tanggal_realisasi)->diffInDays('19-10-2023') == 0){
                                            dd('mboh');
                                        }
                                        */

                                        //echo $value->tanggal_realisasi . "<br>";
                                        return (Illuminate\Support\Carbon::parse($value->tanggal_realisasi)->isSameDay($tglSelesai));

                                    });     

                                    if(is_null($jd)){
                                        echo $tglSelesai->day;
                                    }else{
                                        /*
                                        $jadwal = $jd->map(function($item, $key){
                                            return '['. $item->id .',\''. $item->maintenance->nama_maintenance .'\',\''. $item->maintenance->mesin->nama_mesin .'\']';
                                            });
                                        */
                                        echo '<button class="btn btn-sm btn-primary" onclick="modal_approve('. $jd->id . ',\''. $jd->maintenance->mesin->nama_mesin .'\',\''. $jd->maintenance->nama_maintenance .'\',\''. Illuminate\Support\Carbon::parse($jd->tanggal_rencana)->format('d-m-Y') .'\',\''. Illuminate\Support\Carbon::parse($jd->tanggal_realisasi)->format('d-m-Y') .'\',\''. ((!is_null($jd->keterangan)) ? $jd->keterangan : '-') .'\',\''. ((!is_null($jd->alasan)) ? $jd->alasan : '-') .'\')" data-bs-toggle="modal" data-bs-target="#modal_approve">' . $tglSelesai->day .'</button>';
                                    }
                                    
                                    $tglSelesai->subDay();
                                    @endphp
                                </td>

                            @endwhile             
                    </tr>
                @endforeach

            @endforeach



    

        </tbody>
</table>



</div>
</div>
@else

<div class="container text-center py-9"><h1>*Tidak Ada Realisasi*</h1></div>

@endif

</div>
</div>


<div class="modal fade" tabindex="-1" id="modal_approve">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Close Pekerjaan</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">

                <table class="table table-row-dashed table-row-gray-300 gy-5 gs-4">
                    <tr>
                        <th class="fw-bold">Jenis Maintenance</th>
                        <td id="approve_maintenance"></td>
                    </tr>
                    <tr>
                        <th class="fw-bold">Mesin</th>
                        <td id="approve_mesin"></td>
                    </tr>
                    <tr>
                        <th class="fw-bold">Tanggal Rencana</th>
                        <td id="approve_tanggal_rencana"></td>
                    </tr>
                    <tr>
                        <th class="fw-bold">Tanggal Realisasi</th>
                        <td id="approve_tanggal_realisasi"></td>
                    </tr>
                    <tr>
                        <th class="fw-bold">Keterangan</th>
                        <td id="approve_keterangan"></td>
                    </tr>
                    <tr>
                        <th class="fw-bold">Alasan Terlambat</th>
                        <td id="approve_alasan"></td>
                    </tr>
    
                </table>

            </div>

            <div class="modal-footer">
                <a class="btn btn-warning" id="link_detail" target="_blank">Lihat Detail</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <form action="/approve/jadwal" method="POST">
                    @csrf
                    <input type="hidden" name="jadwal_id" id='jadwal_id'>
                    <button type="submit" class="btn btn-primary">Approve Pekerjaan</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection

@section('customJs')
<script>

$('.input-group.date').datepicker({
    format: "dd-mm-yyyy",
    todayBtn: "linked",
    language: "id",
    autoclose: true,
    todayHighlight: true,
    orientation: "bottom left"
});



function modal_approve(jadwal_id, mesin, maintenance, tgl_rencana, tgl_realisasi, keterangan, alasan) {
        
        document.getElementById('approve_mesin').innerHTML = mesin;
        document.getElementById('approve_maintenance').innerHTML = maintenance;
        document.getElementById('approve_tanggal_rencana').innerHTML = tgl_rencana;
        document.getElementById('approve_tanggal_realisasi').innerHTML = tgl_realisasi;
        document.getElementById('approve_keterangan').innerHTML = keterangan;
        document.getElementById('approve_alasan').innerHTML = alasan;
        document.getElementById('jadwal_id').value = jadwal_id;
        document.getElementById('link_detail').href = '/jadwal/detail/'+jadwal_id;
    }


@if(session('approve'))
Swal.fire({
    title: 'Apakah anda mau mereset Jadwal?',
    icon: 'question',
    html:`
    <div class="row p-0 m-0">
            <form action="/approve/jadwal/tetap" class="col-6" method="POST">
                    @csrf
                    @method('put')
                    <input type="hidden" value="{{ session('approve') }}" name="jadwal_id">
                    <button type="submit" class="btn btn-sm btn-primary">Tidak</button>
    </form>
    <form action="/approve/jadwal/ubah" class="col-6" method="POST">
                    @csrf
                    @method('put')
                    <input type="hidden" value="{{ session('approve') }}" name="jadwal_id">
                    <button type="submit" class="btn btn-sm btn-danger">Reset Jadwal</button>
    </form>
    </div>
    `,
    showCancelButton: true,
    cancelButtonText: "Batal",
    showConfirmButton: false,
});
@endif


@if(session('approve_berhasil'))

Swal.fire({
    title: 'Berhasil diapprove!',
    icon: 'success',
    timer: 1000,
});

@endif

@error('reset_gagal')
Swal.fire({
    title: 'Reset Jadwal Gagal!',
    icon: 'error',
    text: '{{ $message }}',

});
@enderror

@error('salah_input')
Swal.fire({
    title: 'Inputan Tanggal Tidak Lengkap!!',
    icon: 'error',
    text: '{{ $message }}',

});
@enderror


@error('tanggal_lebih_besar')
Swal.fire({
    title: 'Input Tanggal Tidak Valid!!',
    icon: 'error',
    text: '{{ $message }}',

});
@enderror
</script>
@endsection