<div class="col-sm-12">
    <div class="form-group required">
        {{ Form::label(
            'title',
            trans('admin/article.label.title'),
            ['class' => 'col-sm-3 control-label'])
        }}
        <div class="col-sm-8">
            {{ Form::text(
                'title',
                $article->content ?? '',
                [
                    'class' => 'form-control',
                    'required'
                ])
            }}
        </div>
    </div>
    <div class="form-group required">
        {{ Form::label(
            'content',
            trans('admin/article.label.content'),
            ['class' => 'col-sm-3 control-label'])
        }}
        <div class="col-sm-8">
            {{ Form::textarea(
                'content',
                $article->content ?? '',
                [
                    'class' => 'form-control',
                    'required'
                ])
            }}
        </div>
    </div>
</div>