<div class="content-wrapper" style="min-height: 1126px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    @if ($errors->any() || session()->has('message') || session()->has('error'))
        <div class="alert" id="alert-message">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            @foreach ($errors->all() as $message)
                <p>{{ $message }}</p>
            @endforeach
            @if (session()->has('message'))
                <p>{{ session('message') }}</p>
            @endif
            @if (session()->has('error'))
                <p>{{ session('error') }}</p>
            @endif
        </div>
    @endif
      <h1>
        @yield('content_title')
        <!-- <small>it all starts here</small> -->
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
    <!-- Default box -->
      <div class="box">
        <!-- <div class="box-header with-border">
          <h3 class="box-title">@yield('content_title')</h3>
        </div> -->
          @yield('content')
        <!-- /.box-body -->
        <div class="box-footer" style="display: none;">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>