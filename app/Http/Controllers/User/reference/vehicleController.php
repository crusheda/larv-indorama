<?php

namespace App\Http\Controllers\User\reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Models\vehicle;
use App\Models\driver;
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
        $driver = driver::orderBy('nama','asc')->get();
        
        $data = [
            'show' => $show,
            'driver' => $driver,
        ];

        return view('pages.reference.vehicle')->with('list', $data);
    }
    
    public function table()
    {
        // $data = vehicle::orderBy('updated_at','desc')->get();
        $data = DB::table('vehicle')
                ->join('driver', 'driver.id', '=', 'vehicle.id_driver')
                ->select('vehicle.*','driver.nama')
                ->where('vehicle.deleted_at', null)
                ->orderBy('vehicle.updated_at','desc')
                ->get();

        return response()->json($data, 200);
    }

    public function tambah(Request $request)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');

        $data = new vehicle;
        $data->id_driver = $request->driver;
        $data->nopol = $request->nopol;
        $data->armada = $request->armada;
        $data->save();

        return response()->json($tgl, 200);
    }

    public function getUbah($id)
    {
        $show = vehicle::where('id', $id)->first();
        $driver = driver::orderBy('nama','asc')->get();

        $data = [
            'id' => $id,
            'id_driver' => $show->id_driver,
            'nopol' => $show->nopol,
            'armada' => $show->armada,
            'driver' => $driver,
        ];

        return response()->json($data, 200);
    }

    public function ubah(Request $request)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');

        $data = vehicle::find($request->id);
        $data->id_driver = $request->driver;
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
