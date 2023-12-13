<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin,staff');
    }

    public function index()
    {
        $categories = Category::all();
        return view('categories.index');
    }
    

    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //        'name'   => 'required|string|min:2'
    //     ]);

    //     Category::create($request->all());

    //     return response()->json([
    //        'success'    => true,
    //        'message'    => 'Categories Created'
    //     ]);
    // }
    public function createCategory($name, $description, $price,$category) // one-one input (to improve make it on one array, $request)
    {
        
		// dd($name);
		// dd($description);
		// dd($price);
		// dd($category);
        $item = new Item();
        $item->name = $name;
        $item->description = $description;
		$item->category = $category;
        $item->price = $price;
        $response = $item->save();
        if($response == 200){
            return response()->json(['message' => 'Item created successfully', 'data' => $item]);
        }else{
            return response()->json(['message' => 'Something went wrong, plese try again', 'data' => $item]);
        }
        
    }
}
