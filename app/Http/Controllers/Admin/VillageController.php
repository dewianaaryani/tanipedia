<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Village;
use App\Models\Subdistrict;
class VillageController extends Controller
{
    public function index(Request $request){
        $query = $request->input('query');
        
        if ($query) {
            $villages = Village::where('name', 'LIKE', "%{$query}%")
            
                ->simplePaginate(10);
        } else {
            $villages = Village::simplePaginate(10);
        }

        return view('admin.villages.index', compact('villages'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function create(){
        $subdistricts = Subdistrict::all();
        return view('admin.villages.create', compact('subdistricts'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            
        ]);
        $input = $request->all();
        Village::create($input);
        return redirect()->route('admin.villages.index')
            ->with('success', 'Village created successfully.');
    }
    public function edit(Village $village)
    {
        $subdistricts = Subdistrict::all();
        return view("admin.villages.edit", compact('village', 'subdistricts'));
    }
    
    public function update(Request $request, Village $village)
    {
        $request->validate([
            "name" => 'required',            
            
        ]);

        $input = $request->all();

        

        $village->update($input);
        return redirect()->route('admin.villages.index')
            ->with('success', 'Village updated successfully!');
    }
    public function destroy(Village $village)
    {
        $village->delete();
        return redirect()->route('admin.villages.index')
            ->with('success', 'Village deleted successfully!');
    }
}
