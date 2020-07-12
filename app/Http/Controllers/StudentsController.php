<?php

namespace App\Http\Controllers;

use App\Students;
use Illuminate\Http\Request;
use App\Schools;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['students'] = Students::paginate(5);
        $schools = Schools::all();

        return view('students.index', $data, ['schools' => $schools]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = Schools::all();
        
        return view('students.create', ['schools' => $schools]);
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
            'surnames' => 'required',
            'birthdate' => 'required',
        ]);

        $data = request()->except('_token');
        Students::insert($data);
        
        return redirect('students');
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
        $schools = Schools::all();
        $data = Students::findOrFail($id);

        return view('students.edit', compact(('data')), ['schools' => $schools]);
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
            'surnames' => 'required',
            'birthdate' => 'required',
        ]);
        
        $data = request()->except(['_token', '_method']);

        Students::where('id', '=', $id)->update($data);

        return redirect('students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Students::findOrFail($id);
        Students::destroy($id);

        return redirect('students');
    }
}
