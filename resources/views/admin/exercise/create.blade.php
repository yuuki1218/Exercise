@extends('layouts.calendarfront')
@section('content')
@section('title', '習慣の作成')
    <section class="habits">
        <div class="habits__container">
            <div class="habits__inner">
                <h1 class="habits__content-title">習慣の作成</h1>
            </div>
            <form action="{{ route('exercise.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="__create">
                    <div class="form-group">
                        <label for="name" class="item-name">習慣</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}">
                    </div>
                    <div class="__create-btn">
                        <input type="submit" class="btn btn-primary btn-lg" value="習慣の作成">
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
