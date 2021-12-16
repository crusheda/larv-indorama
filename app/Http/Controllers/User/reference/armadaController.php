<?php

namespace App\Http\Controllers\User\reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Models\vehicle;
use Carbon\Carbon;
use Redirect;
use Storage;
use Response;
use Auth;

class armadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show = vehicle::orderBy('updated_at','desc')->get();
        
        $data = [
            'show' => $show,
        ];

        return view('pages.reference.vehicle')->with('list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function table()
    {
        $data = vehicle::orderBy('updated_at','desc')->get();

        return response()->json($data, 200);
    }

    public function tambah(Request $request)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');

        $data = new vehicle;
        $data->nopol = $request->nopol;
        $data->armada = $request->armada;
        $data->save();

        return response()->json($tgl, 200);
    }

    public function getUbah($id)
    {
        $show = vehicle::where('id', $id)->first();

        $data = [
            'id' => $id,
            'nopol' => $show->nopol,
            'armada' => $show->armada,
        ];

        return response()->json($data, 200);
    }

    public function ubah(Request $request)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');

        $data = vehicle::find($request->id);
        $data->nopol = $request->nopol;
        $data->armada = $request->armada;
        $data->save();
        
        return response()->json($tgl, 200);
    }

    public function hapus($id)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');

        vehicle::where('id', $id)->delete();

        return response()->json($tgl, 200);
    }
}
