<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\user;

class apicontroller extends Controller
{

    public function index()
    {
        $products = product::all();
        return response()->json([
        "success" => true,
        "message" => "Product List",
        "data" => $products
        ]);
    }
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
            public function store(Request $request)
    {
$input = $request->all();

$product = product::create($input);
return response()->json([
"success" => true,
"message" => "Product created successfully.",
"data" => $product
]);
} 

                            public function show($id)
                {
                $product = product::find($id);
                if (is_null($product)) {
                return ('Product not found.');
                }
                return response()->json([
                "success" => true,
                "message" => "Product retrieved successfully.",
                "data" => $product
                ]);
                }



            public function update(Request $req,$id)
            {
            if (product::where('id', $id)->exists()) {
                $form=product::find($id);
                $form->name=$req->name;
                
                
                $form->phone=$req->phone;
               
                $form->save();

                return response()->json([
                "message" => "product updated successfully"
                ], 200);
            } else {
                return response()->json([
                "message" => "product not found"
                ], 404);
            }
            }
            
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
                public function destroy($id)
                {
                    $delete=product::find($id);
                    $delete->delete();
              
                return response()->json([
                "success" => true,
                "message" => "Product deleted successfully.",
                "data" => $delete
                ]);
                }
}
