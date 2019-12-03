<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\stokbarang;
use App\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelians = Pembelian::all();
        return view('Pembelian', compact('pembelians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $barangs = stokbarang::all();
        return view('tambah-beli', compact('suppliers','barangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'barang'     => 'required',
            'supplier'        => 'required',
            'jumlah'        => 'required|numeric|min:1',
        ]);

         $stok = stokbarang::where('id_barang',$request->barang)->first();
                  $stok->update([
            'jumlah' => ($stok->jumlah - $request->jumlah),
         ]);

         Pembelian::create([
            'id_barang' => $request->barang,
             'id_supplier'  =>$request->supplier,
             'jumlah'   => $request->jumlah,
             
         ]);

         return redirect('/pembelian');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suppliers = Supplier::all();
        $barangs = stokbarang::all();
        $pembeli = Pembelian::where('id_pembelian',$id)->first();
        return view('edit-beli', compact('suppliers','barangs','pembeli'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'barang'     => 'required',
            'supplier'        => 'required',
            'jumlah'        => 'required|numeric|min:1',
        ]);

         $stok = stokbarang::where('id_barang',$request->barang)->first();
                  $stok->update([
            'jumlah' => ($stok->jumlah - $request->jumlah),
         ]);

         $pembeli = Pembelian::where('id_pembelian',$id)->first();

         $pembeli->update([
            'id_barang' => $request->barang,
             'id_supplier'  =>$request->supplier,
             'jumlah'   => $request->jumlah,
         ]);

         return redirect('/pembelian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
            $pembeliandelete = pembelian::where('id_pembelian', $id)->first();
                     $stok = stokbarang::where('id_barang',$pembeliandelete->id_barang)->first();
                  $stok->update([
            'jumlah' => ($stok->jumlah + $pembeliandelete->jumlah),
         ]);
            $pembeliandelete->delete();

            return redirect('pembelian');

    }
}
