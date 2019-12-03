<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;
use App\stokbarang;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualans = Penjualan::with('barang')->get();
        return view('table-datapenjualan', compact('penjualans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = stokbarang::all();
        return view('tambah-jual', compact('barang'));
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
            'id_barang' =>'required',
            'jumlah' => 'required|numeric|min:1',
            'status' => 'required',
        ]);
        $stokbarang = stokbarang::find($request->id_barang);
        $totalharga = $request->jumlah*$stokbarang->harga;
        Penjualan::create([
            
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah,
            'status' => $request->status,
            'totalharga' => $totalharga

        ]);

        return redirect('/table-datapenjualan');
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
        $barangs = stokbarang::all();
        $penjualan = Penjualan::where('id_penjualan',$id)->first();
        return view('edit-jual', compact('penjualan','barangs'));
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
            'barang' =>'required',
            'jumlah' => 'required|numeric|min:1',
            'status' => 'required',
        ]);
        $stokbarang = stokbarang::find($request->barang);
        // dd($stokbarang);
        $totalharga = $request->jumlah*$stokbarang->harga;      
        $penjualan = Penjualan::where('id_penjualan',$id)->first();
        $penjualan->update([
            
            'id_barang' => $request->barang,
            'jumlah' => $request->jumlah,
            'status' => $request->status,
            'totalharga' => $totalharga

        ]);

        return redirect('/table-datapenjualan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
            $penjualandelete = Penjualan::where('id_penjualan', $id)->first();
            $penjualandelete->delete();

            return redirect('penjualan');
    }
}
