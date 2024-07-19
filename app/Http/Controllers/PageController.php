<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subdistrict;
use App\Models\Village;
use App\Models\Information;
use App\Models\Farm;
use App\Models\Product;
use App\Models\Message;

class PageController extends Controller
{
    public function sendMessage(Request $request){
        $request->validate([
            'email' => 'required',
            'message' => 'required',
        ]);
        $input = $request->all();
        Message::create($input);
        return redirect()->back() ->with('alert', 'Success Send The Message!');
    }

    public function searchFarm(Request $request){
        $farmCode = $request->query('farm');
        $farm = Farm::where('id', $farmCode)->first();
        if ($farm == null) {
            $farmLocation = null;
            $products = null;
        }else{
            $farmLocation = Village::where('post_code', $farm->location)->get();
            $products = Product::where('farm_id','=', $farm->id)->get();
            
        }
        
        return view('pages.partner.index', compact('farm', 'farmLocation', 'products'));
    }

    public function index(){
        $informations = Information::all();
        $subdistricts = Subdistrict::all();
        $farms = Farm::all();
        $products = Product::all();
        $information_recent = Information::first();
        $informations = Information::where('id', '>', $information_recent->id)->get();
        if (Auth::check()){            
            $farm = Farm::where('user_id', Auth::user()->id)->first();      
        }else{
            $farm = null;
        }
        return view('pages.home.index', compact('subdistricts', 'information_recent', 'informations', 'farm'));
    }
    public function postSubdistrict(Request $request){
        
        $subdistrict_id = $request->subdistrict_id;        
        $subdistrict = Subdistrict::find($subdistrict_id);
        return redirect()->route('hasSubdistrict', $subdistrict->id);
    }

    public function hasSubdistrict($id){
        $information_recent = Information::first();
        $informations = Information::where('id', '>', $information_recent->id)->get();
        $subdistrict = Subdistrict::find($id);
        $subdistricts = Subdistrict::all();
        $villages = Village::where('subdistrict_id', $id)->get();
        if (Auth::check()){            
            $farm = Farm::where('user_id', Auth::user()->id)->first();      
        }else{
            $farm = null;
        }
        // dd($villages);
        return view('pages.home.index', compact('subdistricts', 'subdistrict','villages', 'information_recent', 'informations','farm'));
    }
    
    public function postVillage(Request $request){        
        $village = Village::find($request->village_id);
        return redirect()->route('hasVillage', $village->id);
    }

    public function hasVillage($id){
        $village = Village::find($id);
        $subdistricts = Subdistrict::all();    
        $information_recent = Information::first();
        $informations = Information::where('id', '>', $information_recent->id)->get();
        $villages = Village::where('subdistrict_id','=' , $village->subdistrict_id)->get();
        // dd($village->name);
        $village_name = $village->name;
        if (Auth::check()){            
            $farm = Farm::where('user_id', Auth::user()->id)->first();      
        }else{
            $farm = null;
        }
        // dd($villages);
        $farms = Farm::where('location', $village -> post_code)->get();
        return view('pages.home.index', compact('subdistricts', 'village','villages', 'village_name', 'farms', 'information_recent', 'informations','farm'));
    }
    public function partnerDetail($id){
        $farm = Farm::find($id);         
        $farmLocation = Village::where('post_code', $farm->location)->get();
        $products = Product::where('farm_id','=', $farm->id)->get();
        // dd($products);
        return view('pages.partner.index',compact('farm', 'farmLocation', 'products'));
    }
    public function information($id){
        $information = Information::find($id);
        return view('pages.information.index', compact('information'));
    }
    
}
