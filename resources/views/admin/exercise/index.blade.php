@extends('layouts.exercisefront')
@section('content')
@section('title', '習慣の一覧')
    <section class="habits">
        <div class="habits__container">
            <h1 class="habits__content-title">習慣の一覧</h1>
            <div class="habits__inner">
                <div class="habits__items">
                    <a href="{{ route('exercise.create') }}" class="habits__item-link">
                        <div class="habits__item">
                            <p class="habits__item-name">新しい習慣を作成する</p>
                        </div>
                    </a>
                    @foreach ($exercises as $exercise)
                        <a href="{{ route('exercise.edit', ['exercise' => $exercise->id]) }}" class="habits__item-link">
                            <div class="habits__item">
                                <p class="habits__item-name">{{ $exercise->name }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="habits__btn">
                    <button onclick="history.back()" class="btn btn-primary">戻る</button>
                </div>
            </div>
        </div>
    </section>
@endsection
