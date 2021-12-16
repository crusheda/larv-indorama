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

class vehicleController extends Controller
{
    public function index()
    {
        $show = vehicle::orderBy('updated_at','desc')->get();
        
        $data = [
            'show' => $show,
        ];

        return view('pages.reference.vehicle')->with('list', $data);
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
