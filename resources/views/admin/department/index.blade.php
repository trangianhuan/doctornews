@extends('admin.layouts.main')

@section('style')
@endsection

@section('content_title')
    {{ trans('Admin\department.title') }}
@stop

@section('content')
    <div style="padding: 10px;">
        <div class="box-body table-responsive no-padding">

            <table class="table table-hover table-striped table-bordered ">
                <thead>
                    <tr>
                      <th class="col-sm-1">ID</th>
                      <th>Ten</th>
                      <th class="col-sm-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                @if($departments)
                    @foreach($departments as $key => $department)
                        <tr>
                          <td class="text-center">{{ $key + 1 }}</td>
                          <td>{{ $department->name }}</td>
                          <td class="text-center">
                            <a href="{{ action('Admin\DepartmentsController@edit', $department->id)}}" class=""><i class="fa fa-fw fa-pencil-square"></i></a>

                            <a href="" data-url="{{ action('Admin\DepartmentsController@destroy',$department->id)}}" class="delete-department"><i class="fa fa-fw fa-trash"> </i></a>
                          </td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="3">No data</td></tr>
                @endif
                </tbody>
            </table>
            <div id="url-redirect" data-url="{{ url()->current() }}"></div>
            {{ $departments->links() }}
         {{ Form::open(['action' => ['Admin\DepartmentsController@index'],
        'id' => 'delete-department-form', 'class' => 'form-horizontal', 'files' => true]) }}
            {{ method_field('DELETE') }}
        {{ Form::close() }}
        </div>
    </div>
@stop


@section('scripts')
    {{ Html::script('js/department.js') }}
@stop