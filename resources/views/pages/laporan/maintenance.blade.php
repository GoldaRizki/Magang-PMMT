<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        @page{
            margin-left: 2.5cm; 
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            }
        .tabel1{
            width: 60%;
            margin: 30px auto;
        }
        .tabel2{
            width: 100%;
            margin: 30px auto;
        }.detailPekerjaan{
            width: 100%;
            margin-bottom: 20px;
            border: 1px solid black;
            border-radius: 3px;
            min-height: 150px;
            font-size: 11pt;
            padding: 6px;
            box-sizing: border-box;
        }.table2 {
          border-collapse: collapse;
          width: 100%;
          margin: 10px auto;
        }
    </style>

</head>
<body>
    
<table class="tabel1">
<tr>
    <td>apa</td><td>apa</td><td>apa</td><td>apa</td>
</tr>
<tr>
    <td>apa</td><td>apa</td><td>apa</td><td>apa</td>
</tr>
<tr>
    <td>apa</td><td>apa</td><td>apa</td><td>apa</td>
</tr>
<tr>
    <td>apa</td><td>apa</td><td>apa</td><td>apa</td>
</tr>
</table>

<h3 style="margin-bottom: 2px;">Detail Pekerjaan : </h3>
<div class="detailPekerjaan">
<p>Bersihin karbu</p>
<p>Membersihkan evap</p>
<p>Ganti Motor</p>

</div>


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


</body>
</html>