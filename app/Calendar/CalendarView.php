<?php
namespace App\Calendar;

use Carbon\Carbon;

class CalendarView
{
    private $html;
    private $records;
    private $carbon;
    public function __construct($records, $date)
    {
        $this->records = $records;
        $this->carbon = new Carbon($date);
    }

    public function getTitle()
    {
        return $this->carbon->format('Y年n月');
    }

    public function showCalendarTag($m, $y)
    {
        $year = $y;
        $month = $m;
        if ($year == null) {
            //システムの日付を取得
            $year = date("Y");
            $month = date("m");
        }
        //前月
        $prev = strtotime('-1 month', mktime(0, 0, 0, $month, 1, $year));
        $prev_year = date("Y", $prev);
        $prev_month = date("m", $prev);
        //翌月
        $next = strtotime('+1 month', mktime(0, 0, 0, $month, 1, $year));
        $next_year = date("Y", $next);
        $next_month = date("m", $next);
        //平日・1日の曜日(0:日曜日, 6：土曜日)
        $firstWeekDay = date("w", mktime(0, 0, 0, $month, 1, $year));
        //指定した月の最終日
        $lastDay = date("t", mktime(0, 0, 0, $month, 1, $year));

        //日曜日からカレンダーを表示するため前月の余った日付をループの初期値にする。
        $day = 1 - $firstWeekDay;
        $this->html = <<<EOS
        <div class="container">
            <div class="calendar">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-center">
                                <a href="?year={$prev_year}&month={$prev_month}"
                                    class="btn btn-outline-secondary float-left">前の月</a>
                                <span class="date-title">
                                    {$year}年{$month}月
                                </span>
                                <a href="?year={$next_year}&month={$next_month}"
                                    class="btn btn-outline-secondary float-right">次の月</a>
                            </div>
                            <div class="card-body">
                            <table class="table table-bordered">
                            <thead>
                            <tr>
                            <th scope="col">日</th>
                            <th scope="col">月</th>
                            <th scope="col">火</th>
                            <th scope="col">水</th>
                            <th scope="col">木</th>
                            <th scope="col">金</th>
                            <th scope="col">土</th>
                            </tr>
                            </thead>
                            </div>
                            </div>
        EOS;

        //カレンダー日付部分生成
        while ($day <= $lastDay) {
            $this->html .= "<tr>";

            //各週を描画するHTMLソース
            for ($i = 0; $i < 7; $i++) {
                if ($day <= 0 || $day > $lastDay) {
                    //前月・来月の日付の場合空白を入れる
                    $this->html .= "<td class=\"day-blank\">&nbsp;</td>";
                } else {
                    //日にちを入れる
                    $target = date("Y-m-d", mktime(0, 0, 0, $month, $day, $year));
                    $this->html .= "<td><div class=\"form-group\"><div class=\"record__radio\">
                                    <input type=\"radio\" class=\"form-control\" name=\"date\" id=\"date". $day ."\" value=\"". $target ."\">
                                    <label for=\"date". $day ."\" class=\"day\">" . $day . "</label>
                                    </div>
                                    </div><br>";
                    foreach ($this->records as $record) {
                        if ($record->date == $target) {
                            if ($record->done) {
                                $this->html .= "<a href=\"".route('record.edit', ['record' => $record->id]) ."\">";
                                $this->html .= "<i class=\"fas fa-star\"" . $record->done . "</i>";
                                $this->html .= "</a>";
                            } else {
                                $this->html .= "<a href=\"".route('record.edit', ['record' => $record->id]) ."\">";
                                $this->html .= "<i class=\"fas fa-times\"" . $record->done . "</i>";
                                $this->html .= "</a>";
                            }
                            break;
                        }
                    }
                    $this->html .= "</td>";
                    $this->html .= "</div>";
                }
                $day++;
            }
            $this->html .= "</tr>";
        }
        return $this->html .= "</table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
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
