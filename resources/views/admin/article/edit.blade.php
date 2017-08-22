@extends('admin.layouts.main')

@section('style')
@endsection

@section('content_title')
    {{ trans('Admin\article.title') }}
@stop

@section('content')
    <div style="padding: 10px;">
        <div class="box-body table-responsive no-padding">
            <div class="col-sm-12">
            {{ Form::open(['route' => ['article.update', $article->id], 'id' => 'create-article-form', 'class' => 'form-horizontal', 'files' => true]) }}
                {{ method_field('PUT') }}
                @include('admin.article.elements')
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-3">
                            {{ Form::submit(trans('admin/article.button.save'), ['class' => 'btn btn-primary']) }}
                        </div>
                    </div>
                </div>
            {{ Form::close() }}

          </div>
        </div>
    </div>
@stop


@section('scripts')
    {{ Html::script('js/article.js') }}
@stop