<?php

namespace App\Http\Controllers\User\rekap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Models\ban;
use Carbon\Carbon;
use Redirect;
use Storage;
use Response;
use Auth;

class refpbController extends Controller
{
    public function index()
    {
        $show = ban::orderBy('updated_at','desc')->get();
        $now = Carbon::now();
        
        $data = [
            'now' => $now,
            'show' => $show,
        ];

        return view('pages.reference.ban')->with('list', $data);
    }

    public function table()
    {
        $data = ban::orderBy('updated_at','desc')->get();

        return response()->json($data, 200);
    }

    public function tambah(Request $request)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');
        $harga = str_replace(".","",(str_replace("Rp. ", "", $request->harga)));

        $data = new ban;
        $data->kode = $request->kode;
        $data->ket = $request->ket;
        $data->harga = $harga;
        $data->save();

        return response()->json($tgl, 200);
    }

    public function getUbah($id)
    {
        $show = ban::where('id', $id)->first();

        $data = [
            'id' => $id,
            'kode' => $show->kode,
            'ket' => $show->ket,
            'harga' => $show->harga,
        ];

        return response()->json($data, 200);
    }

    public function ubah(Request $request)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');
        $harga = str_replace(".","",(str_replace("Rp. ", "", $request->harga)));

        $data = ban::find($request->id);
        $data->kode = $request->kode;
        $data->ket = $request->ket;
        $data->harga = $harga;
        $data->save();
        
        return response()->json($tgl, 200);
    }

    public function hapus($id)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');

        ban::where('id', $id)->delete();

        return response()->json($tgl, 200);
    }
}
