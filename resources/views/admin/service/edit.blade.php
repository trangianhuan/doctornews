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
            {{ Form::open(['route' => ['service.update', $service->id], 'id' => 'create-service-form', 'class' => 'form-horizontal', 'files' => true]) }}
                {{ method_field('PUT') }}
                @include('admin.service.elements')
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            {{ Form::submit(trans('admin/service.button.save'), ['class' => 'btn btn-primary']) }}
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