<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Datatables;

use App\Product;

class ProductController extends Controller
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
        return view('product.index');
    }
    /**
     * Products List
     */
    public function productsList()
    {
        $products = Product::where('status','1');
        return datatables()->of($products)
            ->make(true);
    }

    /**
     * 
     * Product detail
     */
    public function productBySku( $sku )
    {
        $product = Product::where('sku',$sku)->first();

        return $product;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sku' => 'required|unique:products'
        ]);

        $product = new Product();
        $product->name  = $request->name;
        $product->sku   = $request->sku;
        $product->qty   = $request->qty;
        $product->price = $request->price;
        $product->status = '1';
        $product->save();
        return redirect('home')->with('status', 'Producto creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('product.show',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('product.edit',['product' => $product ]);
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

        $validatedData = $request->validate([
            'sku' => 'required|unique:products'
        ]);

        $product = Product::find($id);
        
        $product->name  = $request->name;
        $product->sku   = $request->sku; //SKU debe ser unico
        $product->qty   = $request->qty;
        $product->price = $request->price;
        $product->status = '1';
        $product->save();
        return redirect('home')->with('status', 'Producto actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Soft Delete
        $product = Product::find($id);
        $product->status = '-1';
        $product->save();
        return redirect('/products')->with('status','Producto eliminado!');      
    }

    /**
     * Remove the specified resource from storage with SoftDelete.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productDelete(Request $request)
    {
        //Soft Delete
        $product = Product::find($request->sku_d);
        $product->status = '-1';
        $product->sku = $product->sku . '-DELETED'; //Libera el SKU 
        $product->save();
        return redirect('/products')->with('status','Producto eliminado!');      
    }
}
