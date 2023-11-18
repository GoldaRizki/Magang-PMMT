@extends('layouts.simpleTable')


@section('customAddData')
<div class="modal fade" tabindex="-1" id="kt_modal_1">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Pilih Tanggal</h5>

              <!--begin::Close-->
              <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                  <span class="svg-icon svg-icon-2x"></span>
              </div>
              <!--end::Close-->
          </div>

          <div class="modal-body">
<form action="/laporan/inspeksi/" method="POST">
  @csrf       
            <div class="input-group my-4">
        
              <input type="hidden" id="maintenance_id" name="maintenance_id">
      
          <span class="form-label float-start">Tanggal Awal</span>
          <div class="input-group date">
              <input type="text" class="form-control @error('tanggal_awal')is-invalid @enderror" id="form_tanggal_awal" value="{{ old('tanggal_awal')  }}" name="tanggal_awal" readonly>
              
              <button class="btn btn-secondary" type="button">
                  <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil002.svg-->
                  <span class="svg-icon svg-icon-muted svg-icon-2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                          <path opacity="0.3" d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z" fill="black"/>
                          <path d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z" fill="black"/>
                      </svg>
                  </span>
                  <!--end::Svg Icon-->
              </button>
          </div>
      </div>
      
      <div class="input-group my-4">
        
    <span class="form-label float-start">Tanggal Akhir</span>
    <div class="input-group date">
        <input type="text" class="form-control @error('tanggal_akhir')is-invalid @enderror" id="form_tanggal_akhir" value="{{ old('tanggal_akhir')  }}" name="tanggal_akhir" readonly>
        
        <button class="btn btn-secondary" type="button">
            <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil002.svg-->
            <span class="svg-icon svg-icon-muted svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                    <path opacity="0.3" d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z" fill="black"/>
                    <path d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z" fill="black"/>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </button>
    </div>
  </div>
          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">OK</button>
          </div>
  </form>

      </div>
  </div>
</div>

<form action="/laporan/rencana_realisasi" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary">
        <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil009.svg-->
        <span class="svg-icon svg-icon-muted svg-icon-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM13 15.4V10C13 9.4 12.6 9 12 9C11.4 9 11 9.4 11 10V15.4H8L11.3 18.7C11.7 19.1 12.3 19.1 12.7 18.7L16 15.4H13Z" fill="black"/>
                <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black"/>
            </svg>
        </span>
        <!--end::Svg Icon-->
        Rencana - Realisasi
    </button>
</form>
  
@endsection

@section('tableHead')
    
                    <th>Maintenance</th>
                    <th>Mesin</th>
                    <th>Mesin Id</th>
                    <th>Laporan</th>

@endsection



@section('data')
<script>
			//makan bang
    $('#tabelTemplate').DataTable({
      
      columnDefs: [
{
  class:'all',
  target: 1
},
{
  responsivePriority:11005,
  class:'min-tablet-l',
  target:[-1,-2]
}
],
pageLength: 25,
responsive: true,
processing: true,
dom:'<"top"lf>rtip<"bottom"><"clear">',
serverSide: true,
ajax: "/laporan",
columns: [
{data: 'nama_maintenance', name: 'nama_maintenance'},
{data: 'nama_mesin', name: 'nama_mesin', searchable: true},
{data: 'mesin_id', name: 'mesin_id'},
{data: 'aksi', name: 'aksi', orderable: false, searchable: false},

//{data: 'kategori', name: 'kategori', orderable: false, searchable: false},

        ],
        order: [[2, 'asc']],
    rowGroup: {
        dataSrc: 'mesin_id'
    }

    });
  


$('.input-group.date').datepicker({
    format: "dd-mm-yyyy",
    todayBtn: "linked",
    language: "id",
    autoclose: true,
    todayHighlight: true,
    orientation: "bottom left"
});

function formDownload(maintenance_id) {
    document.getElementById('maintenance_id').value = maintenance_id;
}

@error('tanggal_error')

Swal.fire({
    title: 'Input Tanggal Tidak Valid!',
    text: '{{ $message }}',
    icon: 'error',
});

@enderror
</script>
@endsection