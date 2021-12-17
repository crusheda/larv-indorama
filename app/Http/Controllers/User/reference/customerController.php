<?php

namespace App\Http\Controllers\User\reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Models\customer;
use Carbon\Carbon;
use Redirect;
use Storage;
use Response;
use Auth;

class customerController extends Controller
{
    public function index()
    {
        $show = customer::orderBy('updated_at','desc')->get();
        
        $data = [
            'show' => $show,
        ];

        return view('pages.reference.customer')->with('list', $data);
    }

    public function table()
    {
        $data = customer::orderBy('updated_at','desc')->get();

        return response()->json($data, 200);
    }

    public function tambah(Request $request)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');

        $data = new customer;
        $data->nama = $request->customer;
        $data->save();

        return response()->json($tgl, 200);
    }

    public function getUbah($id)
    {
        $show = customer::where('id', $id)->first();

        $data = [
            'id' => $id,
            'nama' => $show->nama,
        ];

        return response()->json($data, 200);
    }

    public function ubah(Request $request)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');

        $data = customer::find($request->id);
        $data->nama = $request->customer;
        $data->save();
        
        return response()->json($tgl, 200);
    }

    public function hapus($id)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');

        customer::where('id', $id)->delete();

        return response()->json($tgl, 200);
    }
}
