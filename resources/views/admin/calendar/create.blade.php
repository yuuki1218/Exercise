@extends('layouts.calendarfront')
@section('content')
@section('title', 'カレンダー作成')
    <div class="container">
        <div class="information">
            <h1>カレンダー作成画面</h1>
            <div class="comment">
                <p>それぞれ設定をして記録を付けるカレンダーを作成しましょう！</p>
            </div>
        </div>
        <div class="form-area">
            <form action="{{ route('calendar.store') }}" method="POST" enctype="multipart/form-data">
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
                <div class="form-group">
                    <label for="title">習慣の項目</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="例）ランニング"
                        aria-describedby="titleHelp" value="{{ old('title') }}">
                    <small id="titleHelp" class="form-text text-muted">習慣にしたい項目名を入力してください。</small>
                </div>
                <div class="form-group">
                    <label for="line">行動</label>
                    <textarea class="form-control" name="line" id="line" placeholder="例）朝起きたらランニングを10分行う"
                        aria-describedby="lineHelp" rows="5">{{ old('line') }}</textarea>
                    <small id="lineHelp" class="form-text text-muted">習慣化するために何を行うのか入力してください。</small>
                </div>
                <div class="form-group">
                    <label for="lowest_line">最低ライン</label>
                    <input type="text" class="form-control" name="lowest_line" id="lowest_line" placeholder="例）朝起きたらスクワット1回"
                        aria-describedby="lowest_lineHelp" value="{{ old('lowest_line') }}">
                    <small id="lowest_lineHelp" class="form-text text-muted">一日に必ず行える行動を入力してください。</small>
                </div>
                <div class="form-group">
                    <label for="goal">目標</label>
                    <input type="text" class="form-control" name="goal" id="goal" placeholder="例）体重を5キロ減らす。"
                        aria-describedby="goalHelp" value="{{ old('goal') }}">
                    <small id="goalHelp" class="form-text text-muted">達成したい目標を設定してください。</small>
                </div>
                <button type="submit" class="btn btn-primary">カレンダー作成</button>
            </form>
        </div>
        <div class="exit-button">
            <a href="{{ route('calendar.index') }}">
                <button　type="submit" class="btn btn-primary">戻る</button>
            </a>
        </div>
    </div>
@endsection
