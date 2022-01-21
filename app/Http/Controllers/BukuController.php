<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $objek = \App\Buku::latest()->paginate(10);
        $data['objek'] = $objek;
        return view('buku_index', $data);
    }

    public function create()
    {
        $data['objek'] = new \App\Buku();
        $data['route'] = 'buku.store';
        $data['method'] = 'POST';
        $data['namaTombol'] = 'Simpan';
        return view('buku_form', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'  => 'required',
            'pengarang'  => 'required',
        ]);

        \App\Buku::create([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
        ]);
        flash('Data Sudah Disimpan')->success();
        return back();
    }

    public function edit($id)
    {
        $data['objek'] = \App\Buku::findOrFail($id);
        $data['route'] = ['buku.update', $id];
        $data['method'] = 'PUT';
        $data['namaTombol'] = 'Update';
        return view('buku_form', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'  => 'required',
            'pengarang'  => 'required',
        ]);
        \App\Buku::where('id',$id)->update([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
        ]);
        flash('Data Sudah Diupdate')->success();
        return back();
    }

    public function destroy($id)
    {
        \App\Buku::where('id',$id)->delete();
        flash('Data Sudah Dihapus')->error();
        return back();
    }
}
