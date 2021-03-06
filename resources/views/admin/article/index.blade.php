@extends('admin.layouts.main')

@section('style')
@endsection

@section('content_title')
    {{ trans('Admin\article.title') }}
@stop

@section('content')
    <div style="padding: 10px;">
        <div class="box-body table-responsive no-padding">

            <table class="table table-hover table-striped table-bordered ">
                <thead>
                    <tr>
                      <th class="col-sm-1">ID</th>
                      <th>Title</th>
                      <th>Content</th>
                      <th class="col-sm-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                @if($articles)
                    @foreach($articles as $key => $article)
                        <tr>
                          <td class="text-center">{{ $key + 1 }}</td>
                          <td>{{ $article->title }}</td>

                          <td>{{ $article->content }}</td>

                          <td class="text-center">
                            <a href="{{ action('Admin\ArticlesController@edit', $article->id)}}" class=""><i class="fa fa-fw fa-pencil-square"></i></a>

                            <a href="" data-url="{{ action('Admin\ArticlesController@destroy',$article->id)}}" class="delete-article"><i class="fa fa-fw fa-trash"> </i></a>
                          </td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="3">No data</td></tr>
                @endif
                </tbody>
            </table>
            <div id="url-redirect" data-url="{{ url()->current() }}"></div>
            {{ $articles->links() }}
         {{ Form::open(['action' => ['Admin\ArticlesController@index'],
        'id' => 'delete-article-form', 'class' => 'form-horizontal', 'files' => true]) }}
            {{ method_field('DELETE') }}
        {{ Form::close() }}
        </div>
    </div>
@stop


@section('scripts')
    {{ Html::script('js/article.js') }}
@stop