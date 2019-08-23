@extends('layouts.app')

@section('content')
<div class="container">
    <!--↓↓ 検索フォーム ↓↓-->
    <div class="col-md-3">   
        <form class="form" method="get">
            <div class="form-group">
                {{Form::label('keyword','キーワード')}}
                {{Form::text('keyword', null,  ['class' => 'form-control', 'autofocus','placeholder' => "お酒名か販売元名を入力"])}}
            </div>
            <div class="form-group">
                {{Form::label('production_area','産地')}}
                {{Form::select('production_area', (array('' => '--') + \App\Enums\PrefectureCode::toSelectArray()), $production_area)}}  
            </div>
            <div class="form-group">
                {{Form::label('graph','味')}}
                <label>酸度<input type="text" id="acidity" name="acidity" /></<label>
               
                <label>日本酒度<input type="text" id="liquor_score" name="liquor_score" /></label>
                
               
                <div id="map"><img id="click_map" src="/images/graph.png"  width="531" height="308" position="relative" />
                <img id="pointer" src="/images/pointer.png" > 
                </div>
                <script>
                    $(function() {
                        $("#click_map").on('click', function(e) {
                            var acidity_min = 0;
                            var acidity_max = 3.0;
                            var liquor_score_min = -30.0;
                            var liquor_score_max = 30.0;
                            var acidity = acidity_max - (acidity_max - acidity_min) * (e.offsetY / 308.0);
                            var liquor_score = liquor_score_min + (liquor_score_max - liquor_score_min) * (e.offsetX / 531.0);
                            
                            $("#acidity").val(acidity);
                            $("#liquor_score").val(liquor_score);
                            $('#pointer').css({top:(e.offsetY + 190),left:(e.offsetX + 10),
                             display:'block',position:'absolute'});
                            
                            console.log('酸度=' + acidity + '度');
                            console.log('日本酒度=' + liquor_score + '度');
                        });
                    });
                    
                   
                </script>
               
            </div>
            <div class="form-group">
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
                <div>
                    
                </div>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
        </div>
         <div>
            <a href="{{ url('liquors/create') }}" class="btn btn-success">
                {{ __('create') }}
            </a>
        </div>
        <div class="col-sm-8" style="text-align:right;">
            <div class="paginate">
                {{ $data->appends(Request::only('keyword'))->links() }}
            </div>
        </div>
</div>
@endsection
