@extends('layouts.calendarfront')
@section('content')
@section('title', '記録の編集')

    <!-- 記録入力フォーム -->
    <form action="{{ route('record.update', ['record' => $record->id]) }}" method="POST" enctype="multipart/form-data">
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
                        <div class="submit-button">
                            <input type="submit" class="form-control submit" value="登録">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
    <form action="{{ route('record.destroy', ['record' => $record->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('delete')
        <div class="col-md-2">
            <div class="form-group">
                <div class="delete-button">
                    <input type="submit" class="form-control submit" value="削除
                                        ">
                </div>
            </div>
        </div>
    </form>
    <div class="col-md-2">
        <div class="form-group">
            <div class="back-button">
                <a class="btn btn-primary" href="{{ route('calendar.show', ['calendar' => $record->calendar_id]) }}">戻る</a>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $("#date").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });

    </script>
@endsection
