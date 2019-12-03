<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $supplier = Supplier::all();
     return view('table-datasupplier', [
        'supplier' => $supplier,
    ] );
 }

 public function tampildatasupplier()
 {
    $suppliers = Supplier::all();
    return view('table-datasupplier', compact('suppliers'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambah-sup');
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
            'namasupp'      => [
                'required', function($attribute, $value, $fail) use ($request){
                    if (preg_match('/[^A-Za-z ]/', $value))
                    {
                        $fail('hanya boleh diisi alfabet');
                    }
                }
            ],
            'alamat'        => 'required',
            'nohp'          => [
                'required','numeric',function($attribute, $value, $fail) use ($request){
                    if (strlen($value) >12)
                    {
                        $fail('kebanyakan oy');
                    }
                    if (strlen($value) <12)
                    {
                        $fail('kurang oy');
                    }
                }
            ]
        ]);
        Supplier::create([
            'namasupp'      => $request->namasupp,
            'alamat'        => $request->alamat,
            'nohp'          => $request->nohp,
        ]);
        return redirect('/table-datasupplier');
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
        return view('edit-sup',[
            'supplier' => Supplier::where('id_supplier',$id)->first()
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
            'namasupp'      => [
                'required', function($attribute, $value, $fail) use ($request){
                    if (preg_match('/[^A-Za-z ]/', $value))
                    {
                        $fail('hanya boleh diisi alfabet');
                    }
                }
            ], 
            'alamat'        => 'required',
            'nohp'          => [
                'required', function($attribute, $value, $fail) use ($request){
                    if (preg_match('/[^A-Za-z ]/', $value))
                    {
                        $fail('hanya boleh diisi alfabet');
                    }
                }
            ],
        ]);
        $supplier = Supplier::findorFail($id);
        $supplier->update([
            'namasupp'      => $request->namasupp,
            'alamat'        => $request->alamat,
            'nohp'          => $request->nohp
        ]);
        return redirect('/table-datasupplier');
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
            
        $supplier = Supplier::findorFail($id);
        $supplier ->delete();
            
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect ()-> back() ->with("pesan","ga boleh di hapus");

        }
      

        return redirect('/table-datasupplier');
    }
}
