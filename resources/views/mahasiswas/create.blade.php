@extends('mahasiswas.layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Mahasiswa
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('mahasiswas.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nim">NIM</label><br>
                        <input type="text" name="nim" class="form-control" id="nim" aria-describedby="nim">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label><br>
                        <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        {{-- <input type="text" name="kelas" class="formcontrol" id="kelas" aria-describedby="kelas"> --}}
                        <select name="kelas" class="form-control">
                            @foreach ($kelas as $Kelas)
                                {{-- <script>
                                    console.log({{$Kelas->nama}});
                                </script> --}}
                                <option value={{ $Kelas->id }}>{{ $Kelas->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label><br>
                        <input type="text" name="jurusan" class="form-control" id="jurusan"
                            aria-describedby="jurusan">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No_HP</label><br>
                        <input type="text" name="no_hp" class="form-control" id="no_hp"
                            aria-describedby="no_hp">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label><br>
                        <input type="email" name="email" class="form-control" id="email"
                            aria-describedby="email">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal_Lahir</label><br>
                        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir"
                            aria-describedby="tanggal_lahir">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
