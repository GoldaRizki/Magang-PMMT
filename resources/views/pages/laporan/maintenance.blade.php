<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        @page{
            margin-left: 2.5cm; 
        }
        html{
            font-family: Arial, Helvetica, sans-serif;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
            font-size: 8pt;
            }
        .tabel1{
            width: 100%;
            margin: 30px auto;
            padding: 2px;
        }
       .detailPekerjaan{
            width: 100%;
            margin-bottom: 20px;
            border: 1px solid black;
            border-radius: 3px;
            min-height: 150px;
            font-size: 11pt;
            padding: 6px;
            box-sizing: border-box;
            font-size: 8pt;
        }.table2 {
          border-collapse: collapse;
          width: 100%;
          margin: 5px auto;
        }.detailPekerjaan p{
            margin-top: 5px; 
            margin-bottom: 5px;
            font-size: 8pt;
        }.alasan{
            width: 100%;
            margin-bottom: 20px;
            border: 1px solid black;
            border-radius: 3px;
            min-height: 50px;
            font-size: 11pt;
            padding: 6px;
            box-sizing: border-box;
            font-size: 9pt;
        }.judul{
            text-align: center;
            margin: 2px auto;
        }
    </style>

</head>
<body>
    
    <h4 class="judul">LAPORAN PENYELESAIAN PEKERJAAN</h4>
    <h6 class="judul">UNIT UTILITY - PT. PHAPROS, TBK</h6>
<table class="tabel1">

@php
    setlocale(LC_ALL, 'IND');

@endphp
<tr>
    <td>Tanggal Realisasi</td><td>@if($jadwal->tanggal_realisasi){{ Illuminate\Support\Carbon::parse($jadwal->tanggal_realisasi)->formatLocalized('%d %B %Y') }} @else - @endif </td><td>Internal Servis</td><td>{{ $jadwal->maintenance->periode }} {{ $jadwal->maintenance->satuan_periode }}</td>
</tr>
<tr>
    <td>Nama Mesin</td><td>{{ $jadwal->maintenance->mesin->nama_mesin }}</td><td>Jenis Pekerjaan</td><td>{{ $jadwal->maintenance->nama_maintenance }}</td>
</tr>
<tr>
    <td>Type Mesin</td><td>{{ $jadwal->maintenance->mesin->tipe_mesin }}</td><td>Lama Pekerjaan</td><td>{{ $jadwal->lama_pekerjaan }}</td>
</tr>
<tr>
    <td>Nomor Seri Mesin</td><td>{{ $jadwal->maintenance->mesin->nomor_seri }}</td><td>Lokasi</td><td>{{ $jadwal->maintenance->mesin->ruang->nama_ruang }}</td>
</tr>
<tr>
    <td>Kode Mesin</td><td>{{ $jadwal->maintenance->mesin->kode_mesin }}</td><td>Status</td>
    <td>
        @switch($jadwal->status)
            @case(1)
                Belum Dikerjakan
                @break
        
            @case(2)
                Menunggu verifikasi Spv.
                @break

            @case(3)
                Menunggu verifikasi Manager
                @break
            
            @case(4)
                Close
                @break
            
            @default
                Rencana sudah dihapus

        @endswitch
    </td>
</tr>
<tr>
    <td>Personel</td><td>{{ $jadwal->personel }}</td><td>PIC</td><td>{{ $jadwal->maintenance->mesin->user->nama }}</td>
</tr>
</table>

<h5 style="margin-bottom: 2px;">Detail Pekerjaan : </h5>
<div class="detailPekerjaan">
{!! $jadwal->keterangan !!}
</div>

@if($jadwal->alasan)
    <h5 style="margin-bottom: 2px;">Alasan Terlambat : </h5>
    <div class="alasan">
    {{ $jadwal->alasan }}
    </div>
@endif
@php
    $sparepart = $jadwal->sparepart;
@endphp


<h5 style="margin-bottom: 0px;">Penggunaan Sparepart : </h5>
<table class="table2">

    <tr>
        <th>Sparepart</th><th>Jumlah</th>
    </tr>
    


        @foreach ($sparepart as $s)

            <tr>
                <td>{{ $s->nama_sparepart }}</td><td>{{ $s->pivot->jumlah }}</td>
            </tr>
        @endforeach
     
            @if($sparepart->isEmpty())
                <tr>
                    <td style="padding: 10px; text-align: center;" colspan="2">Tidak Ada Penggunaan Spareparts</td>
                </tr>
            @endif
</table>


</body>
</html>