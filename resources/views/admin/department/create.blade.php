@extends('admin.layouts.main')

@section('style')
@endsection

@section('content_title')
    {{ trans('Admin\department.title') }}
@stop

@section('content')
    <div style="padding: 10px;">
        <div class="box-body table-responsive no-padding">
            <div class="col-sm-12">
          {{ Form::open(['action' => 'Admin\DepartmentsController@store', 'id' => 'create-department-form', 'class' => 'form-horizontal', 'files' => true]) }}
            @include('admin.department.elements')
            <div class="col-sm-12">
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            {{ Form::submit(trans('admin/department.button.save'), ['class' => 'btn btn-primary']) }}
                        </div>

                        <div class="col-sm-2 ">
                            <a href="#" data-confirm="{{ trans('admin/department.cancel_confirm') }}" data-url="{{ action('Admin\DepartmentsController@index') }}" class="cancel btn-primary btn">{{ trans('admin/department.button.cancel') }}</a>
                        </div>
                    </div>
            </div>
            {{ Form::close() }}
          </div>
        </div>
    </div>
@stop


@section('scripts')
    {{ Html::script('js/department.js') }}
@stop