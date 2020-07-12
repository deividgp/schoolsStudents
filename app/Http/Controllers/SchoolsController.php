<?php

namespace App\Http\Controllers;

use App\Schools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['schools'] = Schools::paginate(5);

        return view('schools.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'logo' => 'mimes:jpeg,bmp,png|dimensions:max_width=200,max_height=200|max:2048',
        ]);

        $data = request()->except('_token');

        if($request->hasFile('logo')){
            $data['logo'] = $request->file('logo')->store('uploads','public');
        }

        Schools::insert($data);
        
        return redirect('schools');
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
    public function edit($id)
    {
        $data = Schools::findOrFail($id);
        
        return view('schools.edit', compact(('data')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'logo' => 'mimes:jpeg,bmp,png|dimensions:max_width=200,max_height=200|max:2048',
        ]);

        $data = request()->except(['_token', '_method']);

        if($request->hasFile('logo')){
            $dataAux = Schools::findOrFail($id);
            Storage::delete('public/'.$dataAux->logo);
            $data['logo'] = $request->file('logo')->store('uploads','public');
        }

        Schools::where('id', '=', $id)->update($data);

        return redirect('schools');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataAux = Schools::findOrFail($id);
        $destroy = Schools::destroy($id);

        if ($destroy) {
            Storage::delete('public/'.$dataAux->logo);
        }

        return redirect('schools');
    }
}
