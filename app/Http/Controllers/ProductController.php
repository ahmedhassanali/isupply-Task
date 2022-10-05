<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        try {

            //Global Scope
            $products = product::get();
            return responseJson(1, 'DONE', $products);

        } catch (\Exception $e) {
            return responseJson(0, $e->getMessage());
        }

    } //end of index

    public function store(Request $request)
    {

        $validatedata = $request->validate([
            'name'  => 'required',
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'stock' => 'required',
        ]);

        $validatedata['created_by_user_id'] = auth()->id();

        try {

            $product = product::create($validatedata);
            return responseJson(1, 'product added successfully', $product);

        } catch (\Exception $e) {

            return responseJson(0, $e->getMessage());
        }

    } //end of store

    public function update(Request $request)
    {

        $validatedata = $request->validate([
            'name'  => 'required',
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'stock' => 'required',
        ]);
        try {

            //Global Scope
            $product = product::find($request->id);
            $product->update($validatedata);
            return responseJson(1, 'product update successfully', $product);

        } catch (\Exception $e) {

            return responseJson(0, $e->getMessage());
        }

    } //end of update

    public function destroy(request $request)
    {
        try {

            //Global Scope
            product::find($request->id)->delete();
            return responseJson(1, 'product deleted successfully');

        } catch (\Exception $e) {

            return responseJson(0, $e->getMessage());
        }

    } //end of destroy

}
