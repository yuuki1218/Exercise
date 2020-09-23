@extends('layouts.exercisefront')
@section('content')
@section('title', '習慣名の編集')
    <section class="habits">
        <div class="habits__container">
            <div class="habits__inner">
                <h1 class="habits__content-title">Taskの編集</h1>
            </div>
        </div>
        <div class="habits-create">
            <div class="habits-create__container">
                <form action="{{ route('exercise.update', ['exercise' => $exercise->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="habits-create__form">
                        <div class="form-group">
                            <label for="name" class="habits-create__item-name">Task</label>
                            <input class="habits-create__text-form" type="text" name="name" id="name"
                                value="{{ $exercise->name }}">
                        </div>
                        <div class="habits-create__btn-inner">
                            <div class="habits-create__edit-btn">
                                <input type="submit" class="btn btn-secondary btn-lg" value="編集">
                            </div>

                            <form action="{{ route('exercise.destroy', ['exercise' => $exercise->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{ $exercise->id }}">
                                <div class="habits-create__delete-btn">
                                    <button class="btn btn-danger">削除</button>
                                </div>
                        </div>
                        <div class="habits__btn">
                            <a href="{{ route('exercise.index') }}" class="btn btn-primary">戻る</a>
                        </div>
                </form>
            </div>
            </form>
        </div>
    </section>
@endsection
