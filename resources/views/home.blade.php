@extends('layouts.app')

@section('content')
<div class="container">
    <!--↓↓ 検索フォーム ↓↓-->
    <div class="col-md-3">   
        <form class="form" method="get">
            <div class="form-group">
                {{Form::label('keyword','キーワード')}}
                {{Form::text('keyword', isset($keyword) ? $keyword : '',  ['class' => 'form-control', 'autofocus','placeholder' => "お酒名か販売元名を入力"])}}
              
            </div>
            <div class="form-group">
                {{Form::label('production_area','産地')}}
                {{Form::select('production_area', (array('' => '--') + \App\Enums\PrefectureCode::toSelectArray()), $production_area)}}  
            </div>
            <div class="form-group">
                {{Form::label('graph','味')}}
                <label>酸度<input type="text" id="acidity" name="acidity" readonly="readonly" value="@if (isset($acidity)) {{$acidity}} @endif"/></<label>
               
                <label>日本酒度<input type="text" id="liquor_score" name="liquor_score" readonly="readonly" value="@if (isset($liquor_score)) {{$liquor_score}} @endif" /></label>
                
               
                <div id="map" style="cursor: pointer; overflow:hidden; position:relative; width:531px; height:308px; background-image: url('/images/graph.png')">
                    <img id="pointer" src="/images/pointer.png" style="display:none; position: absolute;"> 
                </div>
                <script>
                    $(function() {
                        const acidity_min = 0;
                        const acidity_max = 3.0;
                        const liquor_score_min = -30.0;
                        const liquor_score_max = 30.0;
                        const image_width = 531.0;
                        const image_height = 308.0;
                        
                        const acidity = {{ isset($acidity) ? $acidity : 'null' }};
                        const liquor_score = {{ isset($liquor_score) ? $liquor_score : 'null' }};
                        
                        if (acidity != null && liquor_score != null) {
                            const pos_y = image_height - ((acidity - acidity_min) / (acidity_max - acidity_min)) * image_height;
                            const pos_x = ((liquor_score - liquor_score_min) / (liquor_score_max - liquor_score_min)) * image_width;
                            $('#pointer').css({top: pos_y - 9, left: pos_x - 9, display: 'block'})
                            console.log('pos_y' + pos_y);
                            console.log('pos_x' + pos_x);
                        }
                        
                        $("#map").on('click', function(e) {
                            var acidity = acidity_max - (acidity_max - acidity_min) * (e.offsetY / image_height);
                            var liquor_score = liquor_score_min + (liquor_score_max - liquor_score_min) * (e.offsetX / image_width);
                            
                            $("#acidity").val(acidity);
                            $("#liquor_score").val(liquor_score);
                            $('#pointer').css({top:(e.offsetY - 9),left:(e.offsetX - 9), display: 'block'});
                            
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
