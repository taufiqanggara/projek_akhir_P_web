<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Unique;
use Symfony\Contracts\Service\Attribute\Required;

class mahasiswacontroler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = mahasiswa::OrderBy('nim','asc')->paginate(20);
        return view('mahasiswa.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        Session::flash('nim',$request->nim);
        Session::flash('nama',$request->nama);
        Session::flash('nilai',$request->nilai);

        $request->validate([
            'nim'=>'Required|numeric|unique:mahasiswa,nim',
            'nama'=>'Required',
            'nilai'=>'Required|numeric',
        ],[
            'nim.required'=> 'NIM wajib di isi',
            'nim.numeric'=> 'NIM wajib angka',
            'nim.unique'=> 'NIM sudah pernah di masukan',
            'nama.required'=> 'nama wajib di isi',
            'nilai.required'=> 'nilai wajib di isi',
            'nilai.numeric'=> 'nilai wajib angka'
        ]);
        $data = [
            'nim'=>$request->nim,
            'nama'=>$request->nama,
            'nilai'=>$request->nilai,
        ];
        mahasiswa::create($data);
        return redirect()->to('mahasiswa')->with('success','data berhasil masuk');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = mahasiswa::where('nim',$id)->first();
        return view('mahasiswa.edit')->with('data',$data);
    }  

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'=>'Required',
            'nilai'=>'Required|numeric',
        ], [
            'nama.required'=> 'nama wajib di isi',
            'nilai.required'=> 'nilai wajib di isi',
            'nilai.numeric'=> 'nilai wajib angka'
        ]);
        $data = [
            'nama'=>$request->nama,
            'nilai'=>$request->nilai,
        ];
        mahasiswa::where('nim', $id)->update($data);
        //mahasiswa::where('nim',$id)->update($data);
        return redirect()->to('mahasiswa')->with('success','data berhasil di update');
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        mahasiswa::where('nim',$id)->delete();
        return redirect()->to('mahasiswa')->with('success','berhasil menghapus data');
    }
}
