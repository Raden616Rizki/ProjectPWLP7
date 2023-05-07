<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use PDF;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->has('nama')) {
            $nama = request('nama');
            $mahasiswas = Mahasiswa::where('nama', 'LIKE', '%'.$nama.'%')->paginate(5);
            return view('mahasiswas.index', compact('mahasiswas'));
        } else {
            // $mahasiswas = Mahasiswa::all(); // Mengambil semua isi tabel
            $mahasiswas = Mahasiswa::orderBy('nim', 'asc')->paginate(5);
            return view('mahasiswas.index', compact('mahasiswas'));
        }
        //fungsi eloquent menampilkan data menggunakan pagination
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kelas = Kelas::all();
        return view('mahasiswas.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'foto' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'tanggal_lahir' => 'required'
        ]);

        if ($request->file('foto')) {
            $filename = $request->file('foto')->store('foto', 'public');
        }

        //fungsi eloquent untuk menambah data
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->foto = $filename;
        $mahasiswa->jurusan = $request->get('jurusan');
        $mahasiswa->no_hp = $request->get('no_hp');
        $mahasiswa->email = $request->get('email');
        $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');

        // Funsi eloquent untuk menambah data dengan relasi belongs to
        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        //
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Mahasiswa = Mahasiswa::find($nim);
        return view('mahasiswas.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        //
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Mahasiswa = Mahasiswa::find($nim);
        $kelas = Kelas::all();

        return view('mahasiswas.edit', compact('Mahasiswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        //
        //melakukan validasi data
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'foto' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'tanggal_lahir' => 'required'
        ]);

        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->jurusan = $request->get('jurusan');
        $mahasiswa->no_hp = $request->get('no_hp');
        $mahasiswa->email = $request->get('email');
        $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');

        if ($mahasiswa->foto && file_exists(storage_path('app/public/'.$mahasiswa->foto))) {
            \Storage::delete('public/'.$mahasiswa->foto);
        }

        $filename = $request->file('foto')->store('foto', 'public');
        $mahasiswa->foto = $filename;

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        // Fungsi eloquent untuk mengupdate data dengan relasi belongsTo
        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

            //fungsi eloquent untuk mengupdate data inputan kita
            // Mahasiswa::find($nim)->update($request->all());
            //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        //
        //fungsi eloquent untuk menghapus data
        Mahasiswa::find($nim)->delete();
        return redirect()->route('mahasiswas.index') -> with('success', 'Mahasiswa Berhasil Dihapus');
    }

    public function nilai($nim)
    {
        $Mahasiswa = Mahasiswa::find($nim);

        return view('mahasiswas.nilai', compact('Mahasiswa'));
    }

    public function cetak_pdf($nim) {
        $Mahasiswa = Mahasiswa::find($nim);

        $pdf = PDF::loadview('mahasiswas.cetak_pdf', ['Mahasiswa' => $Mahasiswa]);

        return $pdf->stream();
    }

    // public function search(Request $request)
    // {
    //     //
    //     //fungsi eloquent untuk mencari data
    //     $nama = $request->nama;
    //     $mahasiswas = Mahasiswa::where('nama', 'LIKE', '%'.$nama.'%')->paginate(5);
    //     return view('mahasiswas.index', compact('mahasiswas'));
    // }
}
