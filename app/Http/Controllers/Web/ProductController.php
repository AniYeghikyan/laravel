<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return response()
            ->view('products.index', [
                'products' => $products
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
       $product = new Product();
       $product->name = $request->name;
       $product->size = $request->size;
       $product->category = $request->category;
       $product->price = $request->price;
       $product->save();

       return redirect('/products')
           ->with(['msg'=>'The product has been created successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findorfail($id);
        return response()->view('products.show',
            ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findorfail($id);
        return response()->view('products.edit',
            ['product' => $product, 'categories' =>
                ['clothes', 'shoes', 'electronics']]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $product['name'] = $request->name;
        $product['size'] = $request->size;
        $product['category'] = $request->category;
        $product['price'] = $request->price;
            Product::where('id', $id)->update($product);

            return redirect('/products')->with(
                ['msg' => 'The products has been successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return redirect('/products')->with(
            ['msg' => 'The products has been successfully deleted']);
    }
}
