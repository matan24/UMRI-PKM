<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Usulan;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = user::role('user')->get();
        return view('User/create', compact('users'));
    }

    public function list()
    {
        $usulan = Usulan::all();
        return view('User/list', compact('usulan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:usulan',
            'nim' => 'required|unique:usulan',
            'judul' => 'required|unique:usulan',
            'tipe' => 'required',
            'angkatan' => 'required', 
            'anggota1' => 'required',   
            'anggota2' => 'required',   
            'anggota3' => 'required',           
        ]);

        $usulan=Usulan::create([
            'user_id'=>Auth::user()->id,
            'nama'=>$request->nama,
            'nim'=>$request->nim,
            'judul'=>$request->judul,
            'tipe'=>$request->tipe,
            'anggota1'=>$request->anggota1,
            'anggota2'=>$request->anggota2,
            'anggota3'=>$request->anggota3,
            'status'=>0,
            'angkatan'=>$request->angkatan,
        ]);

        return redirect()->route('user.create')->with('status', 'Data PKM anda ditambahkan!');
    }

    public function list_pkm()
    {
        $usulan = Usulan::where('status', 1)->get();
        dd($usulan);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function show(Usulan $usulan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function edit(Usulan $usulan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usulan $usulan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usulan $usulan)
    {
        //
    }
}
