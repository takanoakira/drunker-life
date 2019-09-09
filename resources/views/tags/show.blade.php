@extends('layouts.app')

@php
    $title = 'タグ詳細';
@endphp

@section('title', $title)

@section('content')
<div class="container">
    <h1>{{ $title }}</h1>

    {{-- 編集・削除ボタン --}}
    <div>
        <a href="{{ url('tags/'.$tag->id.'/edit') }}" class="btn btn-primary">
            {{ __('Edit') }}
        </a>
         @component('components.btn-del')
              @slot('table', 'tags')
              @slot('id', $tag->id)
         @endcomponent
        <a href="{{ url('tags/') }}" class="btn btn-secondary">
            {{ __('index') }}
        </a>
        <a href="{{ url('tags/create') }}" class="btn btn-success">
            {{ __('create') }}
        </a>
    </div>

    {{-- ユーザー1件の情報 --}}
    <dl class="row">
        <dt class="col-md-2">{{ __('ID') }}</dt>
        <dd class="col-md-10">{{ $tag->id}}</dd>
        <dt class="col-md-2">{{ __('タグ名') }}</dt>
        <dd class="col-md-10">{{ $tag->name}}</dd>
    </dl>
</div>

@endsection
