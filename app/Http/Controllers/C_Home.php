<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\DataPenjualan;
use App\Models\Stok;

use App\Http\Requests\StokRequest;
use App\Http\Requests\DataPenjualanRequest;
use App\Http\Requests\EditKueRequest;

use App\Exports\DataPenjualanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;

class C_Home extends Controller
{
    public function dashboard()
    {
            // Menampilkan isi konten dashboard
        $cake = Stok::all();
        return view('home', compact('cake'));
    }

            // CRUD untuk form kue
    public function cake()
    {
            // View untuk form kue
        return view('cakes.create');
    }

    // Input data kue
    public function prosescake(StokRequest $request)
    {
        // Memvalidasi form yang mau diinput
    $data = $request->validated();

        // Membuat data baru dan memindahkan file gambar ke folder public
    $data = Stok::create($request->all());
    if ($request->hasFile('gambar_kue')) {
        $request->file('gambar_kue')->move('IMG/Cake', $request->file('gambar_kue')->getClientOriginalName());
        $data->gambar_kue = $request->file('gambar_kue')->getClientOriginalName();
        $data->save();
    }
    return redirect('/tablecake')->with('succes','Stok Kue Berhasil Di Tambahkan!');
    }

    public function tablekue()
    {
            // View data stok kue
        $cake = Stok::all();
        return view('cakes.index', compact('cake'));
    }

        // Edit data kue
    public function edit($id)
    {
            // Menampilkan dan mencari data sesuai id
        $cake = Stok::findOrFail($id);
        return view('cakes.edit', compact('cake'));
    }

    public function prosesedit(EditKueRequest $request, $id)
    {
            // Memvalidasi form yang mau di update
        $data = $request->validated();

            // Memperbarui data yang dimasukkan
        $cake = Stok::find($id);

            $cake->nama_kue = $data['nama_kue'];
            $cake->stok_Kue = $data['stok_kue'];
            $cake->jenis_kue = $data['jenis_kue'];
            $cake->tanggal_expired = $data['tanggal_expired'];
            $cake->harga_kue = $data['harga_kue'];
            
                // Menghapus dan mengupdate ke gambar yang diperbarui
            if($request->hasFile('gambar_kue')){
                $destination ='IMG/Cake/'.$cake->gambar_kue;
                if(File::exists($destination)){
                    File::delete($destination);
                }
                
                $file = $request->file('gambar_kue');
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->move('IMG/Cake/', $filename);
                $cake->gambar_kue = $filename;
            }
            
            $cake->deskripsi_kue =  $data['deskripsi_kue'];

            $cake->update();

        return redirect('/tablecake')->with('succes','Stok Kue Berhasil Di Update!');

    }

        // Hapus data kue
    public function destroy($id)
    {
            // Menghapus gambar yang terdahulu
            $cake = Stok::where('id',$id)->first();
            File::delete('IMG/Cake/' . $cake->gambar_kue);

            // Hapus Data
            Stok::where('id',$id)->delete();

        return redirect('/tablecake')->with('succes','Stok Kue Berhasil Di Hapus!');
    }

            // End untuk CRUD form tambah kue

        // CRUD data penjualan
    public function penjualan()
    {
        return view('penjualans.create');
    }

        // Tambah Data Penjualan
    public function prosesPenjualan(DataPenjualanRequest $request)
    {
            // Memvalidasi Form
        $data = $request->validated();

        $Penjualans = new DataPenjualan;

        $Penjualans->nama_kue = $data['nama_kue'];
        $Penjualans->jumlah_kue = $data['jumlah_kue'];
        $Penjualans->tanggal = $data['tanggal'];
        $Penjualans->nominal_harga = $data['nominal_harga'];
        $Penjualans->save();

        return redirect()->route('table-penjualan')
                        ->with('succes','Data Penjualan Berhasil Di Tambahkan!');
    }

        // View Table Penjualan
    public function tablePenjualan()
    {
        $Penjualans = DataPenjualan::all();
        return view('penjualans.index', compact('Penjualans'));
    }

        // Edit Data Penjualan
    public function editPenjualan($id)
    {
        $Penjualans = DataPenjualan::findOrFail($id);
        return view('penjualans.edit', compact('Penjualans'));
    }

        // Proses Upate Data Penjualan
    public function updatePenjualan(DataPenjualanRequest $request, $id)
    {
        $data = $request->validated();

        $Penjualans = DataPenjualan::findOrFail($id);

        $Penjualans->nama_kue = $data['nama_kue'];
        $Penjualans->jumlah_kue = $data['jumlah_kue'];
        $Penjualans->tanggal = $data['tanggal'];
        $Penjualans->update();

        return redirect()->route('table-penjualan')
                        ->with('succes','Data Penjualan Berhasil Di Update!');
    }

        // Hapus Data Penjualan
    public function destroyDataPenjualan($id)
    {
        $Penjualans = DataPenjualan::findOrFail($id);
        $Penjualans->delete();

        return redirect()->route('table-penjualan')
                        ->with('succes','Data Penjualan Berhasil Di Hapus!');

    }

        // View Cetak Data Penjualan
    public function cetakDataPenjualan()
    {
        return view('penjualans.cetak');
    }

        // Proses Cetak Data Pertanggal
    public function cetakPertanggal(Request $req)
    {
            // Mencari tanggal awal dan akhir
        $method = $req->method();
            if ($req->isMethod('post'))
            {
                $start_date = $req->input('start_date');
                $end_date = $req->input('end_date');
                    if ($req->has('exportExcel'))
                    // Menkonversikan ke excel dan mendownload file nya
                return Excel::download(new DataPenjualanExport($start_date, $end_date), 'Data-Penjualan.xlsx');
            }
    }

    public function about()
    {
        return view('info.about');
    }
}
