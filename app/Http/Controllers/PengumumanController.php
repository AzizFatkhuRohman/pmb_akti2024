<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PengumumanController extends Controller
{
    public function getValue(Request $request){
        if ($request->ajax()) {
            $data = Pengumuman::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('photo',function($row){
                    $url = asset('photo_pengumuman/'.$row->photo);
                    return '<img src="'.$url.'" border="0" width="50" class="img-rounded" align="center" />';
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= '<a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function mahasiswaPengumuman(){
        return view('mahasiswa.pengumuman',[
            'title'=>'Pengumuman'
        ]);
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
    public function show(Pengumuman $pengumuman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengumuman $pengumuman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengumuman $pengumuman)
    {
        //
    }
}
