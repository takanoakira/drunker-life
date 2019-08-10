@extends('layouts.app')

@php
    $title = '販売元詳細';
@endphp

@section('title', $title)

@section('content')
<div class="container">
    <h1>{{ $title }}</h1>

    {{-- 編集・削除ボタン --}}
    <div>
        <a href="{{ url('makers/'.$maker->id.'/edit') }}" class="btn btn-primary">
            {{ __('Edit') }}
        </a>
         @component('components.btn-del')
              @slot('table', 'makers')
              @slot('id', $maker->id)
         @endcomponent
        <a href="{{ url('makers/') }}" class="btn btn-secondary">
            {{ __('index') }}
        </a>
    </div>

    {{-- ユーザー1件の情報 --}}
    <dl class="row">
        <dt class="col-md-2">{{ __('ID') }}</dt>
        <dd class="col-md-10">{{ $maker->id}}</dd>
        <dt class="col-md-2">{{ __('販売元名') }}</dt>
        <dd class="col-md-10">{{ $maker->name }}</dd>
        <dt class="col-md-2">{{ __('都道府県') }}</dt>
        <dd class="col-md-10">{{ $maker->prefecture->description }}</dd>
        <dt class="col-md-2">{{ __('住所') }}</dt>
        <dd class="col-md-10">{{ $maker->addtess }}</dd>
        <dt class="col-md-2">{{ __('電話番号') }}</dt>
        <dd class="col-md-10">{{ $maker->phone_number }}</dd>
        <dt class="col-md-2">{{ __('販売元について説明') }}</dt>
        <dd class="col-md-10">{{ $maker->detail }}</dd>
        <dt class="col-md-2">{{ __('URL') }}</dt>
        <dd class="col-md-10">{{ $maker->url }}</dd>
    </dl>
</div>

@endsection
