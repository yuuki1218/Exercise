@extends('layouts.calendarfront')
@section('content')
@section('title', '習慣')

    {{-- 目標設定表示 --}}
    <section class="goal">
        <div class="goal__inner">
            <div class="goal__items">
                <div class="goal__item">
                    <p class="goal__info-text">行いたい習慣：</p><span class="goal__text">{{ $calendar->exercise_name }}</span>
                </div>
                <div class="goal__item">
                    <p class="goal__info-text">目標：</p><span class="goal__text">{{ $calendar->goal }}</span>
                </div>
                <div class="goal__item">
                    <p class="goal__info-text">行動：</p><span class="goal__text">{{ $calendar->line }}</span>
                </div>
                <div class="goal__item">
                    <p class="goal__info-text">最低ライン：</p><span class="goal__text">{{ $calendar->lowest_line }}</span>
                </div>
            </div>
        </div>
        </div>
    </section>

    {{-- カレンダー表示 --}}
    <form action="{{ route('record.calendar', ['calendarId' => $calendar->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <section class="calendar">
            <div>{!! $calendar_tag !!}</div>
        </section>

        <!-- 記録入力フォーム -->
        <section class="record">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h2 class="record__title">習慣は行いましたか？</h2>
            <div class="record__inner">
                <div class="record__form-item">
                    <div class="form-group">
                        <div class="record__radio">
                            <input type="radio" name="done" id="done" class="form-control" value="1"><label
                                class="record__item-name" for="done">完了</label>
                            <div class="record__icon-star">
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="record__form-item">
                    <div class="form-group">
                        <div class="record__radio">
                            <input type="radio" name="done" id="failed" class="form-control" value="0"><label for="failed"
                                class="record__item-name">休憩</label>
                            <div class="record__icon-times">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="record__form-item">
                    <div class="form-group">
                        <div class="record__create-btn">
                            <input type="submit" class="form-control btn btn-primary" value="登録">
                        </div>
                    </div>
                </div>
            </div>
    </form>
    </section>
@endsection
