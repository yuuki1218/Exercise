@extends('layouts.exercisefront')
@section('content')
@section('title', '習慣の作成')
    <section class="habits">
        <div class="habits__container">
            <h1 class="habits__content-title">習慣の作成</h1>
        </div>
        <div class="habits-create">
            <div class="habits-create__container">
                <form action="{{ route('exercise.store') }}" method="POST" enctype="multipart/form-data">
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
                    <div class="habits-create__form">
                        <div class="form-group">
                            <label for="name" class="habits-create__item-name">習慣</label>
                            <input class="habits-create__text-form" type="text" name="name" id="name"
                                value="{{ old('name') }}">
                        </div>
                        <div class="habits-create__create-btn">
                            <input type="submit" class="btn btn-primary btn-lg" value="習慣の作成">
                        </div>
                        <div class="habits__btn">
                            <a href="{{ route('exercise.index') }}" class="btn btn-primary">戻る</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
