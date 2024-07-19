<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Farm;
use App\Models\User;
use App\Models\Village;
class FarmController extends Controller
{
    public function index(Request $request){
        $query = $request->input('query');
        
        if ($query) {
            $farms = Farm::where('name', 'LIKE', "%{$query}%")
                ->orWhere('location', 'LIKE', "%{$query}%")
                ->simplePaginate(10);
        } else {
            $farms = Farm::simplePaginate(10);
        }

        return view('admin.farms.index', compact('farms'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
    
    public function create(){
        $users = User::doesntHave('farm')->where('type', 0)->get();
        $locations = Village::get();
        return view('admin.farms.create', compact('users', 'locations'));
    }
    public function store(Request $request){
        $request->validate([
            'user_id' => 'required',
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
        Farm::create($input);
        return redirect()->route('admin.farms.index')
            ->with('success', 'Farm created successfully.');
    }
    public function edit(Farm $farm){
        $users = User::where('type', "0")->get();
        $locations = Village::get();
        return view('admin.farms.edit', compact('farm', 'users','locations'));
    }
    public function update(Request $request, Farm $farm){
        $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'lt' => 'required',
            'ld' => 'required',
            'location' => 'required',
            'luas' => 'required',
            'kualitas_air' => 'required',
            'kualitas_udara' => 'required',
            'kualitas_tanah' => 'required',
            'contact' => 'required',
            
        ]);
        $input = $request->all();

        if($image = $request->file('image')){
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $farm->update($input);
        return redirect()->route('admin.farms.index')
            ->with('success', 'Farm updated successfully!');


    }
    public function destroy(Farm $farm){
        // $products = $farm->products();
        // dd($products);
        $farm->products()->delete();
        // $products->delete();
        $farm->delete();
        
        return redirect()->route('admin.farms.index')
            ->with('success', 'Farm deleted successfully');
    }
}
