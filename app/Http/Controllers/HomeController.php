<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }

    public function welcome()
    {
        $products = Product::latest()->take(10)->get();
        $categories = Category::orderBy('name', 'asc')->get();

        return view('welcome', compact('products', 'categories'));


    }
    public function viewProduct($id, $slug)
    {
        $product = Product::find($id);
        return view('product', compact('product'));
    }
}
