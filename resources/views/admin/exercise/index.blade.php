@extends('layouts.exercisefront')
@section('content')
@section('title', '習慣の一覧')
    <section class="habits">
        <div class="habits__container">
            <h1 class="habits__content-title">Task一覧</h1>
            <div class="habits__inner">
                <div class="habits__items">
                    <a href="{{ route('exercise.create') }}" class="habits__item-link">
                        <div class="habits__item">
                            <p class="habits__item-name">新しい習慣を作成する</p>
                        </div>
                    </a>
                    @foreach ($exercises as $exercise)
                        @if ($exercise->user_id === Auth::user()->id)
                            <a href="{{ route('exercise.edit', ['exercise' => $exercise->id]) }}" class="habits__item-link">
                                <div class="habits__item">
                                    <p class="habits__item-name">{{ $exercise->name }}</p>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="habits__btn">
                    <form action="{{ route('calendar.create.exercise', ['userId' => Auth::user()->id]) }}">
                        <button class="btn btn-primary btn-lg" type="submit">戻る</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
