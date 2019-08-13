@extends('layouts.app')

@section('content')
<div class="container">
    <!--↓↓ 検索フォーム ↓↓-->
    <div class="col-md-3">   
        <form class="form-inline" method="get">
            <div class="form-group">
                {{Form::label('keyword','キーワード')}}
                {{Form::text('keyword', null,  ['class' => 'form-control', 'autofocus','placeholder' => "お酒名か販売元名を入力"])}}
                {{Form::label('production_area','産地')}}
                {{Form::select('production_area', (array('' => '--') + \App\Enums\PrefectureCode::toSelectArray()), $production_area)}}  
                <input type="submit" value="検索" >
            </div>
        </form>
    </div>
    <!--↑↑ 検索フォーム ↑↑-->
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>お酒名</th>
                    <th>産地</th>
                    <th>販売元名</th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($liquors as $liquor)
                    <tr>
                        <td><a href="{{ url('liquors/'.$liquor->id) }}">{{ $liquor->name }}</a></td>
                        <td>{{ $liquor->production_area->description }}</td>
                        <td><a href="{{ url('liquors/'.$liquor->maker_id) }}">{{ $liquor->maker->name }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
