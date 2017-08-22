<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\ImageService;
use Log;

class Service extends Model
{
    protected $table = 'services';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'image',
    ];

    // protected $appends = [
    //     'disabled_stop',
    // ];

    // public function articleLocales()
    // {
    //     return $this->hasMany(ArticleLocale::class);
    // }
    public function getImageUrlsAttribute()
    {
        $results = [];
        if ($this->image) {
            try {
                foreach (config('images.dimensions.service_image') as $key => $value) {
                    if ($key == 'original') {
                        $filePath = config('images.paths.service_image') . '/' . $this->id . '/' . $this->image;
                    } else {
                        $filePath = config('images.paths.service_image') . '/' . $this->id . '/' . $key . '_' .
                        $this->image;
                    }
                    $results[$key] = ImageService::imageUrl($filePath);
                }

                return $results;
            } catch (Exception $e) {
                Log::debug($e);
            }
        }

        foreach (config('images.dimensions.service_image') as $key => $value) {
            $results[$key] = null;
        }

        return $results;
    }
}
