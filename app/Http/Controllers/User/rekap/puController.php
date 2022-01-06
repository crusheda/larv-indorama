<?php

namespace App\Http\Controllers\User\rekap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Models\pu;
use App\Models\vehicle;
use App\Models\destination;
use App\Models\driver;
use Carbon\Carbon;
use Redirect;
use Storage;
use Response;
use Auth;

class puController extends Controller
{
    public function index()
    {
        $show = pu::orderBy('updated_at','desc')->get();
        $destination = destination::orderBy('lokasi','asc')->get();
        $vehicle = DB::table('vehicle')
                ->join('driver', 'driver.id', '=', 'vehicle.id_driver')
                ->select('vehicle.*','driver.nama')
                ->where('vehicle.deleted_at', null)
                ->orderBy('vehicle.updated_at','desc')
                ->get();
        $now = Carbon::now();
        
        $data = [
            'now' => $now,
            'show' => $show,
            'destination' => $destination,
            'vehicle' => $vehicle,
        ];

        return view('pages.daily.pu')->with('list', $data);
    }

    public function table()
    {
        // $data = vehicle::orderBy('updated_at','desc')->get();
        $data = DB::table('bpu')
                ->join('driver', 'driver.id', '=', 'bpu.id_driver')
                ->join('vehicle', 'vehicle.id', '=', 'bpu.id_nopol')
                ->select('bpu.*','driver.nama','vehicle.nopol')
                ->where('bpu.deleted_at', null)
                ->orderBy('bpu.updated_at','desc')
                ->get();

        return response()->json($data, 200);
    }

    public function tambah(Request $request)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');
        $getDriver = vehicle::where('id', $request->vehicle)->first();
        $jml = str_replace(".","",(str_replace("Rp. ", "", $request->jml)));

        $data = new bpu;
        $data->tgl = $request->tgl;
        $data->id_nopol = $request->vehicle;
        $data->id_driver = $getDriver->id_driver;
        $data->ket = $request->ket;
        $data->jml = $jml;
        $data->save();

        return response()->json($tgl, 200);
    }

    public function getUbah($id)
    {
        $show = bpu::where('id', $id)->first();
        $vehicle = DB::table('vehicle')
                ->join('driver', 'driver.id', '=', 'vehicle.id_driver')
                ->select('vehicle.*','driver.nama')
                ->where('vehicle.deleted_at', null)
                ->orderBy('vehicle.updated_at','desc')
                ->get();

        $data = [
            'id' => $id,
            'id_vehicle' => $show->id_nopol,
            'tgl' => $show->tgl,
            'ket' => $show->ket,
            'jml' => $show->jml,
            'vehicle' => $vehicle,
        ];

        return response()->json($data, 200);
    }

    public function ubah(Request $request)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');
        $getDriver = vehicle::where('id', $request->vehicle)->first();
        $jml = str_replace(".","",(str_replace("Rp. ", "", $request->jml)));

        $data = bpu::find($request->id);
        $data->tgl = $request->tgl;
        $data->id_nopol = $request->vehicle;
        $data->id_driver = $getDriver->id_driver;
        $data->ket = $request->ket;
        $data->jml = $jml;
        $data->save();
        
        return response()->json($tgl, 200);
    }

    public function hapus($id)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');

        bpu::where('id', $id)->delete();

        return response()->json($tgl, 200);
    }
}
