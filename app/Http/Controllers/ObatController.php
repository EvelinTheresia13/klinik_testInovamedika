<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::get();
        
        return view('obat.index',['obat'=>$obat] );
    }

    public function AddObat()
    {
        return view('obat.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        Obat::create([
            'nama'=> $request->nama,
            'harga'=>$request->harga,
            'stok'=>$request->stok
        ]);
        return redirect('/pegawai/obat')->with('Berhasil!','Data Berhasil di tambah');
    }

    public function edit($id)
    {
        $obat = Obat::where('id',$id)->get();
	    return view('obat.edit' ,['obat' => $obat])->with('Berhasil!','Daftar Obat Berhasil di Edit');
    }

    public function update(Request $request)
    {
        Obat::where('id',$request->id)->update([
            'nama'=> $request->nama,
            'harga'=>$request->harga,
            'stok'=>$request->stok
        ]);
        return redirect('/pegawai/obat')->with('Berhasil!','Daftar Obat Berhasil di Update');
    }

    public function delete($id)
    {
        $obat = Obat::where('id',$id)->delete();
	    return redirect('/pegawai/obat')->with('success','Daftar Obat Berhasil di Hapus');
    }
}
