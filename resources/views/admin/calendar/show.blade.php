@extends('layouts.calendarfront')
@section('content')
@section('title', '習慣')

    {{-- カレンダー表示 --}}
    <div>{!! $calendar_tag !!}</div>

    {{-- 目標設定表示 --}}
    <div class="goal-area">
        <div class="item">
            <p>習慣の項目</p>
            <p>{{ $calendar->title }}</p>
        </div>
        <div class="item">
            <p>行動</p>
            <p>{{ $calendar->line }}</p>
        </div>
        <div class="item">
            <p>最低ライン</p>
            <p>{{ $calendar->lowest_line }}</p>
        </div>
        <div class="item">
            <p>目標</p>
            <p>{{ $calendar->goal }}</p>
        </div>
    </div>

    <!-- 記録入力フォーム -->
    <form action="{{ route('record.calendar', ['calendarId' => $calendar->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <label for="done" class="row done">習慣は行いましたか？</label>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label　for="done">完了<input type="radio" name="done" id="done" class="form-control"
                                    value="1"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label for="failed">サボり<input type="radio" name="done" id="failed" class="form-control"
                                    value="0"></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date" class="date">日付</label>
                        <input type="text" name="date" id="date" class="form-control" value="{{ old('date') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="submit-button"></div>
                        <input type="submit" class="form-control submit" value="登録">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
    <script>
        $(function() {
            $("#date").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });

    </script>
@endsection
