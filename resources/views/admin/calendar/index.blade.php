@extends('layouts.calendarfront')
@section('content')
@section('title', '習慣の選択画面')
    {{-- 習慣の選択画面表示 --}}
    <div class="container">
        <h1>習慣の選択画面</h1>
        <div class="goal-area">
            @foreach ($calendars as $calendar)
                @if ($calendar->user_id === Auth::user()->id)
                    <div class="item">
                        <h2>習慣の項目</h2>
                        <a href="{{ route('calendar.show', ['calendar' => $calendar->id]) }}">
                            <p>{{ $calendar->title }}</p>
                        </a>
                    </div>
                    <a href="{{ route('calendar.edit', ['calendar' => $calendar->id]) }}">
                        <div class="edit-button">
                            <button class="btn btn-secondary">修正</button>
                            </form>
                        </div>
                        <form action="{{ route('calendar.destroy', ['calendar' => $calendar->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="id" value="{{ $calendar->id }}">
                            <div class="delete-button">
                                <button class="btn btn-danger">削除</button>
                            </div>
                        </form>
                @endif
            @endforeach
        </div>
        <div class="create-calendar">
            <form action="{{ route('calendar.create') }}">
                <button class="btn btn-primary" type="submit">カレンダーを作成</button>
            </form>
        </div>
    </div>
@endsection
