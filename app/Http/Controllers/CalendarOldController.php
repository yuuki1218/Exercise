<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar\CalendarView;
use App\Models\Record;
use App\Models\Calendar;

// class CalendarController extends Controller
// {
//     public function index(Request $request)
//     {
//         $date = $request->input("date");
//         if ($date && preg_match("/^[0-9]{4}-[0-9]{2}$/", $date)) {
//             $date = strtotime($date . "+1 day");
//         } else {
//             $date = null;
//         }

//         if (!$date) {
//             $date = time();
//         }
//         $records = Record::all();
//         $calendar = new CalendarView($records, $date);
//         $tag = $calendar->showCalendarTag($request->month, $request->year);
//         return view('admin.calendar.index', ['calendar_tag' => $tag, 'calendar' => $calendar]);
//     }

    // public function create()
    // {
    //     return view('admin.calendar.create');
    // }
// }
