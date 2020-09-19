<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExerciseRules;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercises = Exercise::all();
        return view('admin.exercise.index', ['exercises' => $exercises]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.exercise.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExerciseRules $request)
    {
        $exercise = new Exercise();
        $exercise->user_id = $request->user()->id;
        $userId = $exercise->user_id;
        $exercise->name = $request->input('name');
        $exercise->save();
        return redirect()->route('calendar.create.exercise', ['userId' => $userId]);
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
    public function edit($exerciseId)
    {
        $exercise = Exercise::findOrFail($exerciseId);
        return view('admin.exercise.edit', ['exercise' => $exercise]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExerciseRules $request, $exerciseId)
    {
        $exercise = Exercise::findOrFail($exerciseId);
        $exercise->name = $request->input('name');
        $exercise->save();
        return redirect('admin/exercise');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($exerciseId)
    {
        $exercise = Exercise::findOrFail($exerciseId);
        $exercise->delete();
        return redirect('admin/exercise');
    }
}
