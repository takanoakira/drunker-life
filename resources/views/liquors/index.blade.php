@extends('layouts.app')

@php
    $title = 'お酒一覧';
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
                    <th>お酒名</th>
                    <th>販売元</th>
                    <th>産地</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($liquors as $liquor)
                    <tr>
                        <td>{{ $liquor->id }}</td>
                        <td><a href="{{ url('liquors/'.$liquor->id) }}">{{ $liquor->name }}</a></td>
                        <td>{{ $liquor->maker->name }}</td>
                        <td>{{ $liquor->production_area->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <a href="{{ url('liquors/create') }}" class="btn btn-success">
            {{ __('create') }}
        </a>
    </div>
</div>
@endsection

