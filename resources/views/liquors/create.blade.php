@php
    $title = __('Create Liquor');
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ url('liquors') }}" method="post">
        @csrf {{-- CSRF保護 --}}
        @method('POST') {{-- 疑似フォームメソッド --}}
        <div class="form-group">
            {{Form::label('name', __('Name'))}}
            {{Form::text('name', null,  ['class' => 'form-control', 'required', 'autofocus'])}}            
        </div>
        <div class="form-group">
            {{Form::label('maker_id', __('MakerId'))}}
            {{Form::select('maker_id', $makers)}}           
        </div>
        <div class="form-group">
            {{Form::label('price', __('Price'))}}
            {{Form::text('price', null,  ['class' => 'form-control', 'required'])}}            
        </div>
        <div class="form-group">
            {{Form::label('alcohol', __('Alcohol'))}}
            {{Form::text('alcohol', null,  ['class' => 'form-control', 'required'])}}            
        </div>
        <div class="form-group">
            {{Form::label('acidity', __('Acidity'))}}
            {{Form::text('acidity', null,  ['class' => 'form-control', 'required'])}}            
        </div>
        <div class="form-group">
            {{Form::label('liquor_score', __('LiquorScore'))}}
            {{Form::text('liquor_score', null,  ['class' => 'form-control', 'required'])}}            
        </div>
        <div class="form-group">
            <label for="production_area">{{ __('ProductionArea') }}</label>
            {{Form::select('production_area', \App\Enums\PrefectureCode::toSelectArray())}}            
        </div>
        <div class="form-group">
            {{Form::label('raw_rice', __('RawRice'))}}
            {{Form::text('raw_rice', null, ['class' => 'form-control', 'required'])}}
        </div>
        <div class="form-group">
            {{Form::label('milling_rate', __('MillingRate'))}}
            {{Form::text('milling_rate', null, ['class' => 'form-control', 'required'])}}
        </div>
        <div class="form-group">
            {{Form::label('detail', __('Detail'))}}
            {{Form::textarea('detail', null, ['class' => 'form-control', 'required'])}}
        </div>
        <button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        <a href="{{ url('liquors/') }}" class="btn btn-secondary">
            {{ __('index') }}
        </a>
    </form>
</div>
@endsection