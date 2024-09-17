<?php

namespace App\Http\Controllers;

use App\Models\ProfilSaudara;
use Auth;
use Illuminate\Http\Request;
use Validator;

class ProfilSaudaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'status_saudara1'=>'required',
            'nama_saudara1'=>'required',
            'pendidikan_saudara1'=>'required',
            'pekerjaan_saudara1'=>'required'
        ]);
        if ($val->fails()) {
            return redirect('mahasiswa/data-keluarga')->withErrors($val)->withInput()->with('gagal','Kesalahan input!');
        } else {
            ProfilSaudara::create([
                'user_id'=>Auth::user()->id,
                'status_saudara1'=>$request->status_saudara1,
                'nama_saudara1'=>$request->nama_saudara1,
                'pendidikan_terakhir1'=>$request->pendidikan_saudara1,
                'pekerjaan1'=>$request->pekerjaan_saudara1,
                'status_saudara2'=>$request->status_saudara2,
                'nama_saudara2'=>$request->nama_saudara2,
                'pendidikan_terakhir2'=>$request->pendidikan_saudara2,
                'pekerjaan2'=>$request->pekerjaan_saudara2,
                'status_saudara3'=>$request->status_saudara3,
                'nama_saudara3'=>$request->nama_saudara3,
                'pendidikan_terakhir3'=>$request->pendidikan_saudara3,
                'pekerjaan3'=>$request->pekerjaan_saudara3
            ]);
            return redirect('mahasiswa/data-keluarga')->with('sukses','Data berhasil di submit!');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfilSaudara $profilSaudara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfilSaudara $profilSaudara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfilSaudara $profilSaudara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfilSaudara $profilSaudara)
    {
        //
    }
}
