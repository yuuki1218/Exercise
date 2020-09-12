<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordRules;
use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\Calendar;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function record(RecordRules $request, $calendarId)
    {
        $calendar = Calendar::findOrFail($calendarId);
        $records = new Record();
        $records->calendar_id = $calendar->id;
        $records->done = $request->input('done');
        $records->date = $request->input('date');
        $records->save();
        return redirect()->route('calendar.show', ['calendar' => $calendar->id]);
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
    public function edit($recordId)
    {
        $record = Record::findOrFail($recordId);
        return view('admin.record.edit', ['record' => $record]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $recordId)
    {
        $record = Record::findOrFail($recordId);
        $record->done = $request->input('done');
        $record->date = $request->input('date');
        $calendarId = $record->calendar_id;
        $record->save();
        return redirect()->route('calendar.show', ['calendar' => $calendarId]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($recordId)
    {
        $record = Record::findOrFail($recordId);
        $calendarId = $record->calendar_id;
        $record->delete();
        return redirect()->route('calendar.show', ['calendar' => $calendarId]);
    }
}
