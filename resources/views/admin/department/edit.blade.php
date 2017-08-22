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
            {{ Form::open(['route' => ['department.update', $department->id], 'id' => 'create-department-form', 'class' => 'form-horizontal', 'files' => true]) }}
                {{ method_field('PUT') }}
                @include('admin.department.elements')
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            {{ Form::submit(trans('admin/department.button.save'), ['class' => 'btn btn-primary']) }}
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