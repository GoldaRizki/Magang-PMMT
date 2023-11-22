<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .tabel-tampil-jadwal{
            width: 100%;
            font-size: 6pt;
            border-collapse: collapse;
            padding: 1px;
            margin-top:5px;

        }
        table, th, tr, td{
            border: 1px solid black;
            text-align: center;
            min-width: 10px;
        }.judul{
            margin-top:3px;
            margin-bottom: 3px; 
            text-align: center;
        }

    </style>

</head>

<body>

    @php
        $tgl_awal = $awal->copy();
        $tgl_akhir = $akhir->copy();
        $tahun_ini = now(7)->year;
        $hitung_bulan = 1;
        setlocale(LC_ALL, 'IND');
    @endphp
        
        
    <h3 class="judul">RENCANA DAN REALISASI PREVENTIVE MAINTENANCE MESIN UTILITY</h3>
    <h5 class="judul">Tahun {{ $tahun_ini }}</h5>
    <h6 style="font-size: 7pt;" class="judul">(diunduh tanggal {{ now(7)->formatLocalized('%d %B %Y') }})</h6>
    <table class="tabel-tampil-jadwal">
        <thead>
            <tr>
                <th rowspan="2">Mesin</th>

                <th rowspan="2">Maintenance</th>

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
                          
            @foreach ($mesin as $mes)
            @if($mes->maintenance->isNotEmpty())
           
                @foreach($mes->maintenance as $maintenance)
                @if(!$loop->first)
                    <tr>
                @else
                <tr>
                        <td rowspan="{{ $mes->maintenance->count() }}">{{ $mes->nama_mesin }}<br>({{ $mes->tipe_mesin }})</td> 
                @endif


                    <td>{{ $maintenance->nama_maintenance }}</td>

                    @php
                    $tgl_awal = $awal->copy();
                    $tgl_akhir = $akhir->copy();

                    @endphp
                    
                    @while($tgl_akhir->year == $tahun_ini)

                        @php
                        $tanggal = '';
                        $warna = false;
                            foreach ($maintenance->jadwal as $jadwal) {
                                if(Illuminate\Support\Carbon::parse($jadwal->tanggal_rencana)->greaterThanOrEqualTo($tgl_awal) && Illuminate\Support\Carbon::parse($jadwal->tanggal_rencana)->lessThanOrEqualTo($tgl_akhir)){
                                    $warna = true;
                                }
            

                                if(!is_null($jadwal->tanggal_realisasi) && Illuminate\Support\Carbon::parse($jadwal->tanggal_realisasi)->greaterThanOrEqualTo($tgl_awal) && Illuminate\Support\Carbon::parse($jadwal->tanggal_realisasi)->lessThanOrEqualTo($tgl_akhir)){
                                    $tanggal = Illuminate\Support\Carbon::parse($jadwal->tanggal_realisasi)->day;
                                }

                            }

                            if($warna){
                                echo '<td style="background-color:'. $maintenance->warna .'; color:azure; font-weight:bold;">';
                            }else{
                                echo '<td>';
                            }

                            echo $tanggal;

                            echo '</td>';

                        $tgl_awal = $tgl_akhir->copy();
                        $tgl_akhir->addWeek();
                        @endphp

                    @endwhile

                @if(!$loop->first)
                    </tr>
                @endif
                @endforeach
            </tr>
            @endif
            @endforeach



        </tbody>
</table>



    
</body>
</html>