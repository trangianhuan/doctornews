<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'content',
        'title',
    ];

    // protected $appends = [
    //     'disabled_stop',
    // ];

    // public function articleLocales()
    // {
    //     return $this->hasMany(ArticleLocale::class);
    // }
}
