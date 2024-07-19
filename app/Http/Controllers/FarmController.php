<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Village;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(){        
        $locations = Village::get();
        return view('pages.my-farm.register.index', compact('locations'));
    }    
     public function index()
    {
        $farm = Farm::where('user_id', Auth::user()->id)->first();                
        if(!($farm == null))
        {
        $products = Product::where('farm_id', $farm -> id)->get();
        // dd($products);
        return view('pages.my-farm.index',compact('farm', 'products'));
        }else{
            $products = null;
            return view('pages.my-farm.index',compact('farm', 'products'));
        }

    }
    public function store(Request $request)
    {
        $request->validate([            
            'name' => 'required',
            'lt' => 'required',
            'ld' => 'required',
            'location' => 'required',
            'luas' => 'required',
            'kualitas_air' => 'required',
            'kualitas_udara' => 'required',
            'kualitas_tanah' => 'required',
            'contact' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $input = $request->all();
        if($image = $request->file('image')){
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        $input['user_id'] = Auth::user()->id;
        Farm::create($input);
        return redirect()->route('my-farm')
            ->with('success', 'Farm created successfully.');
    }
    public function storeProduct(Request $request){
        $request->validate([            
            'name' => 'required',
            'price' => 'required',
            'item_unit' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if($image = $request->file('image')){
            $destinationPath = 'image/products/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        $farm = Farm::where('user_id', Auth::user()->id)->first();                
        $input['farm_id'] = $farm->id;
        Product::create($input);
        // return redirect()->route('my-farm')
        //     ->with('success', 'Farm created successfully.');
        session()->flash('success', 'Product added successfully');

        // Redirect back to the farm page or wherever appropriate
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function show(Farm $farm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function edit(Farm $farm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farm $farm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farm $farm)
    {
        //
    }
    public function destroyProduct($farmId, $productId)
    {
        // Find the farm
        $farm = Farm::findOrFail($farmId);

        // Find the product belonging to this farm
        $product = Product::where('farm_id', $farmId)
                          ->where('id', $productId)
                          ->firstOrFail();

        // Delete the product
        $product->delete();

        return redirect()->route('my-farm')
                         ->with('success', 'Product deleted from farm successfully');
    }
    
}
