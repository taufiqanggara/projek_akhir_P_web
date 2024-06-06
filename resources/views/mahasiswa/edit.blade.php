@extends('layout.template')
<!-- START FORM -->

@section('konten')



<form action={{url('mahasiswa/'.$data-> nim)}} method='POST'>
@csrf
@method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{ url('mahasiswa') }}' class="btn btn-secondary"><< kembali</a>
            <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    {{$data->nim}}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama'value="{{ $data->nama }}" id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nilai" class="col-sm-2 col-form-label">nilai</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='nilai' value="{{ $data->nilai }}" id="nilai">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nilai" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
    </div>
    
</form>

<!-- AKHIR FORM -->
@endsection