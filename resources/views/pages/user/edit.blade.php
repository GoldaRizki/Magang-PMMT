@extends('layouts.header')

@section('konten')
<div class="container px-10">

    <form method="post" action="/user/update/">
        @csrf
        @method('PUT')
    <input type="hidden" name="id" value="{{ old('id', $user->id) }}">

    <div class="mb-4">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" value="{{ old('username', $user->username) }}" name="username">
        @error('username')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="nama" id="nama" value="{{ old('nama', $user->nama) }}" name="nama">
        @error('nama')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-4">
    <label for="level" class="form-label @error('level') is-invalid @enderror">Level / Role</label>
    <select id="level" name="level" class="form-select">
        <option value="{{ old('level', $user->level) }}" selected>{{ old('level', $user->level) }}</option>
        <option value="Teknisi">Teknisi</option>
        <option value="Supervisor">Supervisor</option>
        <option value="Manager">Manager</option>
        <option value="Admin">Admin</option>
      </select>
      @error('level')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
    </div>
    

    <div class="my-9 text-end">
    <button type="submit" class="btn btn-lg btn-primary d-inline text-end">
        <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil008.svg-->
        <span class="svg-icon svg-icon-muted svg-icon-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM11.7 17.7L16.7 12.7C17.1 12.3 17.1 11.7 16.7 11.3C16.3 10.9 15.7 10.9 15.3 11.3L11 15.6L8.70001 13.3C8.30001 12.9 7.69999 12.9 7.29999 13.3C6.89999 13.7 6.89999 14.3 7.29999 14.7L10.3 17.7C10.5 17.9 10.8 18 11 18C11.2 18 11.5 17.9 11.7 17.7Z" fill="black"/>
                <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black"/>
            </svg></span>
            <!--end::Svg Icon-->
            Simpan Perubahan
        </button>
    </div>
        

</form>

</div>


@endsection