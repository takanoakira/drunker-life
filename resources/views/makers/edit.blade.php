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
            <label for="name">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control" name="name" required autofocus>
        </div>
        <div class="form-group">
            <form method='POST' action='/test'>
            <label for="prefecture">{{ __('Prefecture') }}</label>
            <select name='prefecture'>
            <option value='prefecture'>{{ __('Prefecture') }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="address">{{ __('Address') }}</label>
            <input id="address" type="text" class="form-control" name="address" required>
        </div>
        <div class="form-group">
            <label for="phone_number">{{ __('PhoneNunber') }}</label>
            <input id="phone_number" type="text" class="form-control" name="phone_number" required>
        </div>
        <div class="form-group">
            <label for="datail">{{ __('Detail') }}</label>
            <textarea name="datail" rows="4" cols="40">販売元の説明文を記載。</textarea>
        </div>
        <div class="form-group">
            <label for="url">{{ __('Url') }}</label>
            <input id="url" type="text" class="form-control" name="url" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </form>
</div>
@endsection
