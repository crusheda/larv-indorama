<?php

namespace App\Http\Controllers\User\rekap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Models\pb;
use App\Models\ban;
use App\Models\vehicle;
use App\Models\driver;
use Carbon\Carbon;
use Redirect;
use Storage;
use Response;
use Auth;

class pbController extends Controller
{
    public function index()
    {
        $show = pb::orderBy('updated_at','desc')->get();
        $ban = ban::orderBy('updated_at','desc')->get();
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
            'ban' => $ban,
            'vehicle' => $vehicle,
        ];

        return view('pages.daily.pb')->with('list', $data);
    }

    public function table()
    {
        // $data = vehicle::orderBy('updated_at','desc')->get();
        $data = DB::table('pb')
                ->join('driver', 'driver.id', '=', 'pb.id_driver')
                ->join('vehicle', 'vehicle.id', '=', 'pb.id_nopol')
                ->join('ban', 'ban.id', '=', 'pb.id_ban')
                ->select('pb.*','driver.nama as driver','vehicle.nopol', 'ban.kode as ban','ban.ket as ket_ban')
                ->where('pb.deleted_at', null)
                ->orderBy('pb.updated_at','desc')
                ->get();

        return response()->json($data, 200);
    }

    public function tambah(Request $request)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');
        $getDriver = vehicle::where('id', $request->vehicle)->first();
        
        $bulan = Carbon::parse($request->bulan)->isoFormat('MM');
        $tahun = Carbon::parse($request->bulan)->isoFormat('YYYY');
        
        $kode = "IRM".(sprintf("%02s", $request->kode));
        
        $harga = str_replace(".","",(str_replace("Rp. ", "", $request->harga)));
        if ($request->bayar) {
            $bayar = str_replace(".","",(str_replace("Rp. ", "", $request->bayar)));
        } else {
            $bayar = null;
        }

        $data = new pb;
        $data->bulan        = $bulan;
        $data->tahun        = $tahun;
        $data->kode_unit    = $kode;
        $data->id_nopol     = $request->vehicle;
        $data->id_driver    = $getDriver->id_driver;
        $data->id_ban       = $request->ban;
        $data->ket          = $request->ket;
        $data->harga        = $harga;
        $data->bayar        = $bayar;
        $data->save();

        return response()->json($tgl, 200);
    }

    public function getubah($id)
    {
        $show = pb::where('id', $id)->first();
        $ban = ban::orderBy('kode','asc')->get();
        $vehicle = DB::table('vehicle')
                ->join('driver', 'driver.id', '=', 'vehicle.id_driver')
                ->select('vehicle.*','driver.nama')
                ->where('vehicle.deleted_at', null)
                ->orderBy('vehicle.updated_at','desc')
                ->get();

        $data = [
            'id' => $id,
            'bulan' => $show->tahun."-".$show->bulan,
            'show' => $show,
            'ban' => $ban,
            'vehicle' => $vehicle,
        ];

        return response()->json($data, 200);
    }

    public function getban($id)
    {
        $show = ban::where('id', $id)->first();

        $data = [
            'id' => $id,
            'kode' => $show->kode,
            'harga' => $show->harga,
        ];

        return response()->json($data, 200);
    }

    public function ubah(Request $request)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');
        $getDriver = vehicle::where('id', $request->vehicle)->first();
        
        $bulan = Carbon::parse($request->bulan)->isoFormat('MM');
        $tahun = Carbon::parse($request->bulan)->isoFormat('YYYY');
        
        $kode = "IRM".(sprintf("%02s", $request->kode));
        
        $harga = str_replace(".","",(str_replace("Rp. ", "", $request->harga)));
        if ($request->bayar) {
            $bayar = str_replace(".","",(str_replace("Rp. ", "", $request->bayar)));
        } else {
            $bayar = null;
        }

        $data = pb::find($request->id);
        $data->bulan        = $bulan;
        $data->tahun        = $tahun;
        $data->kode_unit    = $kode;
        $data->id_nopol     = $request->vehicle;
        $data->id_driver    = $getDriver->id_driver;
        $data->id_ban       = $request->ban;
        $data->ket          = $request->ket;
        $data->harga        = $harga;
        $data->bayar        = $bayar;
        $data->save();
        
        return response()->json($tgl, 200);
    }

    public function hapus($id)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');

        pb::where('id', $id)->delete();

        return response()->json($tgl, 200);
    }
}
