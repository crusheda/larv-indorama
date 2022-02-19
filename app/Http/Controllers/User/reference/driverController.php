<?php

namespace App\Http\Controllers\User\reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Models\driver;
use Carbon\Carbon;
use Redirect;
use Storage;
use Response;
use Auth;

class driverController extends Controller
{
    public function index()
    {
        $show = driver::orderBy('updated_at','desc')->get();
        
        $data = [
            'show' => $show,
        ];

        return view('pages.reference.driver')->with('list', $data);
    }

    public function table()
    {
        $data = driver::orderBy('updated_at','desc')->get();

        return response()->json($data, 200);
    }

    public function tambah(Request $request)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');

        $data = new driver;
        $data->nama = $request->driver;
        $data->nik = $request->nik;
        $data->alamat = $request->alamat;
        $data->hp = $request->hp;
        $data->lahir = $request->lahir;
        $data->save();

        return response()->json($tgl, 200);
    }

    public function getUbah($id)
    {
        $show = driver::where('id', $id)->first();

        $data = [
            'id' => $id,
            'nama' => $show->nama,
            'nik' => $show->nik,
            'alamat' => $show->alamat,
            'hp' => $show->hp,
            'lahir' => $show->lahir,
        ];

        return response()->json($data, 200);
    }

    public function ubah(Request $request)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');

        $data = driver::find($request->id);
        $data->nama = $request->driver;
        $data->nik = $request->nik;
        $data->alamat = $request->alamat;
        $data->hp = $request->hp;
        $data->lahir = $request->lahir;
        $data->save();
        
        return response()->json($tgl, 200);
    }

    public function hapus($id)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');

        driver::where('id', $id)->delete();

        return response()->json($tgl, 200);
    }
    
    public function foto(Request $request)
    {
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm:ss a');

        $uploadedFile = $request->file('fileToUpload'); 

        $title = $uploadedFile->getClientOriginalName();
        $path = $uploadedFile->storeAs("public/files/sopir/foto/", $title);
        
        $data = driver::find($request->id);
        $data->title = $title;
        $data->filename = $path;
        $data->save();

        return response()->json($tgl, 200);
    }
    
    public function show($id)
    {
        $data = driver::find($id);
        return Storage::download($data->filename, $data->title);
    }

    public function hapusFoto($id)
    {
        $data = driver::find($request->id);
        // $productImage = str_replace('/storage', '', $data->filename);

        $hapus = Storage::delete('/public/files/sopir/foto/' . $data->title);
        print_r($hapus);
        die();
        $data = driver::where('id', $id)->update(['title'=>null,'filename'=>null]);

        return response()->json($data, 200);
    }
}
