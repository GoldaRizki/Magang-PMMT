@extends('layouts.header')


@section('konten')
    
<div class="container">

<div class="row">
    <div class="col-md-4 mb-2 p-2">
        <div class="col-auto text-center">
            <button type="submit" class="btn btn-primary mb-3">
                <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen035.svg-->
                <span class="svg-icon svg-icon-muted svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"/>
                        <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black"/>
                        <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black"/>
                    </svg>
                </span>
        <!--end::Svg Icon-->
                Tambahkan
            </button>
          </div>
    </div>

    <div class="col-md-8">

        <table class="table gs-7 align-middle">


         
            @foreach ($setup as $s)
                
            <tr class="table-primary">
                <td class="fw-bold fs-2">{{ $s->nama_maintenance }}</td>
                <td class="text-end"><button class="btn btn-primary btn-sm">+</button></td>
            </tr>
            
            @if ($s->sparepart->isEmpty())
                <tr>
                    <td>(kosong)</td>
                </tr>
            @else
            <tr>
                <td colspan="3">
    
                    <table class="table align-middle">    
                      @foreach ($s->sparepart as $p)
                          
                        <tr>
                            <td>{{ $p->nama_sparepart }}</td>
                            
                            <td class="text-end"><button class="btn btn-primary btn-sm">+</button></td>
                        </tr>
    
                        @endforeach

                    </table>
                </td>
            </tr>
            @endif

              
        @endforeach

    </table>
    
</div>
</div>
</div>

@endsection