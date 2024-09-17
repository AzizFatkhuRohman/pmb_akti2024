<?php

namespace App\Http\Controllers;

use App\Models\ProfilIbu;
use Auth;
use Illuminate\Http\Request;
use Str;
use Validator;

class ProfilIbuController extends Controller
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
            'no_ktp_ibu' => 'required|numeric|unique:profil_ibu',
            'status_ibu' => 'required',
            'nama_ibu' => 'required|string|max:255',
            'tempat_lahir_ibu' => 'required|string|max:255',
            'tanggal_lahir_ibu' => 'required|date',
            'pendidikan_ibu' => 'required',
            'pekerjaan_ibu' => 'required|string|max:255',
            'photo_ibu' => 'required|image|mimes:jpeg,png,jpg|max:20480',
            'ktp_ibu' => 'required|image|mimes:jpeg,png,jpg|max:20480',
            'penghasilan_bulanan_ibu' => 'required|numeric',
            'status_pernikahan_ibu' => 'required|max:255',
            'alamat_ibu' => 'required|string|max:255',
            'no_rumah_ibu' => 'required|string|max:50',
            'rt_ibu' => 'required|string|max:10',
            'rw_ibu' => 'required|string|max:10',
            'kode_pos_ibu' => 'required|string|max:10',
            'provinsi_ibu' => 'required|string|max:255',
            'kota_ibu' => 'required|string|max:255',
            'kecamatan_ibu' => 'required|string|max:255',
            'desa_ibu' => 'required|string|max:255',
            'no_telp_ibu' => 'required|max:20',
            'email_ibu' => 'required|email|max:255',
        ]);
        if ($val->fails()) {
            return redirect('mahasiswa/data-keluarga')->withErrors($val)->with('gagal','Kesalahan input!');
        } else {
            $photo=Str::random(20).'.'.$request->file('photo_ibu')->getClientOriginalExtension();
            $request->file('photo_ibu')->move(public_path('photo_ibu'),$photo);
            $ktp=Str::random(20).'.'.$request->file('ktp_ibu')->getClientOriginalExtension();
            $request->file('ktp_ibu')->move(public_path('ktp_ibu'),$ktp);
            ProfilIbu::create([
            'user_id'=>Auth::user()->id,
	        'no_ktp_ibu' => $request->no_ktp_ibu,
                'status_ibu' => $request->status_ibu,
                'nama_ibu' => $request->nama_ibu,
                'tempat_lahir' => $request->tempat_lahir_ibu,
                'tanggal_lahir' => $request->tanggal_lahir_ibu,
                'pendidikan_terakhir' => $request->pendidikan_ibu,
                'pekerjaan' => $request->pekerjaan_ibu,
                'penghasilan_bulanan' => $request->penghasilan_bulanan_ibu,
                'status_pernikahan' => $request->status_pernikahan_ibu,
                'alamat' => $request->alamat_ibu,
                'no_rumah' => $request->no_rumah_ibu,
                'rt' => $request->rt_ibu,
                'rw' => $request->rw_ibu,
                'kode_pos' => $request->kode_pos_ibu,
                'provinsi' => $request->provinsi_ibu,
                'kota' => $request->kota_ibu,
                'kecamatan' => $request->kecamatan_ibu,
                'desa' => $request->desa_ibu,
                'no_telp' => $request->no_telp_ibu,
                'email' => $request->email_ibu,
                'photo_ibu' => $photo,
                'ktp_ibu' => $ktp,
            ]);
            return redirect('mahasiswa/data-keluarga')->with('sukses','Data berhasil di submit!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfilIbu $profilIbu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfilIbu $profilIbu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $val = Validator::make($request->all(),[
            'no_ktp_ibu' => 'required|numeric',
            'status_ibu' => 'required',
            'nama_ibu' => 'required|string|max:255',
            'tempat_lahir_ibu' => 'required|string|max:255',
            'tanggal_lahir_ibu' => 'required|date',
            'pendidikan_ibu' => 'required',
            'pekerjaan_ibu' => 'required|string|max:255',
            'penghasilan_bulanan_ibu' => 'required|numeric',
            'status_pernikahan_ibu' => 'required|max:255',
            'alamat_ibu' => 'required|string|max:255',
            'no_rumah_ibu' => 'required|string|max:50',
            'rt_ibu' => 'required|string|max:10',
            'rw_ibu' => 'required|string|max:10',
            'kode_pos_ibu' => 'required|string|max:10',
            'provinsi_ibu' => 'required|string|max:255',
            'kota_ibu' => 'required|string|max:255',
            'kecamatan_ibu' => 'required|string|max:255',
            'desa_ibu' => 'required|string|max:255',
            'no_telp_ibu' => 'required|max:20',
            'email_ibu' => 'required|email|max:255',
        ]);
        if ($val->fails()) {
            return redirect('mahasiswa/data-keluarga')->withErrors($val)->with('gagal','Kesalahan input!');
        } else {
            ProfilIbu::find($id)->update([
            'user_id'=>Auth::user()->id,
	        'no_ktp_ibu' => $request->no_ktp_ibu,
                'status_ibu' => $request->status_ibu,
                'nama_ibu' => $request->nama_ibu,
                'tempat_lahir' => $request->tempat_lahir_ibu,
                'tanggal_lahir' => $request->tanggal_lahir_ibu,
                'pendidikan_terakhir' => $request->pendidikan_ibu,
                'pekerjaan' => $request->pekerjaan_ibu,
                'penghasilan_bulanan' => $request->penghasilan_bulanan_ibu,
                'status_pernikahan' => $request->status_pernikahan_ibu,
                'alamat' => $request->alamat_ibu,
                'no_rumah' => $request->no_rumah_ibu,
                'rt' => $request->rt_ibu,
                'rw' => $request->rw_ibu,
                'kode_pos' => $request->kode_pos_ibu,
                'provinsi' => $request->provinsi_ibu,
                'kota' => $request->kota_ibu,
                'kecamatan' => $request->kecamatan_ibu,
                'desa' => $request->desa_ibu,
                'no_telp' => $request->no_telp_ibu,
                'email' => $request->email_ibu
            ]);
            return redirect('mahasiswa/data-keluarga')->with('sukses','Data berhasil di submit!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfilIbu $profilIbu)
    {
        //
    }
}
