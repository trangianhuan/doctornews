<div class="col-sm-12">
    <div class="form-group required">
        {{ Form::label(
            'name',
            trans('admin/service.label.name'),
            ['class' => 'col-sm-3 control-label'])
        }}
        <div class="col-sm-8">
            {{ Form::text(
                'name',
                $service->name ?? '',
                [
                    'class' => 'form-control',
                    'required'
                ])
            }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label(
            'image',
            trans('admin/service.label.img'),
            ['class' => 'col-sm-3 control-label'])
        }}
        <div class="col-sm-9">
            {{ Form::file('image', null, ['class' => 'form-control'])}}
        </div>
    </div>
</div>