<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class itemController extends Controller
{
    public function createItem($name, $description, $price,$category) // one-one input (to improve make it on one array)
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
        $item->save();

        return response()->json(['message' => 'Item created successfully', 'data' => $item]);
    }

	// Route::get('/items', [ItemController::class, 'index']);
	public function readItem()
    {
        $itemModel = new Item();
        $items = $itemModel->getAllItems();  //calling items from item model

        return response()->json(['data' => $items]);
    }
}
