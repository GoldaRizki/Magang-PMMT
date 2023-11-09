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
      


<div class="container-fluid px-1">



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
                                <td>
                                   
                                    {{ $tglSelesai->day }}
                                    @php
                                    $jd = $maintenanceVal->filter(function($item) use ($tglAkhir){
                                        /*
                                        if(Illuminate\Support\Carbon::parse($item->tanggal_rencana)->diffInDays('19-10-2023') == 0){
                                            dd('mboh');
                                        }
                                        */

                                        echo Illuminate\Support\Carbon::parse($item->tanggal_rencana)->diffInDays($tglAkhir->format('d-m-Y'));
                                        return (Illuminate\Support\Carbon::parse($item->tanggal_rencana)->diffInDays($tglAkhir->format('Y-m-d')) == 0);

                                    });                                        
                                    $tglSelesai->subDay();
                                    @endphp

                                   @if($jd->isNotEmpty())
                                    kosong
                                   @else
                                   <p>awpkawpkwa</p>
                                   @endif
                                </td>

                            @endwhile             
                    </tr>
                @endforeach

            @endforeach



    

        </tbody>
</table>



</div>
</div>

</div>
</div>

@endsection