@extends('layouts.header')



@section('konten')
    @if($tahun_terakhir)
        <h1 class="text-center">Terakhir Update : {{ $tahun_terakhir->created_at }}</h1>
    @else    
        <h1 class="text-center display-6"> Belum pernah dilakukan update, silahkan update dulu</h1>
    @endif
    <div class="containter text-center m-7">
        <form action="/update_tahunan" method="post">
            @csrf
            <button type="submit" class="btn btn-primary btn-lg">UPDATE</button>
        </form> 
    </div>
   
@endsection

@section('customJs')
<script>

@if(session('berhasil_update'))

Swal.fire({
    title: 'Berhasil diUpdate!!',
    icon: 'success',
    timer: 1000,
});
@endif

@error('pernah_update')

Swal.fire({
    title: 'Sudah pernah diUpdate!',
    icon: 'error',
    text: '{{ $message }}'    
});
@enderror


</script>
@endsection