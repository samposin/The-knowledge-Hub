<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\ProductCategory;
use App\Models\Admin\DetailProduct;
use App\Models\Admin\Category;

class ProductController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('product_categories')->where('status', 'active')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', 'active')->latest()->get();
        return view('admin.products.create', compact('categories'));
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
            'name' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        
        $input = $request->except(['_token']);
  
        if ($image = $request->file('thumbnail')) {
            $destinationPath = 'public/images/products/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['thumbnail'] = "$profileImage";
        }
        $categories = $input['categories'];
        unset($input['categories']);
        unset($input['files']);
        $product = Product::create($input);
        $product->product_categories()->attach($categories);
        return redirect()->route('admin.products.index')->with('success','Product created successfully.');
    }

    public function add_details(Request $request){
        $request->validate([
            'position' => 'required',
            'description' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        
        $input = $request->except(['_token']);
  
        if ($image = $request->file('thumbnail')) {
            $destinationPath = 'public/images/products/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['thumbnail'] = "$profileImage";
        }
        unset($input['files']);
        $product = DetailProduct::create($input);
        return redirect()->route('admin.products.index')->with('success','Product Detail created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::where('status', 'active')->latest()->get();
        return view('admin.products.edit',compact('product', 'categories'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
  
        $input = $request->except(['_token']);
  
        if ($image = $request->file('thumbnail')) {
            $destinationPath = 'public/images/products/';
            $old_file = $destinationPath.$input['old_thumbnail'];
            $thumbImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $thumbImage);
            $input['thumbnail'] = "$thumbImage";
            delete_file($old_file);
        }else{
            unset($input['thumbnail']);
        }

        $categories = $input['categories'];
        unset($input['categories']);
        unset($input['old_thumbnail']);
        unset($input['files']);

        $product->update($input);

        $product->product_categories()->sync($categories);

        return redirect()->route('admin.products.index')
                        ->with('success','Product updated successfully');
    }

    public function product_detail_destroy(DetailProduct $detailProduct)
    {
        delete_file('public/images/products/'.$detailProduct->thumbnail);
        $detailProduct->delete();
        return redirect()->route('admin.products.index')
                        ->with('success','Product deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        delete_file('public/images/products/'.$product->thumbnail);
        $product->product_categories()->detach();
        $product->delete();
        return redirect()->route('admin.products.index')
                        ->with('success','Product deleted successfully');
    }
}
