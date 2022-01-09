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
        $data = DB::table('pu')
                ->join('vehicle', 'vehicle.id', '=', 'pu.id_vehicle')
                ->join('driver', 'driver.id', '=', 'vehicle.id_driver')
                ->join('destination as pupks', 'pupks.id', '=', 'pu.pks')
                ->join('destination as putujuan', 'putujuan.id', '=', 'pu.tujuan')
                ->select('pu.*','driver.nama','vehicle.nopol','pupks.lokasi as lokasi_pks','putujuan.lokasi as lokasi_tujuan')
                ->where('pu.deleted_at', null)
                ->orderBy('pu.updated_at','desc')
                ->get();

        return response()->json($data, 200);
    }

    public function tambah(Request $request)
    {
        $tgl        = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');

        $ongkos     = str_replace(".","",(str_replace("Rp. ", "", $request->ongkos)));
        $t_muat     = str_replace(".","",(str_replace("Rp. ", "", $request->t_muat)));
        $t_bongkar  = str_replace(".","",(str_replace("Rp. ", "", $request->t_bongkar)));
        $bbm_harga  = str_replace(".","",(str_replace("Rp. ", "", $request->bbm_harga)));
        $uang_makan = str_replace(".","",(str_replace("Rp. ", "", $request->uang_makan)));
        $bpu_jumlah = str_replace(".","",(str_replace("Rp. ", "", $request->bpu_jumlah)));
        $kotor      = str_replace(".","",(str_replace("Rp. ", "", $request->kotor)));
        $bersih     = str_replace(".","",(str_replace("Rp. ", "", $request->bersih)));

        $data = new pu;
        $data->id_vehicle   = $request->vehicle;
        $data->tgl          = $request->tgl;
        $data->pks          = $request->pks;
        $data->tujuan       = $request->tujuan;
        $data->ongkos       = $ongkos;
        $data->lainnya      = $request->lainnya;
        $data->t_muat       = $t_muat;
        $data->t_bongkar    = $t_bongkar;
        $data->susut        = $t_bongkar - $t_muat;
        $data->bbm_perliter = $bbm_harga;
        $data->bbm_liter    = $request->bbm_jumlah;
        $data->bbm_rp       = $request->bbm_jumlah * $bbm_harga;
        $data->uang_makan   = $uang_makan;
        $data->bpu_ket      = $request->bpu_ket;
        $data->bpu_rp       = $bpu_jumlah;
        $data->kotor        = $kotor;
        $data->bersih       = $bersih;
        // print_r($kotor);
        // die();
        $data->save();

        return response()->json($tgl, 200);
    }

    public function getUbah($id)
    {
        $show = pu::where('id', $id)->first();
        $destination = destination::orderBy('lokasi','asc')->get();
        $vehicle = DB::table('vehicle')
                ->join('driver', 'driver.id', '=', 'vehicle.id_driver')
                ->select('vehicle.*','driver.nama')
                ->where('vehicle.deleted_at', null)
                ->orderBy('vehicle.updated_at','desc')
                ->get();

        $data = [
            'id' => $id,
            'vehicle' => $show->id_vehicle,
            'tgl' => $show->tgl,
            'pks' => $show->pks,
            'tujuan' => $show->tujuan,
            'ongkos' => $show->ongkos,
            'lainnya' => $show->lainnya,
            't_muat' => $show->t_muat,
            't_bongkar' => $show->t_bongkar,
            'bbm_harga' => $show->bbm_perliter,
            'bbm_jumlah' => $show->bbm_liter,
            'uang_makan' => $show->uang_makan,
            'bpu_ket' => $show->bpu_ket,
            'bpu_jumlah' => $show->bpu_rp,
            'kotor' => $show->kotor,
            'bersih' => $show->bersih,
            'vehicle' => $vehicle,
            'destination' => $destination,
        ];

        return response()->json($data, 200);
    }

    public function ubah(Request $request)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');

        $ongkos     = str_replace(".","",(str_replace("Rp. ", "", $request->ongkos)));
        $t_muat     = str_replace(".","",(str_replace("Rp. ", "", $request->t_muat)));
        $t_bongkar  = str_replace(".","",(str_replace("Rp. ", "", $request->t_bongkar)));
        $bbm_harga  = str_replace(".","",(str_replace("Rp. ", "", $request->bbm_harga)));
        $uang_makan = str_replace(".","",(str_replace("Rp. ", "", $request->uang_makan)));
        $bpu_jumlah = str_replace(".","",(str_replace("Rp. ", "", $request->bpu_jumlah)));
        $kotor      = str_replace(".","",(str_replace("Rp. ", "", $request->kotor)));
        $bersih     = str_replace(".","",(str_replace("Rp. ", "", $request->bersih)));

        $data = pu::find($request->id);
        $data->id_vehicle   = $request->vehicle;
        $data->tgl          = $request->tgl;
        $data->pks          = $request->pks;
        $data->tujuan       = $request->tujuan;
        $data->ongkos       = $ongkos;
        $data->lainnya      = $request->lainnya;
        $data->t_muat       = $t_muat;
        $data->t_bongkar    = $t_bongkar;
        $data->susut        = $t_bongkar - $t_muat;
        $data->bbm_perliter = $bbm_harga;
        $data->bbm_liter    = $request->bbm_jumlah;
        $data->bbm_rp       = $request->bbm_jumlah * $bbm_harga;
        $data->uang_makan   = $uang_makan;
        $data->bpu_ket      = $request->bpu_ket;
        $data->bpu_rp       = $bpu_jumlah;
        $data->kotor        = $kotor;
        $data->bersih       = $bersih;
        // print_r($data);
        // die();
        $data->save();
        
        return response()->json($tgl, 200);
    }

    public function hapus($id)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');

        pu::where('id', $id)->delete();

        return response()->json($tgl, 200);
    }
}
