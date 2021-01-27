<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Sale;
use App\Product;

use Auth;

class SaleController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sale.index');
    }

    /**
     * Sales List
     */
    public function salesList()
    {
        $sales = Sale::all();

        return datatables()->of($sales)
                ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();

        return view('sale.create',['products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::where('sku',$request->product_sku)->first();
        
        $sale = new Sale();
        $sale->qty   = 1;
        $sale->price = $request->price;
        $sale->product_id = $product->id;
        $sale->user_id = Auth::id();
        DB::beginTransaction();
        if( $sale->save() )
        {
               DB::commit();
               return redirect('home')->with('status', 'Venta registrada exitosamente!');
        }
        else
        {
            DB::rollBack();
            return redirect('sales/create')->with('error','Ocurrió un problema al intentar registrar la venta.');
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
