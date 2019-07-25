@php
    $title = __('Create Maker');
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <form action="{{ url('makers') }}" method="post">
        @csrf {{-- CSRF保護 --}}
        @method('POST') {{-- 疑似フォームメソッド --}}
        <div class="form-group">
            {{Form::label('name', __('Name'))}}
            {{Form::text('name', null,  ['class' => 'form-control', 'required', 'autofocus'])}}            
        </div>
        <div class="form-group">
            <form method='POST' action='/test'>
            <label for="prefecture">{{ __('Prefecture') }}</label>
            {{Form::select('prefecture', \App\Enums\PrefectureCode::toSelectArray())}}            
        </div>
        <div class="form-group">
            {{Form::label('address', __('Address'))}}
            {{Form::text('address', null, ['class' => 'form-control', 'required'])}}
        </div>
        <div class="form-group">
            {{Form::label('phone_number', __('PhoneNunber'))}}
            {{Form::text('phone_number', null, ['class' => 'form-control', 'required'])}}
        </div>
        <div class="form-group">
            {{Form::label('detail', __('Detail'))}}
            {{Form::textarea('detail', null, ['class' => 'form-control', 'required'])}}
        </div>
        <div class="form-group">
            <label for="url">{{ __('Url') }}</label>
            <input id="url" type="text" class="form-control" name="url" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </form>
</div>
@endsection