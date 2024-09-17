<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Pendidikan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Str;
use Validator;

class AuthController extends Controller
{
    public function Login(){
        return view('login',[
            'title'=>'Login'
        ]);
    }
    public function postForm(Request $request){
        $val = Validator::make($request->all(),[
            'nik'=>'required|numeric|unique:mahasiswa',
            'nama_lengkap'=>'required|min:3|max:250',
            'jalur_daftar'=>'required',
            'bukti_file_prestasi'=>'nullable|mimes:jpg,jpeg,png,pdf|max:50000',
          'bukti_file_rekomendasi'=>'nullable|mimes:jpg,jpeg,png,pdf|max:50000',
            'jurusan'=>'required',
            'provinsi'=>'required',
            'no_telp'=>'required|numeric',
            'email'=>'required',
            'password'=>'required|confirmed|min:6'

        ]);
        if ($val->fails()) {
            return back()->withErrors($val);
        }
        $user = User::create([
            'nama'=>$request->nama_lengkap,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        if ($request->hasFile('bukti_file_prestasi')) {
            $file = $request->file('bukti_file_prestasi');
            $namaFile = Str::random(20).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('bukti_jalur_daftar'),$namaFile);
        } elseif ($request->hasFile('bukti_file_rekomendasi')) {
            $file = $request->file('bukti_file_rekomendasi');
            $namaFile = Str::random(20).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('bukti_jalur_daftar'),$namaFile);
        } else{
            $namaFile = null;
        }
        
        Mahasiswa::create([
            'user_id' => $user->id, // Relasi ke tabel users
            'nik' => $request->nik,
            'bukti_file'=>$namaFile,
            'jalur_daftar' => $request->jalur_daftar,
            'provinsi' => $request->provinsi,
            'no_telp' => $request->no_telp
        ]);
        Pendidikan::create([
            'user_id'=>$user->id,
            'jurusan' => $request->jurusan
        ]);
        return redirect('login')->with('sukses','Silahkan masuk!');

    }
    public function attemp(Request $request){
        $val = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if ($val->fails()) {
            return back()->withErrors($val);
        }
        if (Auth::attempt($request->only('email','password'))) {
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('admin/dashboard');
            } else {
                return redirect()->intended('mahasiswa/dashboard');
            }
            
        } else {
            return back()->with('gagal','Email, dan Password tidak valid!');
        }
        
    }
    public function logout(){
        Auth::logout();
        return redirect('login')->with('sukses','Anda berhasil keluar!');
    }
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
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
