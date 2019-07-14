@extends('layouts.app')

@php
    $title = '販売元一覧';
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
                    <th>販売元名</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($makers as $maker)
                    <tr>
                        <td>{{ $maker->id }}</td>
                        <td><a href="{{ url('makers/'.$maker->id) }}">{{ $maker->name }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

