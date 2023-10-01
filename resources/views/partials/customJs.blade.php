<script>

function hapus(form) {
	
	
	Swal.fire({
		title: 'Apakah anda yakin akan menghapus?',
		text: 'Apabila data dihapus, maka data yang bergantung juga akan dihapus',
		showCancelButton: true,
		confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',
		confirmButtonColor : '#F14182',
		icon: 'question',
	}).then((result) => {
	/* Read more about isConfirmed, isDenied below */
	if (result.isConfirmed) {
		form.submit()
	} });


return false;

}    

function hapusSetup(form) {
	
	
	Swal.fire({
		title: 'Apakah anda yakin akan menghapus?',
		showCancelButton: true,
		confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',
		confirmButtonColor : '#F14182',
		icon: 'question',
	}).then((result) => {
	/* Read more about isConfirmed, isDenied below */
	if (result.isConfirmed) {
		form.submit()
	} });


return false;

}    
</script>