@extends('admin.layouts.main')

@section('style')
@endsection

@section('content_title')
    {{ trans('Admin\service.title') }}
@stop

@section('content')
    <div style="padding: 10px;">
        <div class="box-body table-responsive no-padding">

            <table class="table table-hover table-striped table-bordered ">
                <thead>
                    <tr>
                      <th class="col-sm-1">ID</th>
                      <th>Ten</th>
                      <th>Image</th>
                      <th class="col-sm-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                @if($services)
                    @foreach($services as $key => $service)
                        <tr>
                          <td class="text-center">{{ $key + 1 }}</td>
                          <td>{{ $service->name }}</td>

                              <td class="text-center"><img src="{{ $service->imageUrls['normal'] }}" style="width: 100px;height: 100px;"></td>

                          <td class="text-center">
                            <a href="{{ action('Admin\ServicesController@edit', $service->id)}}" class=""><i class="fa fa-fw fa-pencil-square"></i></a>

                            <a href="" data-url="{{ action('Admin\ServicesController@destroy',$service->id)}}" class="delete-service"><i class="fa fa-fw fa-trash"> </i></a>
                          </td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="3">No data</td></tr>
                @endif
                </tbody>
            </table>
            <div id="url-redirect" data-url="{{ url()->current() }}"></div>
            {{ $services->links() }}
         {{ Form::open(['action' => ['Admin\ServicesController@index'],
        'id' => 'delete-service-form', 'class' => 'form-horizontal', 'files' => true]) }}
            {{ method_field('DELETE') }}
        {{ Form::close() }}
        </div>
    </div>
@stop


@section('scripts')
    {{ Html::script('js/service.js') }}
@stop