@extends('admin.layouts.main')

@section('style')
@endsection

@section('content_title')
    {{ trans('Admin\service.title') }}
@stop

@section('content')
    <div style="padding: 10px;">
        <div class="box-body table-responsive no-padding">
            <div class="col-sm-12">
          {{ Form::open(['action' => 'Admin\ServicesController@store', 'id' => 'create-service-form', 'class' => 'form-horizontal', 'files' => true]) }}
            @include('admin.service.elements')
            <div class="col-sm-12">
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            {{ Form::submit(trans('admin/service.button.save'), ['class' => 'btn btn-primary']) }}
                        </div>

                        <div class="col-sm-2 ">
                            <a href="#" data-confirm="{{ trans('admin/service.cancel_confirm') }}" data-url="{{ action('Admin\ServicesController@index') }}" class="cancel btn-primary btn">{{ trans('admin/service.button.cancel') }}</a>
                        </div>
                    </div>
            </div>
            {{ Form::close() }}
          </div>
        </div>
    </div>
@stop


@section('scripts')
    {{ Html::script('js/service.js') }}
@stop