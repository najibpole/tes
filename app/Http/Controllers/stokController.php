<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\stokbarang;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class stokController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $stoks = stokbarang::all();
       return view('table-datastockbarang', [
            'stoks' => $stoks,
       ] );
    }

    public function tampildatastok()
    {
        $stoks = stokbarang::all();
        return view('table-datastockbarang', compact('stoks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        return view('tambah-stock',compact('suppliers'));
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
            'namabarang'      => 'required', 
            'jumlah'        => 'required|numeric|min:1',
            'supplier'        => 'required',
            'harga'          => 'required|numeric|min:100',
        ]);
        stokbarang::create([
            'namabarang'      => $request->namabarang,
            'jumlah'        => $request->jumlah,
            'harga'          => $request->harga,
            'id_supplier'          => $request->supplier,
        ]);
        return redirect('/table-datastockbarang');
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
        return view('edit-stok',[
            'stok' => stokbarang::where('id_barang',$id)->first(),
            'suppliers' => Supplier::all(),
        ]);
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
           'namabarang'      => 'required', 
            'jumlah'        => 'required|numeric|min:1',
            'supplier'        => 'required',
            'harga'          => 'required|numeric|min:100',
        ]);
        $supplier = stokbarang::findorFail($id);
        $supplier->update([
          'namabarang'      => $request->namabarang,
            'jumlah'        => $request->jumlah,
            'harga'          => $request->harga,
            'id_supplier'          => $request->supplier,
        ]);
        return redirect('/table-datastockbarang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        try {
            
        $stokbarang = stokbarang::findorFail($id);
        $stokbarang ->delete();
            
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect ()-> back() ->with("pesan","ga boleh di hapus");

        }
        
        
        return redirect()->route("stok.index");
    }
}
