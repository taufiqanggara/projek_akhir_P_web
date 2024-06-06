@extends('layout.template')
@section('konten')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM kepALA -->
                <div style="text-align: center;">
                    <p style="font-weight: bold; font-size: 24px;">Website Input Nilai Sederhana Walaupun Terlalu Sederhana</p>
                    <p style="text-align: center; font-weight: bold; font-size: 24px;">DARI TAUFIQ 5221011042</p>
                </div>
                



                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='{{ url('mahasiswa/create') }}' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">NIM</th>
                            <th class="col-md-4">Nama</th>
                            <th class="col-md-2">nilai</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data -> firstItem()?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->nim}}</td>
                            <td>{{ $item->nama}}</td>
                            <td>{{ $item->nilai}}</td>
                            <td>
                                <a href='{{ url('mahasiswa/'.$item->nim.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                                
                                <form onsubmit="return confirm('yakin akan menghapus data?')" class='d-inline' action="{{ url('mahasiswa/'.$item->nim) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                                </form>
                                
                            </td>
                        </tr>
                        <?php $i++?>
                        @endforeach
                        
                    </tbody>   
                </table>
               {{$data->links()}}
          </div>
      
@endsection