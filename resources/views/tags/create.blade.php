@php
    $title = __('Create Tag');
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <form action="{{ url('tags') }}" method="post">
        @csrf {{-- CSRF保護 --}}
        @method('POST') {{-- 疑似フォームメソッド --}}
        <div class="form-group">
            {{Form::label('name', __('Name'))}}
            {{Form::text('name', null,  ['class' => 'form-control', 'required', 'autofocus'])}}            
        </div>
        <button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        <a href="{{ url('tags/') }}" class="btn btn-secondary">
            {{ __('index') }}
        </a>
    </form>
</div>
@endsection