<?php

namespace App\Http\Controllers\Backend;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

        $cities = City::with('state')->paginate(10);
        if($request->has('search')){
            $cities =  City::where('name', 'like', "%{$request->search}%")->orWhereHas('state', function($query) use($request){
                $query->where('name', 'like', "%{$request->search}%");
            })->with('state')->paginate(10);
        }  
        return view('system.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view('system.cities.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $request->validate([
            'state_id'=> ['required'],
            'name'=> ['required','max:255'],
        ]);


        City::create($validate);
        return redirect()->route('cities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $states = State::all();
        
        return view('system.cities.edit', compact('states','city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $validate = $request->validate([
            'state_id'=> ['required'],
            'name'=> ['required'],
        ]);

        $city->update($validate);
        return redirect()->route('cities.index');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)

    {
        $city->delete();
        return redirect()->route('cities.index');
    }
}
