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
          {{ Form::open(['action' => 'Admin\ArticlesController@store', 'id' => 'create-article-form', 'class' => 'form-horizontal', 'files' => true]) }}
            @include('admin.article.elements')
            <div class="col-sm-12">
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-3">
                            {{ Form::submit(trans('admin/article.button.save'), ['class' => 'btn btn-primary']) }}
                        </div>

                        <div class="col-sm-2 ">
                            <a href="#" data-confirm="{{ trans('admin/article.cancel_confirm') }}" data-url="{{ action('Admin\ArticlesController@index') }}" class="cancel btn-primary btn">{{ trans('admin/article.button.cancel') }}</a>
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