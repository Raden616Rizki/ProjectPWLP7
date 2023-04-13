@extends('mahasiswas.layout')
@section('content')
<div class="container mt-2 text-center">
    <h2 class="mb-4">Jurusan Teknologi Informasi - Politeknik Negeri Malang</h2>
    <h2 class="mb-4">KARTU HASIL STUDI (KHS)</h2>
    <ul class="list-group list-group-flush text-left mb-4">
        <li class="list-group-item"><b>Nim: </b>{{$Mahasiswa->nim}}</li>
        <li class="list-group-item"><b>Nama: </b>{{$Mahasiswa->nama}}</li>
        <li class="list-group-item"><b>Kelas: </b>{{$Mahasiswa->kelas->nama_kelas}}</li>
    </ul>
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 70rem;">
            <div class="card-header bg-dark text-white">
                Nilai Mahasiswa
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Mata_Kuliah</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th>Nilai</th>
                    </tr>
                    @foreach ($Mahasiswa->mataKuliah as $matkul)
                    <tr>
                        <td>{{ $matkul->nama_matkul }}</td>
                        <td>{{ $matkul->sks }}</td>
                        <td>{{ $matkul->semester }}</td>
                        <td>{{ $matkul->pivot->nilai }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <a class="btn btn-success mt-3" href="{{ route('mahasiswas.index') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection
