@extends('layouts.app')

@php
    $title = 'お酒詳細';
@endphp

@section('title', $title)

@section('content')
<div class="container">
    <h1>{{ $title }}</h1>

    {{-- 編集・削除ボタン --}}
    <div>
        <a href="{{ url('liquors/'.$liquor->id.'/edit') }}" class="btn btn-primary">
            {{ __('Edit') }}
        </a>
         @component('components.btn-del')
              @slot('table', 'liquors')
              @slot('id', $liquor->id)
         @endcomponent
    </div>

    {{-- ユーザー1件の情報 --}}
    <dl class="row">
        <dt class="col-md-2">{{ __('ID') }}</dt>
        <dd class="col-md-10">{{ $liquor->id}}</dd>
        <dt class="col-md-2">{{ __('お酒名') }}</dt>
        <dd class="col-md-10">{{ $liquor->name }}</dd>
        <dt class="col-md-2">{{ __('蔵元ID') }}</dt>
        <dd class="col-md-10">{{ $liquor->maker_id }}</dd>
        <dt class="col-md-2">{{ __('価格') }}</dt>
        <dd class="col-md-10">{{ $liquor->price."円" }}</dd>
        <dt class="col-md-2">{{ __('アルコール度数') }}</dt>
        <dd class="col-md-10">{{ $liquor->alcohol."度" }}</dd>
        <dt class="col-md-2">{{ __('酸度') }}</dt>
        <dd class="col-md-10">{{ $liquor->acidity."度" }}</dd>
        <dt class="col-md-2">{{ __('日本酒度') }}</dt>
        <dd class="col-md-10">{{ $liquor->liquor_score."度" }}</dd>
        <dt class="col-md-2">{{ __('産地') }}</dt>
        <dd class="col-md-10">{{ $liquor->production_area->description }}</dd>
        <dt class="col-md-2">{{ __('原料米') }}</dt>
        <dd class="col-md-10">{{ $liquor->raw_rice }}</dd>
        <dt class="col-md-2">{{ __('精米歩合') }}</dt>
        <dd class="col-md-10">{{ $liquor->milling_rate."%" }}</dd>
        <dt class="col-md-2">{{ __('説明文') }}</dt>
        <dd class="col-md-10">{{ $liquor->detail}}</dd>
    </dl>
</div>
@endsection
