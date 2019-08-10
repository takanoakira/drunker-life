@php
    $title = __('Edit').': '.$liquor->name;
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
    <form action="{{ url('liquors/'.$liquor->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            {{Form::label('name', __('Name'))}}
            {{Form::text('name', $liquor->name,  ['class' => 'form-control', 'required', 'autofocus'])}}            
        </div>
        <div class="form-group">
            {{Form::label('maker_id', __('MakerId'))}}
          {{Form::select('maker_id', \App\Maker::pluck('name','id'), $liquor->maker_id)}}           
        </div>
        <div class="form-group">
            {{Form::label('price', __('Price'))}}
            {{Form::text('price', $liquor->price,  ['class' => 'form-control', 'required'])}}            
        </div>
        <div class="form-group">
            {{Form::label('alcohol', __('Alcohol'))}}
            {{Form::text('alcohol', $liquor->alcohol,  ['class' => 'form-control', 'required'])}}            
        </div>
        <div class="form-group">
            {{Form::label('acidity', __('Acidity'))}}
            {{Form::text('acidity', $liquor->acidity,  ['class' => 'form-control', 'required'])}}            
        </div>
        <div class="form-group">
            {{Form::label('liquor_score', __('LiquorScore'))}}
            {{Form::text('liquor_score',  $liquor->liquor_score,  ['class' => 'form-control', 'required'])}}            
        </div>
        <div class="form-group">
            <label for="production_area">{{ __('ProductionArea') }}</label>
            {{Form::select('production_area', \App\Enums\PrefectureCode::toSelectArray(), $liquor->production_area)}}            
        </div>
        <div class="form-group">
            {{Form::label('raw_rice', __('RawRice'))}}
            {{Form::text('raw_rice', $liquor->raw_rice, ['class' => 'form-control', 'required'])}}
        </div>
        <div class="form-group">
            {{Form::label('milling_rate', __('MillingRate'))}}
            {{Form::text('milling_rate',$liquor->milling_rate, ['class' => 'form-control', 'required'])}}
        </div>
        <div class="form-group">
            {{Form::label('detail', __('Detail'))}}
            {{Form::textarea('detail', $liquor->detail, ['class' => 'form-control', 'required'])}}
        </div>
        <button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        <a href="{{ url('liquors/') }}" class="btn btn-secondary">
            {{ __('index') }}
        </a>
    </form>
</div>
@endsection
