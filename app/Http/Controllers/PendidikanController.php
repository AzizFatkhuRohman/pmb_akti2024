<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use Validator;

class PendidikanController extends Controller
{
    protected $pendidikan;
    public function __construct(Pendidikan $pendidikan){
        $this->pendidikan=$pendidikan;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mahasiswa.data-pendidikan',[
            'title'=>'Data Pendidikan',
            'data'=>Pendidikan::where('user_id',Auth::user()->id)->first()
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $val = Validator::make($request->all(),[
        'nama_sd' => 'required|string|max:255',
        'masuk_sd' => 'required|integer|digits:4',
        'kota_sd' => 'required|string|max:255',
        'lulus_sd' => 'required|integer|digits:4',
        
        'nama_smp' => 'required|string|max:255',
        'masuk_smp' => 'required|integer|digits:4',
        'kota_smp' => 'required|string|max:255',
        'lulus_smp' => 'required|integer|digits:4',

        'nama_smk' => 'required|string|max:255',
        'masuk_smk' => 'required|integer|digits:4',
        'kota_smk' => 'required|string|max:255',
        'lulus_smk' => 'required|integer|digits:4',
        
        'jurusan' => 'required|string',

        'tingkat_prestasi_akademik' => 'nullable|string|max:255',
        'penyelenggara_prestasi_akademik' => 'nullable|string|max:255',
        'nama_prestasi_akademik' => 'nullable|string|max:255',
        'bukti_prestasi_akademik' => 'nullable|mimes:jpg,jpeg,png,pdf|max:20480', // Max file size 10MB
        
        'tingkat_prestasi_non_akademik' => 'nullable|string|max:255',
        'penyelenggara_prestasi_non_akademik' => 'nullable|string|max:255',
        'nama_prestasi_non_akademik' => 'nullable|string|max:255',
        'bukti_prestasi_non_akademik' => 'nullable|mimes:jpg,jpeg,png,pdf|max:20480', // Max file size 10MB
        
        'biaya_sekolah' => 'required|string|max:255',
        
        'matematika_smt_satu' => 'required|numeric|min:0|max:100',
        'indonesia_smt_satu' => 'required|numeric|min:0|max:100',
        'inggris_smt_satu' => 'required|numeric|min:0|max:100',
        'raport_satu' => 'required|mimes:pdf,jpg,jpeg,png,pdf|max:20480',
        
        'matematika_smt_dua' => 'required|numeric|min:0|max:100',
        'indonesia_smt_dua' => 'required|numeric|min:0|max:100',
        'inggris_smt_dua' => 'required|numeric|min:0|max:100',
        'raport_dua' => 'required|mimes:pdf,jpg,jpeg,png,pdf|max:20480',
        
        'matematika_smt_tiga' => 'required|numeric|min:0|max:100',
        'indonesia_smt_tiga' => 'required|numeric|min:0|max:100',
        'inggris_smt_tiga' => 'required|numeric|min:0|max:100',
        'raport_tiga' => 'required|mimes:pdf,jpg,jpeg,png,pdf|max:20480',
        
        'matematika_smt_empat' => 'required|numeric|min:0|max:100',
        'indonesia_smt_empat' => 'required|numeric|min:0|max:100',
        'inggris_smt_empat' => 'required|numeric|min:0|max:100',
        'raport_empat' => 'required|mimes:pdf,jpg,jpeg,png,pdf|max:20480',
        
        'matematika_smt_lima' => 'nullable|numeric|min:0|max:100',
        'indonesia_smt_lima' => 'nullable|numeric|min:0|max:100',
        'inggris_smt_lima' => 'nullable|numeric|min:0|max:100',
        'raport_lima' => 'nullable|mimes:pdf,jpg,jpeg,png,pdf|max:20480',
        ]);
        if ($val->fails()) {
            return redirect('mahasiswa/data-pendidikan')->withErrors($val)->withInput();
        } else {
            if ($request->hasFile('bukti_prestasi_akademik')) {
                $file=$request->file('bukti_prestasi_akademik');
                $namaPAk= Str::random(20).'.'.$file->getClientOriginalExtension();
                $file->move(public_path('prestasi_akademik'),$namaPAk);
            } else {
                $namaPAk=null;
            }
            if ($request->hasFile('bukti_prestasi_non_akademik')) {
                $file=$request->file('bukti_prestasi_non_akademik');
                $namaNonPAk= Str::random(20).'.'.$file->getClientOriginalExtension();
                $file->move(public_path('prestasi_non_akademik'),$namaNonPAk);
            } else {
                $namaNonPAk=null;
            }
            $raport_satu = Str::random(20).'.'.$request->file('raport_satu')->getClientOriginalExtension();
            $request->file('raport_satu')->move(public_path('raport_satu'),$raport_satu);

            $raport_dua = Str::random(20).'.'.$request->file('raport_dua')->getClientOriginalExtension();
            $request->file('raport_dua')->move(public_path('raport_dua'),$raport_dua);

            $raport_tiga = Str::random(20).'.'.$request->file('raport_tiga')->getClientOriginalExtension();
            $request->file('raport_tiga')->move(public_path('raport_tiga'),$raport_tiga);

            $raport_empat = Str::random(20).'.'.$request->file('raport_empat')->getClientOriginalExtension();
            $request->file('raport_empat')->move(public_path('raport_empat'),$raport_empat);

            if ($request->hasFile('raport_lima')) {
                $raport_lima = Str::random('20').'.'.$request->file('raport_lima')->getClientOriginalExtension();
                $request->file('raport_lima')->move(public_path('raport_lima'),$raport_lima);
            } else {
                $raport_lima=null;
            }
            
            $this->pendidikan->Edit($id,[
                'nama_sd' => $request->nama_sd,
            'kota_sd' => $request->kota_sd,
            'tahun_sd' => $request->masuk_sd,
            'lulus_sd' => $request->lulus_sd,
            'nama_smp' => $request->nama_smp,
            'kota_smp' => $request->kota_smp,
            'tahun_smp' => $request->masuk_smp,
            'lulus_smp' => $request->lulus_smp,
            'nama_smk' => $request->nama_smk,
            'kota_smk' => $request->kota_smk,
            'tahun_smk' => $request->masuk_smk,
            'lulus_smk' => $request->lulus_smk,
            'jurusan' => $request->jurusan,
            'tingkat_prestasi_akademik' => $request->tingkat_prestasi_akademik,
            'penyelenggara_prestasi_akademik' => $request->penyelenggara_prestasi_akademik,
            'nama_prestasi_akademik' => $request->nama_prestasi_akademik,
            'sertifikat_prestasi_akademik' => $namaPAk,
            'tingkat_prestasi_non_akademik' => $request->tingkat_prestasi_non_akademik,
            'penyelenggara_prestasi_non_akademik' => $request->penyelenggara_prestasi_non_akademik,
            'nama_prestasi_non_akademik' => $request->nama_prestasi_non_akademik,
            'sertifikat_prestasi_non_akademik' => $namaNonPAk,
            'sekolah_dibiayai_oleh' => $request->biaya_sekolah,
            'smt_1_matematika' => $request->matematika_smt_satu,
            'smt_1_indonesia' => $request->indonesia_smt_satu,
            'smt_1_inggris' => $request->inggris_smt_satu,
            'smt_1_raport' => $raport_satu,
            'smt_2_matematika' => $request->matematika_smt_dua,
            'smt_2_indonesia' => $request->indonesia_smt_dua,
            'smt_2_inggris' => $request->inggris_smt_dua,
            'smt_2_raport' =>$raport_dua,
            'smt_3_matematika' => $request->matematika_smt_tiga,
            'smt_3_indonesia' => $request->indonesia_smt_tiga,
            'smt_3_inggris' => $request->inggris_smt_tiga,
            'smt_3_raport' => $raport_tiga,
            'smt_4_matematika' => $request->matematika_smt_empat,
            'smt_4_indonesia' => $request->indonesia_smt_empat,
            'smt_4_inggris' => $request->inggris_smt_empat,
            'smt_4_raport' => $raport_empat,
            'smt_5_matematika' => $request->matematika_smt_lima,
            'smt_5_indonesia' => $request->indonesia_smt_lima,
            'smt_5_inggris' => $request->inggris_smt_lima,
            'smt_5_raport' => $raport_lima,
            ]);
            return redirect('mahasiswa/data-pendidikan')->with('sukses','Data berhasil disubmit!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendidikan $pendidikan)
    {
        //
    }
}
