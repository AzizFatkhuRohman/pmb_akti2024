<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Pendidikan;
use App\Models\ProfilAyah;
use App\Models\ProfilIbu;
use App\Models\ProfilWali;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use Validator;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaController extends Controller
{
    public function form(){
        return view('daftar-mahasiswa',[
            'title'=>'Daftar Mahasiswa'
        ]);
    }
    public function dashboard(){
        return view('mahasiswa.index',[
            'title'=>'Dashboard',
            'ayah'=>ProfilAyah::where('user_id',Auth::user()->id)->first(),
            'ibu'=>ProfilIbu::where('user_id',Auth::user()->id)->first(),
            'wali'=>ProfilWali::where('user_id',Auth::user()->id)->first(),
            'jalur'=>Mahasiswa::where('user_id',Auth::user()->id)->pluck('jalur_daftar')->first()
        ]);
    }
    public function apiMahasiswa(Request $request){
        if ($request->ajax()) {
            // Mengambil data mahasiswa beserta relasi dengan user
            $data = Mahasiswa::with('user')->latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('nama', function($row) {
                    return $row->user->nama; // Mengambil nama dari tabel user melalui relasi
                })
                ->addColumn('action', function($row) {
                    $edit = url('admin/data-calon-mahasiswa/'.$row->id);
                    $hapus = url('admin/data-calon-mahasiswa/');
                    $btn = '<a href="'.$edit.'" class="edit btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>';
                    $btn .= '<a href="javascript:void(0)" class="delete btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role === 'mahasiswa') {
            return view('mahasiswa.data-calon-mahasiswa',[
                'title'=>'Data Calon Mahasiswa',
                'data'=>Mahasiswa::with('user')->where('user_id',Auth::user()->id)->first()
            ]);
        } else {
            return view('admin.data-calon-mahasiswa',[
                'title'=>'Data Calon Mahasiswa'
            ]);
        }
        
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa,$id)
    {
        return view('admin.data-mahasiswa',[
            'title'=>'Edit Mahasiswa'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa,$id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $val = Validator::make($request->all(),[
            'nama_lengkap'=>'required',
            'nik'=>'required|numeric',
            'file_nik'=>'required|image|mimes:jpg,jpeg,png|max:20480',
            'no_telp'=>'required|numeric',
            'jenis_kelamin'=>'required',
            'kewarganegaraan'=>'required',
            'agama'=>'required',
            'status_pernikahan'=>'required',
            'tinggi'=>'required|numeric',
            'berat'=>'required|numeric',
            'darah'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'berkacamata'=>'required',
            'keterangan_sehat'=>'required|image|mimes:jpg,jpeg,png|max:20480',
            'patah_tulang'=>'required',
            'alamat'=>'required',
            'no_rumah'=>'required|numeric',
            'rt'=>'required|numeric',
            'rw'=>'required|numeric',
            'pos'=>'required|numeric',
            'provinsi'=>'required',
            'kota'=>'required',
            'kecamatan'=>'required',
            'desa'=>'required',
            'photo'=>'required|image|mimes:jpg,jpeg,png|max:20480',
            'ktp'=>'required|image|mimes:jpg,jpeg,png|max:20480'
        ]);
        if ($val->fails()) {
            return redirect('mahasiswa/data-calon-mahasiswa')->withErrors($val);
        } else {
                $file = $request->file('file_nik');
                $namaNik = Str::random(20).'.'.$file->getClientOriginalExtension();
                $file->move(public_path('kartu_keluarga'),$namaNik);

                $file2 = $request->file('keterangan_sehat');
                $namaSehat= Str::random(20).'.'.$file2->getClientOriginalExtension();
                $file2->move(public_path('surat_sehat'),$namaSehat);

                $photo = $request->file('photo');
                $namaPhoto=Str::random(20).'.'.$photo->getClientOriginalExtension();
                $photo->move(public_path('photo_mahasiswa'),$namaPhoto);

                $ktp=$request->file('ktp');
                $namaKtp=Str::random(20).'.'.$ktp->getClientOriginalExtension();
                $ktp->move(public_path('ktp'),$namaKtp);
            
            User::find(Auth::user()->id)->update([
                'nama'=>$request->nama_lengkap
            ]);
            Mahasiswa::find($id)->update([
            'nik'=>$request->nik,
            'kartu_keluarga'=>$namaNik,
            'no_telp'=>$request->no_telp,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'kewarganegaraan'=>$request->kewarganegaraan,
            'agama'=>$request->agama,
            'status_pernikahan'=>$request->status_pernikahan,
            'tinggi_badan'=>$request->tinggi,
            'berat_badan'=>$request->berat,
            'gol_darah'=>$request->darah,
            'tempat_lahir'=>$request->tempat_lahir,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'kacamata'=>$request->berkacamata,
            'keterangan_sehat'=>$namaSehat,
            'patah_tulang'=>$request->patah_tulang,
            'alamat'=>$request->alamat,
            'no_rumah'=>$request->no_rumah,
            'rt'=>$request->rt,
            'rw'=>$request->rw,
            'kode_pos'=>$request->pos,
            'provinsi'=>$request->provinsi,
            'kota'=>$request->kota,
            'kecamatan'=>$request->kecamatan,
            'desa'=>$request->desa,
            'photo'=>$namaPhoto,
            'ktp'=>$namaKtp
            ]);
            return redirect('mahasiswa/data-calon-mahasiswa')->with('sukses','Data berhasil disubmit!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
