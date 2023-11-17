<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .tabel-tampil-jadwal{
            width: 100%;
            font-size: 4pt;
            border-collapse: collapse;
            padding: 1px;
        }
        table, tr, td{
            border: 1px solid black;
            text-align: center;
        }
    </style>

</head>

<body>

    @php
        $tgl_awal = $awal->copy();
        $tgl_akhir = $akhir->copy();
        $tahun_ini = now(7)->year;
        $loop = 1;
        $hitung_bulan = 1;
        setlocale(LC_ALL, 'IND');
    @endphp
        
        
    
    <table class="tabel-tampil-jadwal">
        <thead>
            <tr>
                <th rowspan="2">Barang</th>

                @while($tgl_awal->year == $tahun_ini)
                

                @php
                                       
                    if($tgl_awal->copy()->addWeek()->month == $tgl_awal->month){
                        $hitung_bulan++;
                    }else{
                     
                        echo '<td colspan="'. $hitung_bulan .'">'. Illuminate\Support\Carbon::parse($tgl_awal)->formatLocalized('%B') .'</td>';
                        $hitung_bulan = 1;
                    }
                    $tgl_awal->addWeek();


                    
                @endphp
            @endwhile

            </tr>
            @php
            $tgl_awal = $awal->copy();
            $tgl_akhir = $akhir->copy();
            $loop = 1;
            @endphp
            <tr>

                @while($tgl_akhir->year == $tahun_ini)
                
                    <td>
                        {{ $loop }}
                    </td>
                    
                    @php
                    
                    $tgl_awal = $tgl_akhir->copy();
                    $tgl_akhir->addWeek();
                    
                    if($loop < 4){
                        $loop++;
                    }else{
                        $loop = 1;
                    }
                    @endphp
                @endwhile
            </tr>
                          
 

        </tbody>
</table>



    
</body>
</html>