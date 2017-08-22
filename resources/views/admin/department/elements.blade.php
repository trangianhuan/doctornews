<div class="col-sm-12">
    <div class="form-group required">
        {{ Form::label(
            'name',
            trans('admin/department.label.name'),
            ['class' => 'col-sm-2 control-label'])
        }}
        <div class="col-sm-8">
            {{ Form::text(
                'name',
                $department->name ?? '',
                [
                    'class' => 'form-control',
                    'required'
                ])
            }}
        </div>
    </div>
</div>