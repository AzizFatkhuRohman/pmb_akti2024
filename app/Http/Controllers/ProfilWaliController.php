<?php

namespace App\Http\Controllers;

use App\Models\ProfilWali;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use Validator;

class ProfilWaliController extends Controller
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
    // Validate input
    $val = Validator::make($request->all(), [
        'no_ktp_wali' => 'required|numeric',
            'status_wali' => 'required',
            'nama_wali' => 'required|string|max:255',
            'tempat_lahir_wali' => 'required|string|max:255',
            'tanggal_lahir_wali' => 'required|date',
            'pendidikan_wali' => 'required',
            'pekerjaan_wali' => 'required|string|max:255',
            'photo_wali' => 'required|image|mimes:jpeg,png,jpg|max:20480',
            'ktp_wali' => 'required|image|mimes:jpeg,png,jpg|max:20480',
            'penghasilan_bulanan_wali' => 'required|numeric',
            'status_pernikahan_wali' => 'required|max:255',
            'alamat_wali' => 'required|string|max:255',
            'no_rumah_wali' => 'required|string|max:50',
            'rt_wali' => 'required|string|max:10',
            'rw_wali' => 'required|string|max:10',
            'kode_pos_wali' => 'required|string|max:10',
            'provinsi_wali' => 'required|string|max:255',
            'kota_wali' => 'required|string|max:255',
            'kecamatan_wali' => 'required|string|max:255',
            'desa_wali' => 'required|string|max:255',
            'no_telp_wali' => 'required|max:20',
            'email_wali' => 'required|email|max:255',
    ]);

    if ($val->fails()) {
        return redirect('mahasiswa/data-keluarga')
            ->withErrors($val)
            ->withInput()->with('gagal','Kesalahan input!');
    }

    // Handle file uploads
    $waliFileName = Str::random(20) . '.' . $request->file('photo_wali')->getClientOriginalExtension();
    $request->file('photo_wali')->move(public_path('photo_wali'), $waliFileName);

    $ktpWaliFileName = Str::random(20) . '.' . $request->file('ktp_wali')->getClientOriginalExtension();
    $request->file('ktp_wali')->move(public_path('ktp_wali'), $ktpWaliFileName);

    // Save the data
    ProfilWali::create([
        'user_id' => Auth::user()->id,
        'no_ktp_wali' => $request->no_ktp_wali,
        'status_wali' => $request->status_wali,
        'nama_wali' => $request->nama_wali,
        'tempat_lahir' => $request->tempat_lahir_wali,
        'tanggal_lahir' => $request->tanggal_lahir_wali,
        'pendidikan_terakhir' => $request->pendidikan_wali,
        'pekerjaan' => $request->pekerjaan_wali,
        'penghasilan_bulanan' => $request->penghasilan_bulanan_wali,
        'status_pernikahan' => $request->status_pernikahan_wali,
        'alamat' => $request->alamat_wali,
        'no_rumah' => $request->no_rumah_wali,
        'rt' => $request->rt_wali,
        'rw' => $request->rw_wali,
        'kode_pos' => $request->kode_pos_wali,
        'provinsi' => $request->provinsi_wali,
        'kota' => $request->kota_wali,
        'kecamatan' => $request->kecamatan_wali,
        'desa' => $request->desa_wali,
        'no_telp' => $request->no_telp_wali,
        'email' => $request->email_wali,
        'photo_wali' => $waliFileName,
        'ktp_wali' => $ktpWaliFileName,
    ]);

    // Redirect with success message
    return redirect('mahasiswa/data-keluarga')->with('sukses', 'Data berhasil di submit!');
}


    /**
     * Display the specified resource.
     */
    public function show(ProfilWali $profilWali)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfilWali $profilWali)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $val = Validator::make($request->all(), [
            'no_ktp_wali' => 'required|numeric',
                'status_wali' => 'required',
                'nama_wali' => 'required|string|max:255',
                'tempat_lahir_wali' => 'required|string|max:255',
                'tanggal_lahir_wali' => 'required|date',
                'pendidikan_wali' => 'required',
                'pekerjaan_wali' => 'required|string|max:255',
                'penghasilan_bulanan_wali' => 'required|numeric',
                'status_pernikahan_wali' => 'required|max:255',
                'alamat_wali' => 'required|string|max:255',
                'no_rumah_wali' => 'required|string|max:50',
                'rt_wali' => 'required|string|max:10',
                'rw_wali' => 'required|string|max:10',
                'kode_pos_wali' => 'required|string|max:10',
                'provinsi_wali' => 'required|string|max:255',
                'kota_wali' => 'required|string|max:255',
                'kecamatan_wali' => 'required|string|max:255',
                'desa_wali' => 'required|string|max:255',
                'no_telp_wali' => 'required|max:20',
                'email_wali' => 'required|email|max:255',
        ]);
    
        if ($val->fails()) {
            return redirect('mahasiswa/data-keluarga')
                ->withErrors($val)
                ->withInput()->with('gagal','Kesalahan input!');
        }
        // Save the data
        ProfilWali::find($id)->update([
            'user_id' => Auth::user()->id,
            'no_ktp_wali' => $request->no_ktp_wali,
            'status_wali' => $request->status_wali,
            'nama_wali' => $request->nama_wali,
            'tempat_lahir' => $request->tempat_lahir_wali,
            'tanggal_lahir' => $request->tanggal_lahir_wali,
            'pendidikan_terakhir' => $request->pendidikan_wali,
            'pekerjaan' => $request->pekerjaan_wali,
            'penghasilan_bulanan' => $request->penghasilan_bulanan_wali,
            'status_pernikahan' => $request->status_pernikahan_wali,
            'alamat' => $request->alamat_wali,
            'no_rumah' => $request->no_rumah_wali,
            'rt' => $request->rt_wali,
            'rw' => $request->rw_wali,
            'kode_pos' => $request->kode_pos_wali,
            'provinsi' => $request->provinsi_wali,
            'kota' => $request->kota_wali,
            'kecamatan' => $request->kecamatan_wali,
            'desa' => $request->desa_wali,
            'no_telp' => $request->no_telp_wali,
            'email' => $request->email_wali
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfilWali $profilWali)
    {
        //
    }
}
