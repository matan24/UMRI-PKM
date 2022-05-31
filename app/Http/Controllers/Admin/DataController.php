<?php

namespace App\Http\Controllers\Admin;

use App\Models\Usulan;
use App\Models\Anggota;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\Data;
use Illuminate\Http\Request;

use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usulan = Usulan::all();
        return view('Admin/data.index', compact('usulan'));
    }

    public function import_excel()
    {
        Excel::import(new UsersImport, request()->file('users'));

        return redirect()->back()->with('status', 'Mahasiswa berhasil Di tambahkan!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        $contact = Contact::all();
        return view('admin.data.contact', compact('contact'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'email'=>'required|unique:users'
        // ])
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Usulan $data)
    {
        // $usulan = Usulan::all();
        $users = user::role('user')->get();   
        return view('Admin/data.edit', compact('data', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

        $usulan=Usulan::find($id)
        ->update([
            'nama' =>$request->nama,
            'nim' =>$request->nim,
            'judul' =>$request->judul,
            'tipe' =>$request->tipe,
            'anggota1' =>$request->anggota1,
            'anggota2' =>$request->anggota2,
            'anggota3' =>$request->anggota3,
            'status' =>0,
            'angkatan' =>$request->angkatan,

        ]); 
      
        return redirect()->back()->with('status', 'Data PKM berhasil Di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usulan $data)
    {
        $data->delete();
        return redirect()->route('admin.data.index')->with('status', 'Data PKM berhasil dihapus!');
    }
}
