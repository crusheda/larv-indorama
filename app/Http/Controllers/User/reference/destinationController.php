<?php

namespace App\Http\Controllers\User\reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Models\destination;
use Carbon\Carbon;
use Redirect;
use Storage;
use Response;
use Auth;

class destinationController extends Controller
{
    public function index()
    {
        $show = destination::orderBy('updated_at','desc')->get();
        
        $data = [
            'show' => $show,
        ];

        return view('pages.reference.destination')->with('list', $data);
    }

    public function table()
    {
        $data = destination::orderBy('updated_at','desc')->get();

        return response()->json($data, 200);
    }

    public function tambah(Request $request)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');

        $data = new destination;
        $data->lokasi = $request->lokasi;
        $data->kode = $request->kode;
        $data->save();

        return response()->json($tgl, 200);
    }

    public function getUbah($id)
    {
        $show = destination::where('id', $id)->first();

        $data = [
            'id' => $id,
            'nama' => $show->nama,
        ];

        return response()->json($data, 200);
    }

    public function ubah(Request $request)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');

        $data = destination::find($request->id);
        $data->lokasi = $request->lokasi;
        $data->kode = $request->kode;
        $data->save();
        
        return response()->json($tgl, 200);
    }

    public function hapus($id)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');

        destination::where('id', $id)->delete();

        return response()->json($tgl, 200);
    }
}
