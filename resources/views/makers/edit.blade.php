@php
    $title = __('Edit').': '.$maker->name;
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <form action="{{ url('makers/'.$maker->id) }}" method="post">
        @csrf
        @method('PUT')
         <div class="form-group">
            {{Form::label('name', __('Name'))}}
            {{Form::text('name', $maker->name, ['class' => 'form-control', 'required', 'autofocus'])}}
        </div>
        <div class="form-group">
            {{Form::label('prefecture', __('Prefecture'))}}
            {{Form::select('prefecture', \App\Enums\PrefectureCode::toSelectArray(), $maker->prefecture)}}            
        </div>
        <div class="form-group">
            {{Form::label('address', __('Address'))}}
            {{Form::text('address', $maker->address, ['class' => 'form-control', 'required'])}}
        </div>
        <div class="form-group">
            {{Form::label('phone_number', __('PhoneNunber'))}}
            {{Form::text('phone_number', $maker->phone_number, ['class' => 'form-control', 'required'])}}
        </div>
        <div class="form-group">
            {{Form::label('detail', __('Detail'))}}
            {{Form::textarea('detail', $maker->detail, ['class' => 'form-control', 'required'])}}
        </div>
        <div class="form-group">
            <label for="url">{{ __('Url') }}</label>
            <input id="url" type="text" class="form-control" name="url" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        <a href="{{ url('makers/') }}" class="btn btn-secondary">
            {{ __('index') }}
        </a>
    </form>
</div>
@endsection
