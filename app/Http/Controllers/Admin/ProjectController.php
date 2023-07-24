<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Product;

class ProjectController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:project-list|project-create|project-edit|project-delete', ['only' => ['index','show']]);
         $this->middleware('permission:project-create', ['only' => ['create','store']]);
         $this->middleware('permission:project-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:project-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user =  User::with('products')->find(auth()->user()->id);
        $projects = $user->products;
        return view('admin.projects.index', compact('user', 'projects'));
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $product = Product::find($id);
        // dd($product);
        return view('admin.projects.show', compact('product'));
    }
}
