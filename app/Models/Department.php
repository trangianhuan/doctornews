<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'person_charge',
    ];

    // protected $appends = [
    //     'disabled_stop',
    // ];

    // public function articleLocales()
    // {
    //     return $this->hasMany(ArticleLocale::class);
    // }
}
