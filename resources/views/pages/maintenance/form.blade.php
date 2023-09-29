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

    @php
        $setup = collect(Cache::get('setup'));
    
    @endphp




    <div class="col-md-8">
@if($setup->isNotEmpty())
        <table class="table gs-7 align-middle">

         
        @foreach ($setup as $s)
                
            <tr class="table-primary">
                <td class="fw-bold fs-2">{{ $s->get('nama_setup') }}</td>
                <td class="fs-2">{{ $s->get('periode') }}</td>
                <td class="fs-2">{{ $s->get('satuan_periode') }}</td>
                <td class="text-end"><button class="btn btn-primary btn-sm">+</button></td>
            </tr>

            <tr>
                @if($s->get('setupForm')->isNotEmpty())
                
                <td colspan="3">
                    <table class="table align-middle">
        
                        @foreach ($s->get('setupForm') as $f)
                        <tr>
                            <td>{{ $f->get('nama_setup_form') }}</td>
                            <td>{{ $s->get('periode') }}</td>
                            <td>{{ $s->get('satuan_periode') }}</td>
                           
                        </tr>
                        
                        @endforeach
                    </table>
                </td>
            
            
                @else
                        <td>(kosong)</td>
                @endif
            </tr>
            
           

              
        @endforeach

    </table>
@else

<h2 class="text-center my-7">*Masih Kosong*</h2>

@endif
</div>
</div>
</div>

@endsection