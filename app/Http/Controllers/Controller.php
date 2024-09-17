<?php

namespace App\Http\Controllers;

use App\Exports\MahasiswaExport;
use App\Models\ProfilAyah;
use App\Models\ProfilIbu;
use App\Models\ProfilSaudara;
use App\Models\ProfilWali;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(){
        $title = 'Home';
        return view('index',[
            'title'=>$title,
        ]);
    }
    public function adminDashboard(){
        return view('admin.index',[
            'title'=>'Dashboard'
        ]);
    }
    public function dataKeluarga(){
        return view('mahasiswa.data-keluarga',[
            'title'=>'Data Keluarga',
            'ayah'=>ProfilAyah::where('user_id',Auth::user()->id)->first(),
            'ibu'=>ProfilIbu::where('user_id',Auth::user()->id)->first(),
            'wali'=>ProfilWali::where('user_id',Auth::user()->id)->first(),
            'saudara'=>ProfilSaudara::where('user_id',Auth::user()->id)->first()
        ]);
    }
    public function cetak(Request $request){
        $cetak = $request->input('cetak_kategori');
        return Excel::download(new MahasiswaExport($cetak),'data_mahasiswa.xlsx');
    }
}
model: