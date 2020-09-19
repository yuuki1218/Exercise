<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Calendar\CalendarView;
use App\Http\Requests\CalendarRules;
use App\Models\Record;
use App\Models\Calendar;
use App\Models\Exercise;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $calendars = Calendar::all();

        return view('admin.calendar.index', [ 'calendars' => $calendars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exercises = Exercise::all();
        return view('admin.calendar.create', ['exercises' => $exercises]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalendarRules $request)
    {
        $calendar = new Calendar();
        $calendar->user_id = $request->user()->id;
        $calendar->exercise_id = $request->input('exercise_id');
        $calendar->exercise_name = $request->input('exercise_name');
        $calendar->line = $request->input('line');
        $calendar->lowest_line = $request->input('lowest_line');
        $calendar->goal = $request->input('goal');
        $calendar->save();
        return redirect('admin/calendar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $calendarId)
    {
        $calendar = Calendar::findOrFail($calendarId);
        $date = $request->input("date");
        if ($date && preg_match("/^[0-9]{4}-[0-9]{2}$/", $date)) {
            $date = strtotime($date . "+1 day");
        } else {
            $date = null;
        }

        if (!$date) {
            $date = time();
        }
        $records = Record::where('calendar_id', $calendarId)->get();
        $calendarView = new CalendarView($records, $date);
        $tag = $calendarView->showCalendarTag($request->month, $request->year);
        return view('admin.calendar.show', ['calendar_tag' => $tag, 'calendar' => $calendar]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($calendarId)
    {
        $calendarItem = Calendar::findOrFail($calendarId);
        $exercises = Exercise::all();
        return view('admin.calendar.edit', [
            'calendarItem' => $calendarItem,
            'exercises' => $exercises
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $calendarId)
    {
        $calendarItem = Calendar::findOrFail($calendarId);
        $calendarItem->exercise_name = $request->input('exercise_name');
        $calendarItem->line = $request->input('line');
        $calendarItem->lowest_line = $request->input('lowest_line');
        $calendarItem->goal = $request->input('goal');
        $calendarItem->save();
        return redirect('admin/calendar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($calendarId)
    {
        $calendar = Calendar::findOrFail($calendarId);
        $calendar->delete();
        return redirect('admin/calendar');
    }
}
