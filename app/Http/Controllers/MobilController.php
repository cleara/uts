<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobil;
class MobilController extends Controller
{
    public function mobil() {
        $data = "Data All Mobil";
        return response()->json($data, 200);
    }

    public function mobilAuth() {
        $data = "Welcome " . Auth::name()->username;
        return response()->json($data, 200);
    }
    public function index(){
        $data=Mobil::all();
        return response($data);
    }
    public function show(){
        $mobil=Mobil::where('id',$id)->get();
        return response($data);
    }
    public function store(Request $request){
    try{
        $data=new mobil();
        $data->nama_mobil=$request->input('nama_mobil');
        $data->merk=$request->input('merk');
        $data->bahan_bakar=$request->input('bahan_bakar');
        $data->plat_nomer=$request->input('plat_nomer');
        $data->warna=$request->input('warna');
        $data->jumlah=$request->input('jumlah');
        $data->save();
        
        return response()->json([
            'status'    =>'1',
            'message'   =>'Tambah mobil berhasil'
    ]);
        }catch(\Exception $e) {
            return response()->json([
            'status'    =>'0',
            'message'   =>'Tambah mobil gagal'
    ]);
    
        }
    }
    public function update(Request $request, $id){
    try {
        $data=Mobil::where('id',$id)->first();
        $data->nama_mobil=$request->input('nama_mobil');
        $data->merk=$request->input('merk');
        $data->bahan_bakar=$request->input('bahan_bakar');
        $data->plat_nomer=$request->input('plat_nomer');
        $data->warna=$request->input('warna');
        $data->jumlah=$request->input('jumlah');
        $data->save();
        return response()->json([
                'status'    =>'1',
                'message'   =>'update mobil berhasil'
        ]);
        }catch(\Exception $e) {
                return response()->json([
                'status'    =>'0',
                'message'   =>'update mobil gagal'
        ]);

            }
        }
    
     public function destroy($id){
        try {
            $data = mobil::where('id',$id)->first();
            $data->delete();
            
        return response()->json([
                'status'    =>'1',
                'message'   =>'hapus mobil berhasil'
        ]);
        }catch(\Exception $e) {
                return response()->json([
                'status'    =>'0',
                'message'   =>'hapus mobil gagal'
        ]);

            }
    
    }
}