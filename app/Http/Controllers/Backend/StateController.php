<?php

namespace App\Http\Controllers\Backend;

use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        
    
        
      $states =   State::with('country')->orderBy('id', 'desc')->paginate(10);

         if($request->has('search')){
            $states = State::where('name', 'like', '%'.$request->search.'%')->orWhereHas('country', function($query) use ($request){
                $query->where('name','like','%'.$request->search.'%')->orWhere('country_code' ,'like', '%'.$request->search.'%');
            })->with('country')->paginate(10);
         }
    
     
        return view('system.states.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('system.states.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated =  $request->validate([
            'country_id'=> ['required'],
            'name'=> ['required'],
        ]);

        State::create($validated);

        return redirect()->route('states.index');
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
    public function edit(State $state)
    {   
        $countries = Country::all();
        return view('system.states.edit', compact('state', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {   
        $validated = $request->validate([
            'country_id'=> ['required'],
            'name'=> ['required','max:255'],
        ]);


        $state->update($validated);
        return redirect()->route('states.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();
        return redirect()->route('states.index');

    }
}
