@extends('layouts.calendarfront')
@section('content')
@section('title', '項目の編集')
    <section class="calendar-create">
        <div class="calendar-create__inner">
            <h1 class="calendar-create__content-title">項目の編集</h1>
            <p class="calendar-create__comment">変えたい設定を修正することが出来ます。</p>
        </div>
        <div class="calendar-create__form">
            <form action="{{ route('calendar.update', ['calendar' => $calendarItem->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <label class="calendar-create__label">習慣</label>
                <small id="exercise-nameHelp" class="form-text text-muted calendar-create__help ">行いたい習慣を選択してください。</small>
                <div class="calendar-create__exercise-choice">
                    <div class="calendar-create__chioce-inner">

                        @foreach ($exercises as $exercise)
                            @if ($exercise->user_id === Auth::user()->id)
                                <div class="calendar-create__exercise-items">
                                    <div class="form-group">
                                        <input type="hidden" name="exercise_id" value="{{ $exercise->id }}">
                                        <input type="radio" name="exercise_name" id="exercise_name{{ $exercise->id }}"
                                            class="form-control" value="{{ $exercise->name }}" checked="checked"><label
                                            class="calendar-create__exercise-name"
                                            for="exercise_name{{ $exercise->id }}">{{ $exercise->name }}</label>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="calendar-create__goal-create">
                        <div class="form-group">
                            <div class="calendar-create__title">
                                <label class="calendar-create__label" for="line">行動</label>
                                <textarea class="form-control" name="line" id="line" placeholder="例）朝起きたらランニングを10分行う"
                                    aria-describedby="lineHelp" rows="1">{{ $calendarItem->line }}</textarea>
                            </div>
                            <small id="lineHelp" class="form-text text-muted calendar-create__help">何を行うのか入力してください。</small>
                        </div>
                        <div class="form-group">
                            <div class="calendar-create__title">
                                <label class="calendar-create__label" for="lowest_line">最低ライン</label>
                                <input type="text" class="form-control" name="lowest_line" id="lowest_line"
                                    placeholder="例）朝起きたらスクワット1回" aria-describedby="lowest_lineHelp"
                                    value="{{ $calendarItem->lowest_line }}">
                            </div>
                            <small id="lowest_lineHelp"
                                class="form-text text-muted calendar-create__help ">一日に必ず行える行動を入力してください。</small>
                        </div>
                        <div class="form-group">
                            <div class="calendar-create__title">
                                <label class="calendar-create__label" for="goal">目標</label>
                                <input type="text" class="form-control" name="goal" id="goal" placeholder="例）体重を5キロ減らす。"
                                    aria-describedby="goalHelp" value="{{ $calendarItem->goal }}">
                            </div>
                            <small id="goalHelp"
                                class="form-text text-muted calendar-create__help">達成したい目標を設定してください。</small>
                        </div>
                        <div class="calendar-create__btn-inner">
                            <div class="calendar-create__exit-button">
                                <a href="{{ route('calendar.index') }}">
                                    <button type="button" class="btn btn-primary">戻る</button>
                                </a>
                            </div>
                            <div class="calendar-create__button">
                                <button type="submit" class="btn btn-primary btn-lg">編集</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
