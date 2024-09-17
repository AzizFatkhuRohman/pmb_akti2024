<?php

namespace App\Http\Controllers;

use App\Models\ProfilAyah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use Validator;

class ProfilAyahController extends Controller
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
            'no_ktp_ayah' => 'required|numeric|unique:profil_ayah',
            'status_ayah' => 'required|in:Ayah Kandung,Ayah Tiri,Ayah Angkat',
            'nama_ayah' => 'required|string|max:255',
            'tempat_lahir_ayah' => 'required|string|max:255',
            'tanggal_lahir_ayah' => 'required|date',
            'pendidikan_ayah' => 'required|in:SD,SMP,SMA,DIPLOMA,S1,S2,S3',
            'pekerjaan_ayah' => 'required|string|max:255',
            'photo_ayah' => 'required|image|mimes:jpeg,png,jpg|max:20480',
            'ktp_ayah' => 'required|image|mimes:jpeg,png,jpg|max:20480',
            'penghasilan_bulanan' => 'required|numeric',
            'status_pernikahan' => 'required|max:255',
            'alamat' => 'required|string|max:255',
            'no_rumah' => 'required|string|max:50',
            'rt' => 'required|string|max:10',
            'rw' => 'required|string|max:10',
            'kode_pos' => 'required|string|max:10',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'desa' => 'required|string|max:255',
            'no_telp' => 'required|max:20',
            'email' => 'required|email|max:255',
        ]);
        if ($val->fails()) {
            return redirect('mahasiswa/data-keluarga')->withErrors($val)->with('gagal','Kesalahan input!');
        } else {
            $photo=Str::random(20).'.'.$request->file('photo_ayah')->getClientOriginalExtension();
            $request->file('photo_ayah')->move(public_path('photo_ayah'),$photo);
            $ktp=Str::random(20).'.'.$request->file('ktp_ayah')->getClientOriginalExtension();
            $request->file('ktp_ayah')->move(public_path('ktp_ayah'),$ktp);
            ProfilAyah::create([
            'user_id'=>Auth::user()->id,
	        'no_ktp_ayah' => $request->no_ktp_ayah,
                'status_ayah' => $request->status_ayah,
                'nama_ayah' => $request->nama_ayah,
                'tempat_lahir' => $request->tempat_lahir_ayah,
                'tanggal_lahir' => $request->tanggal_lahir_ayah,
                'pendidikan_terakhir' => $request->pendidikan_ayah,
                'pekerjaan' => $request->pekerjaan_ayah,
                'penghasilan_bulanan' => $request->penghasilan_bulanan,
                'status_pernikahan' => $request->status_pernikahan,
                'alamat' => $request->alamat,
                'no_rumah' => $request->no_rumah,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'kode_pos' => $request->kode_pos,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'kecamatan' => $request->kecamatan,
                'desa' => $request->desa,
                'no_telp' => $request->no_telp,
                'email' => $request->email,
                'photo_ayah' => $photo,
                'ktp_ayah' => $ktp,
            ]);
            return redirect('mahasiswa/data-keluarga')->with('sukses','Data berhasil di submit!');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfilAyah $profilAyah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfilAyah $profilAyah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $val = Validator::make($request->all(),[
            'no_ktp_ayah' => 'required|numeric',
            'status_ayah' => 'required',
            'nama_ayah' => 'required|string|max:255',
            'tempat_lahir_ayah' => 'required|string|max:255',
            'tanggal_lahir_ayah' => 'required|date',
            'pendidikan_ayah' => 'required',
            'pekerjaan_ayah' => 'required|string|max:255',
            'penghasilan_bulanan' => 'required|numeric',
            'status_pernikahan' => 'required|max:255',
            'alamat' => 'required|string|max:255',
            'no_rumah' => 'required|string|max:50',
            'rt' => 'required|string|max:10',
            'rw' => 'required|string|max:10',
            'kode_pos' => 'required|string|max:10',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'desa' => 'required|string|max:255',
            'no_telp' => 'required|max:20',
            'email' => 'required|email|max:255',
        ]);
        if ($val->fails()) {
            return redirect('mahasiswa/data-keluarga')->withErrors($val)->with('gagal','Kesalahan input!');
        } else {
            
            ProfilAyah::find($id)->update([
            'user_id'=>Auth::user()->id,
	        'no_ktp_ayah' => $request->no_ktp_ayah,
                'status_ayah' => $request->status_ayah,
                'nama_ayah' => $request->nama_ayah,
                'tempat_lahir' => $request->tempat_lahir_ayah,
                'tanggal_lahir' => $request->tanggal_lahir_ayah,
                'pendidikan_terakhir' => $request->pendidikan_ayah,
                'pekerjaan' => $request->pekerjaan_ayah,
                'penghasilan_bulanan' => $request->penghasilan_bulanan,
                'status_pernikahan' => $request->status_pernikahan,
                'alamat' => $request->alamat,
                'no_rumah' => $request->no_rumah,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'kode_pos' => $request->kode_pos,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'kecamatan' => $request->kecamatan,
                'desa' => $request->desa,
                'no_telp' => $request->no_telp,
                'email' => $request->email
            ]);
            return redirect('mahasiswa/data-keluarga')->with('sukses','Data berhasil di submit!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfilAyah $profilAyah)
    {
        //
    }
}
