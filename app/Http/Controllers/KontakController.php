<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;
use Validator;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kontak',[
            'title'=>'Kontak'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = Validator::make($request->all(),[
            'nama'=>'required|max:40',
            'email'=>'required',
            'no_telp'=>'required|numeric',
            'pesan'=>'required|max:250'
        ]);
        if ($val->fails()) {
            return back()->withErrors($val)->withInput();
        } else {
            Kontak::create([
                'nama'=>$request->nama,
                'email'=>$request->email,
                'no_telp'=>$request->no_telp,
                'pesan'=>$request->pesan
            ]);
            return back()->with('sukses','Pesan berhasil di kirim!');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Kontak $kontak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kontak $kontak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kontak $kontak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kontak $kontak)
    {
        //
    }
}
