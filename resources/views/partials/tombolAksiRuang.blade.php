@can('admin')
<button type="button" class="btn btn-sm btn-primary py-0" onclick="aksiEdit({{ $r->id }}, '{{ $r->nama_ruang }}', '{{ $r->no_ruang }}', '{{ $r->bagian }}')" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
    Edit
</button>




<form action="/ruang/destroy" method="post" onSubmit="return hapus(this);" style ='display:inline-block;'>
 @method('delete')
 @csrf
 <input type="hidden" name="id" value="{{ $r->id }}">
 <button class="btn btn-sm btn-danger py-0" type="submit">
   <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen027.svg-->
   <span class="svg-icon svg-icon-muted svg-icon-7">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
        <path fill="white" d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
        <path fill="white" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
      </svg>
    </span>
 <!--end::Svg Icon-->

<span>Hapus</span>
</button>
</form>      
@else
 - 
@endcan