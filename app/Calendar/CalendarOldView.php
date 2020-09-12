<?php
namespace App\Calendar;

use Carbon\Carbon;
use App\Models\Record;

class CalendarOldView
{
    private $carbon;
    public function __construct($date)
    {
        $this->carbon = new Carbon($date);
    }
    //タイトル
    public function getTitle()
    {
        return $this->carbon->format('Y年n月');
    }
    //カレンダーの出力
    public function render()
    {
        //曜日のヘッダー
        $html = [];
        $html[] = '<div class="calendar">';
        $html[] ='<table class="table">';
        $html[] ='<thead>';
        $html[] ='<tr>';
        $html[] ='<th>月</th>';
        $html[] ='<th>火</th>';
        $html[] ='<th>水</th>';
        $html[] ='<th>木</th>';
        $html[] ='<th>金</th>';
        $html[] ='<th>土</th>';
        $html[] ='<th>日</th>';
        $html[] ='</tr>';
        $html[] ='</thead>';

        //日にちのボディー
        $html[] = '<tbody>';
        $weeks = $this->getWeeks();
        foreach ($weeks as $week) {
            $html[] = '<tr class="' . $week->getClassName(). '">';
            $days = $week->getDays();
            foreach ($days as $day) {
                $html[] = '<td class="' . $day->getClassName(). '">';
                $html[] = $day->render();
                $html[] = '</td>';
            }
            $html[] = '</tr>';
        }
        $html[] = '</tbody>';
        $html[] ='</table>';
        $html[] ='</div>';
        return implode("", $html);
    }
    public function getWeeks()
    {
        $weeks = [];

        //初日
        $firstDay = $this->carbon->copy()->firstOfMonth();

        //月末
        $lastDay = $this->carbon->copy()->lastOfMonth();

        //一週目
        $week = new Calendarweek($firstDay->copy());
        $weeks[] = $week;

        //作業用の日
        $tmpDay = $firstDay->copy()->addDay(7)->startOfWeek();

        //月末までループ
        while ($tmpDay->lte($lastDay)) {
            $week = new CalendarWeek($tmpDay, count($weeks));
            $weeks[] = $week;

            //次の週+=7日する
            $tmpDay->addDay(7);
        }
        return $weeks;
    }

    //次の月を表示
    public function getNextMonth()
    {
        return $this->carbon->copy()->addMonthsNoOverflow()->format('Y-m');
    }

    //前の月を
    public function getPreviousMonth()
    {
        return $this->carbon->copy()->subMonthNoOverflow()->format('Y-m');
    }
}
