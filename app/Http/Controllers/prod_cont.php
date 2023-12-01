<?php

namespace App\Http\Controllers;

use App\Models\prod;
use App\Models\user;
use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;

class prod_cont extends Controller
{

    public function addprod(AddProductRequest $request)
    {
        $path = $request->image->store('public/images');
        prod::create([
            'name' => $request->name,
            'desciption' => $request->description,
            'price' => $request->price,
            'image' => $path,
            'category' => $request->category

        ]);
        return redirect('/');
        //     $products = \App\Models\prod::select('id', 'name', 'desciption', 'price','image')->get();

        // // Pass the retrieved data to the "home" view
        // return view('home', ['products' => $products]);
    }


    public function displayproducts()
    {

        $products = prod::get();
        //\App\Models\prod::select('id', 'name', 'desciption', 'price','image')->get();

        // Pass the retrieved data to the "home" view
        return view('products', compact('products'));
        // ['products' => $products]
    }

    public function displayproduct()
    {

        $products = prod::get();
        //\App\Models\prod::select('id', 'name', 'desciption', 'price','image')->get();

        // Pass the retrieved data to the "home" view
        return view('dis__product', compact('products'));
        // ['products' => $products]
    }

    public function displayproductuser()
    {

        $products = prod::select("*")->orderby("id","ASC")->paginate(9);
        //\App\Models\prod::select('id', 'name', 'desciption', 'price','image')->get();

        // Pass the retrieved data to the "home" view
        return view('products', compact('products'));
        // ['products' => $products]
    }
    public function displayproductuserByCategory($category)
    {
        // Query products based on the selected category
        $products = prod::where('category', $category)->get();
        if ($products->isEmpty()) {
            // No products found for the selected category
            $message = "No products found for the selected category.";
            return view('products', compact('products', 'message'));
        }else{

        // Pass the filtered data to the view
        return view('products', compact('products'));
        }
    }
    public function deleteprod($id)
    {

        $product = prod::find($id);

        if (!$product) {

            return redirect('/')->with('error', 'Product not found.');
        }


        $product->delete();


        $products = prod::get();
        //\App\Models\prod::select('id', 'name', 'desciption', 'price','image')->get();

        // Pass the retrieved data to the "home" view
        return view('products', compact('products'));
        // $products = \App\Models\prod::select('id', 'model', 'color', 'price')->get();

        // // Pass the retrieved data to the "home" view
        // return view('home', ['products' => $products]);
    }

    public function editprodform($id)
    {

        $product = prod::find($id);
        return view('editproduct', compact('product'));
    }


    public function update(UpdateProductRequest $request, $id)
    {
        $products = prod::find($id);
        if (!$products) {

            return redirect('/')->with('error', 'Product not found.');
        }
        if ($request->has('image')) {

            $path = $request->file('image')->store('public/images');
            $products->image = $path;
        } else {
            $path =  $products->image;
        }

        $products->name = $request->name;
        $products->desciption = $request->description;
        $products->price = $request->price;
        $products->image = $path;
        $products->save();
        return redirect('/');
    }
    public function productDetails(Request $request, $id)
    {
        $product = prod::find($id);
        return view('productdetails', compact('product'));
    }
}
