<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Shop;


class DataController extends Controller
{

 public function __construct()
 {
     $this->Shop = new Shop;
 }

 public function index()
 {
     $shop = $this->Shop->getData()->get();
     return view('home', ['shop' => $shop]);
 }

    public function TambahData(Request $request)
    
    {
        DB::table('coba')->insert([
            'gambar' => $request->gambar,
            'judul' => $request->judul,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            
        ]);
       
        return redirect('home');
    }
    public function view_index()
    {
        $shop = $this->Shop->getData()->get();
        return view('tampiluser', ['shop' => $shop]);
    }
  // method untuk hapus data pegawai
public function hapus($id)
{
	// menghapus data pegawai berdasarkan id yang dipilih
	DB::table('coba')->where('id',$id)->delete();
		
	// alihkan halaman ke halaman pegawai
	return redirect('/home');
}
}
