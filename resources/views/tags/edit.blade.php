@php
    $title = __('Edit').': '.$tag->name;
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <form action="{{ url('tags/'.$tag->id) }}" method="post">
        @csrf
        @method('PUT')
         <div class="form-group">
            {{Form::label('name', __('Name'))}}
            {{Form::text('name', $tag->name, ['class' => 'form-control', 'required', 'autofocus'])}}
        </div>
        <button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        <a href="{{ url('tags/') }}" class="btn btn-secondary">
            {{ __('index') }}
        </a>
    </form>
</div>
@endsection
