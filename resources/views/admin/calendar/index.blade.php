@extends('layouts.calendarfront')
@section('content')
@section('title', '習慣の選択画面')
    {{-- 習慣の選択画面表示 --}}
    <section class="habits">
        <div class="habits__inner">
            <h1 class="habits__content-title">習慣の選択画面</h1>
            @foreach ($calendars as $calendar)
                @if ($calendar->user_id === Auth::user()->id)
                    <div class="habits__items">
                        <div class="habits__title">
                            <a class="habits__link" href="{{ route('calendar.show', ['calendar' => $calendar->id]) }}">
                                <p class="habits__title">{{ $calendar->exercise_name }}</p>
                            </a>
                        </div>
                        <div class="habits__btn">
                            <a href="{{ route('calendar.edit', ['calendar' => $calendar->id]) }}">
                                <button class="btn edit-btn btn-secondary">修正</button>
                            </a>
                            <form action="{{ route('calendar.destroy', ['calendar' => $calendar->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{ $calendar->id }}">
                                <button class="btn delete-btn btn-danger">削除</button>
                            </form>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="calendar-create__button">
            <form action="{{ route('calendar.create') }}">
                <button class="btn btn-primary btn-lg" type="submit">カレンダーを作成</button>
            </form>
        </div>
    </section>
@endsection
