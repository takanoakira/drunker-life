@extends('layouts.app')

@php
    $title = 'タグ一覧';
@endphp

@section('title', $title)

@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>タグ</th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td><a href="{{ url('tags/'.$tag->id) }}">{{ $tag->name }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <a href="{{ url('tags/create') }}" class="btn btn-success">
            {{ __('create') }}
        </a>
    </div>
     <div class="col-sm-8" style="text-align:right;">
        <div class="paginate">
            {{ $tags->links() }}
        </div>
    </div>
</div>
</div>

@endsection

