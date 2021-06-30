<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        private Product $products
    ){}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): string
    {
        $products = $this->products->all();
        return view('index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): string
    {
        $categories = Category::all();
        return view('form')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): string
    {
        if($this->products->create($request->except('csrf_token')))
            return redirect('/');
        
        return back()->with('erros','error on autenticate values');
    }

    /**
     * Display the specified resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): string
    {
        $product = $this->products->findOrFail($id);
        return view('product')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id): string
    {
       $product = $this->products->findOrFail($id);
       $categories = Category::all();
       return view('edit')->with('product', $product)->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id): string
    {
        $product = $this->products->find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        if($product->save())
           return redirect('/');
        
        return back()->with('error','error on update product');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): string
    {
        if($this->products->destroy($id))
            return redirect()->route('index');
        
        return back()->with('error','error on delete product');
    }
}
