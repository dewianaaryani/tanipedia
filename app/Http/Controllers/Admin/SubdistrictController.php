<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subdistrict;

class SubdistrictController extends Controller
{
    public function index(Request $request){
        // $subdistricts = Subdistrict::latest()->simplePaginate(5);
        // return view('admin.subdistricts.index', compact('subdistricts'))->with('i', (request()->input('page',1)-1)*5);
        $query = $request->input('query');
        
        if ($query) {
            $subdistricts = Subdistrict::where('name', 'LIKE', "%{$query}%")
                ->simplePaginate(10);
        } else {
            $subdistricts = Subdistrict::simplePaginate(10);
        }

        return view('admin.subdistricts.index', compact('subdistricts'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function create(){
        return view('admin.subdistricts.create');
    }
    
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            
        ]);
        $input = $request->all();
        Subdistrict::create($input);
        return redirect()->route('admin.subdistricts.index')
            ->with('success', 'Subdistrict created successfully.');
    }
    public function edit(Subdistrict $subdistrict)
    {
        return view("admin.subdistricts.edit", compact("subdistrict"));
    }
    
    public function update(Request $request, Subdistrict $subdistrict)
    {
        $request->validate([
            "name" => 'required',            
            
        ]);

        $input = $request->all();

        

        $subdistrict->update($input);
        return redirect()->route('admin.subdistricts.index')
            ->with('success', 'Subdistrict updated successfully!');
    }
    public function destroy(Subdistrict $subdistrict)
    {
        $subdistrict->delete();
        return redirect()->route('admin.subdistricts.index')
            ->with('success', 'Subdistrict deleted successfully!');
    }
}
