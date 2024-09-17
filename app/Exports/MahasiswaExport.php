<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MahasiswaExport implements FromView
{
    protected $cetak;

    /**
     * MahasiswaExport constructor.
     *
     * @param string $cetak
     */
    public function __construct($cetak)
    {
        $this->cetak = $cetak;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.cetak',[
            'title'=>'Data Pendaftar PMB 2024',
            'Data'=>Mahasiswa::with('user')->where('jalur_daftar',$this->cetak)->latest()->get()
        ]);
    }
}
