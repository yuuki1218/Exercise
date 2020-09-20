@extends('layouts.calendarfront')
@section('content')
@section('title', '記録の編集')

    <section class="record-edit">
        <div class="record-edit__container">
            <form action="{{ route('record.update', ['record' => $record->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="date" id="date" value="{{ $date }}">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h1 class="record-edit__content-title">記録の編集</h1>
                <p class="record-edit__message">習慣は行いましたか？</p>
                <div class="record-edit__radio-button">
                    <div class="form-group">
                        <input type="radio" name="done" id="done" class="form-control" value="1"><label
                            for="done">完了</label>
                        <div class="record-edit__icon-star">
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="radio" name="done" id="failed" class="form-control" value="0"><label
                            for="failed">休憩</label>
                        <div class="record-edit__icon-times">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                </div>
                <div class="record-edit__submit-button">
                    <input type="submit" class="form-control" value="登録">
                </div>
            </form>
            <form action="{{ route('record.destroy', ['record' => $record->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('delete')
                <div class="form-group">
                    <div class="record-edit__delete-button">
                        <input type="submit" class="form-control" value="削除">
                    </div>
                </div>
            </form>
            <div class="record-edit__back-button">
                <a class="btn btn-primary" href="{{ route('calendar.show', ['calendar' => $record->calendar_id]) }}">戻る</a>
            </div>
        </div>
    </section>
@endsection
