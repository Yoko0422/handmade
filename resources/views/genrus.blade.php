@extends('layout')

@section('title', 'パーツ一覧')

@section('content')

<div class="container main">
    
        <h2>分類名一覧</h2>
        <p>　</p>
        
        <div class="row">
            <div class="offset-sm-2 col-sm-8">  
        
                <table>
                    <tr>
                        <td width=50% class="align-baseline">
                            <table class="table table-sm table-hover">
                                @foreach ($genrus as $genru)
                                @if($genru->user_id === $login_user_id)
                                    <tr>
                                        <td class="align-top">
                                        {{$genru->name}}
                                    </td>
                                    <td>
                                        @if($genru->name == '未分類')
                    
                                        @else
                                        <a href="{{ action('GenruController@update', ['id' => $genru->id]) }}" class="badge badge-info" target="genruedit">編集</a>
                                        <a href="{{ action('GenruController@delete', ['id' => $genru->id]) }}" class="badge badge-info btn-dell-genru">削除</a>
                                        @endif
                                    </td>
                                    </tr>
                                @endif
                                @endforeach
                            </table>
                        </td>
                        
                        <td>
                            <div>　</div>
                        </td>
                        
                        <td>
                            <iframe src="" width="400" height="400" name="genruedit" frameborder="1"> </iframe>
                        </td>
                    </tr>
                </table>
            
            </div>
        </div>
        
</div>
</div>

@endsection