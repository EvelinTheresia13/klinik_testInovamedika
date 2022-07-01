<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = Pasien::get();
        
        return view('pasien.index',['pasien'=>$pasien] );
    }

    public function AddPasien()
    {
        return view('pasien.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_pasien' => 'required',
            'no_telp' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
        ]);

        Pasien::create([
            'nama_pasien'=> $request->nama_pasien,
            'no_telp'=>$request->no_telp,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'email'=>$request->email,
        ]);
        return redirect('/pegawai/pasien')->with('Berhasil!','Data Berhasil di tambah');
    }

    public function edit($id)
    {
        $pasien = Pasien::where('id',$id)->get();
	    return view('pasien.edit' ,['pasien' => $pasien])->with('Berhasil!','Data Pasien Berhasil di Edit');
    }

    public function update(Request $request)
    {
        Pasien::where('id',$request->id)->update([
            'nama_pasien'=> $request->nama_pasien,
            'no_telp'=>$request->no_telp,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'email'=>$request->email,
        ]);
        return redirect('/pegawai/pasien')->with('Berhasil!','Data Pasien Berhasil di Update');
    }

    public function delete($id)
    {
        $pasien = Pasien::where('id',$id)->delete();
	    return redirect('/pegawai/pasien')->with('success','Data Pasien Berhasil di Hapus');
    }

}
