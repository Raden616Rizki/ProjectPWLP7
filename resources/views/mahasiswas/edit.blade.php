@extends('mahasiswas.layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Mahasiswa
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
                <form method="post" action="{{ route('mahasiswas.update', $Mahasiswa->nim) }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" name="nim" class="formcontrol" id="nim" value="{{ $Mahasiswa->nim }}"
                            ariadescribedby="nim">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="formcontrol" id="nama" value="{{ $Mahasiswa->nama }}"
                            ariadescribedby="nama">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" required="required" name="foto" value="{{$Mahasiswa->foto}}" placeholder="{{$Mahasiswa->foto}}"></br>
                        <img src="{{asset('storage/'.$Mahasiswa->foto)}}" alt="foto profile" style="height: 100px; width: 100px; overflow: hidden; object-fit: cover;">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        {{-- <input type="text" name="kelas" class="formcontrol" id="kelas" aria-describedby="kelas"> --}}
                        <select name="kelas" class="form-control">
                            @foreach ($kelas as $Kelas)
                                {{-- <script>
                                    console.log({{$Kelas->nama}});
                                </script> --}}
                                @if ($Mahasiswa->kelas_id == $Kelas->id)
                                    <option value={{ $Kelas->id }} selected>{{ $Kelas->nama_kelas }}</option>
                                @else
                                    <option value={{ $Kelas->id }}>{{ $Kelas->nama_kelas }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" name="jurusan" class="formcontrol" id="jurusan"
                            value="{{ $Mahasiswa->jurusan }}" ariadescribedby="Jurusan">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No_Hp</label>
                        <input type="text" name="no_hp" class="formcontrol" id="no_hp"
                            value="{{ $Mahasiswa->no_hp }}" ariadescribedby="No_HP">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="formcontrol" id="email"
                            value="{{ $Mahasiswa->email }}" aria-describedby="email">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal_Lahir</label>
                        <input type="date" name="tanggal_lahir" class="formcontrol" id="tanggal_lahir"
                            value="{{ $Mahasiswa->tanggal_lahir }}" aria-describedby="tanggal_lahir">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
