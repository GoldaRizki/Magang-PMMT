<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>  


    <style>
        @page { margin-left: 2.5cm}

        .table1 {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 60%;
          margin: 10px auto;
        }

        .table2 {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
          margin: 10px auto;
        }
        .table2 td, .table2 th{
            text-align: center;
        }
        
        td, th {
          border: 1px solid #444444;
          padding: 2px;
          font-size: 7pt
        }
        
       /* tr:nth-child(even) {
          background-color: #dddddd;
        }*/
        .catatan{
            width:80%;
            margin-top: 20px;

        }
        </style>

</head>
<body>
<div>
<h2 style="text-align: center; margin: 20px auto;">Data Hasil Inspeksi / Pemeriksaan Mesin</h2>
</div>
<table class="table1">
    <tr>
        <td>Nama Mesin</td>
        <td>{{ $mesin->nama_mesin }}</td>
    </tr>
    <tr>
        <td>Tipe</td>
        <td>{{ $mesin->tipe_mesin }}</td>
    </tr>
    <tr>
        <td>Tanggal</td>
        <td>{{ $tgl_awal->format('d-m-Y') }} s/d {{ $tgl_akhir->format('d-m-Y') }}</td>
    </tr>
  

</table>


@php
    $jadwal = $maintenance->jadwal->sortBy('tanggal_realisasi');
    //ddd($jadwal);
@endphp

@if($jadwal->isNotEmpty())
    

<table class="table2" style="text-align: justify;">
<tr>
    <td rowspan="2">
        No
    </td>
    <td rowspan="2">
        JENIS PEMERIKSAAN
    </td>
    <td rowspan="2">
        SYARAT
    </td>
    <td colspan="{{ $jadwal->count() }}">
        HASIL PEMERIKSAAN
    </td>
</tr>


<tr>
   @foreach ($jadwal as $j)
       <td>{{ Illuminate\Support\Carbon::parse($j->tanggal_realisasi)->format('d/m/Y') }}</td>
   @endforeach
</tr>


@foreach ($maintenance->form as $f)
    <tr>
        <td>{{ $loop->iteration }}</td><td style="text-align: left;">{{ $f->nama_form }}</td><td>{{ $f->syarat }}</td>


            @foreach ($jadwal as $j)
                <td>{{ $j->isi_form->firstWhere('form_id', $f->id)->nilai }}</td>
            @endforeach

    </tr>
@endforeach

</table>

@php
    
    $cek = true;

@endphp

<h4 style="margin-bottom: 1px;">Pemakaian Sparepart: </h4>
<table class="table2">

    <tr>
        <th>Sparepart</th><th>Jumlah</th><th>Tanggal Pemakaian</th>
    </tr>
    

    @foreach ($jadwal as $j)

        @foreach ($j->sparepart as $sparepart)
        @php
            if($sparepart){
                $cek = false;
            }
        @endphp
            <tr>
                <td>{{ $sparepart->nama_sparepart }}</td><td>{{ $sparepart->pivot->jumlah }}</td><td>{{ Illuminate\Support\Carbon::parse($j->tanggal_realisasi)->format('d/m/Y') }}</td>
            </tr>
        @endforeach
     
    @endforeach
            @if($cek)
                <tr>
                    <td style="padding: 10px; text-align: center;" colspan="3">Tidak Ada Penggunaan Spareparts</td>
                </tr>
            @endif
</table>


@else
    <h1 style="margin: 30px auto; text-align: center;">Tidak ada Realisasi Pada Tanggal </h1>
@endif

</body>
</html>