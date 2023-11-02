<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>


    <style>
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
        
        td, th {
          border: 1px solid #444444;
          text-align: left;
          padding: 5px;
        }
        
       /* tr:nth-child(even) {
          background-color: #dddddd;
        }*/
        </style>

</head>
<body>

<table class="table1">
    <tr>
        <td>Nama Mesin</td>
        <td>{{ $mesin->nama_mesin }}</td>
    </tr>
    <tr>
        <td>Tipe</td>
        <td>{{ $mesin->spesifikasi }}</td>
    </tr>
    <tr>
        <td>Bulan</td>
        <td>Juli-Agustus</td>
    </tr>
    <tr>
        <td>Tahun</td>
        <td>2023</td>
    </tr>

</table>


<table class="table2">
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
    <td colspan="4">
        HASIL PEMERIKSAAN
    </td>
</tr>

<tr>
    <td> 
        25-6-2023
    </td>
    <td> 
        25-6-2023
    </td>
    <td> 
        25-6-2023
    </td>
    <td> 
        25-6-2023
    </td>
</tr>


<tr>
    <td>1</td><td>Tegangan</td><td>380 5%</td><td>381</td><td>383</td><td>384</td><td>392</td>
</tr>
<tr>
    <td>1</td><td>Tegangan</td><td>380 5%</td><td>381</td><td>383</td><td>384</td><td>392</td>
</tr>
<tr>
    <td>1</td><td>Tegangan</td><td>380 5%</td><td>381</td><td>383</td><td>384</td><td>392</td>
</tr>
<tr>
    <td>1</td><td>Tegangan</td><td>380 5%</td><td>381</td><td>383</td><td>384</td><td>392</td>
</tr>

</table>


</body>
</html>