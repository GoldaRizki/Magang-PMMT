

<script>
@if(session('tambah'))

Swal.fire({
    title: 'Data Berhasil Ditambahkan',
    icon: 'success',
    timer: 1000,
});

@endif

@if(session('edit'))

Swal.fire({
    title: 'Data Berhasil Diedit',
    icon: 'success',
    timer: 1000,
});

@endif

@if(session('hapus'))

Swal.fire({
    title: 'Data Berhasil Dihapus',
    icon: 'success',
    timer: 1000,
});

@endif


</script>

