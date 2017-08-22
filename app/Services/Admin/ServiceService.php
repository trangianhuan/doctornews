<?php

namespace App\Services\Admin;

use App\Models\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Services\ImageService;
use Validator;
use DB;

class ServiceService
{
    public static function listService()
    {
        $services = service::paginate(5);

        return $services;
    }

    public static function update($inputs, $id)
    {
        try {
            $service = Service::find($id);
            if ($service) {
                $image = '';
                if (isset($inputs['image'])) {
                    $imagePath = config('images.paths.service_image') . '/' . $service->id;
                    if ($service->image) {
                        ImageService::delete($imagePath);
                    }
                    $image = ImageService::uploadFile($inputs['image'], 'service_image', $imagePath);
                    if ($image) {
                        return $service->update([
                            'name' => $inputs['name'],
                            'image' => $image,
                        ]);
                    }
                } else {
                    return $service->update([
                        'name' => $inputs['name'],
                    ]);
                }
            }

            return false;
        } catch (\Exception $e) {
            Log::error($e);

            return false;
        }
    }

    public static function create($inputs)
    {
        DB::beginTransaction();
        try {

            $service = new Service();
            $service->name = $inputs['name'];
            $service->save();
            if (isset($inputs['image'])) {

                $imagePath = config('images.paths.service_image') . '/' . $service->id;
                $image = ImageService::uploadFile($inputs['image'], 'service_image', $imagePath);
                if ($image) {
                    $service->update([
                        'image' => $image,
                    ]);
                } else {
                    DB::rollback();

                    return false;
                }
            }


            DB::commit();

            return $service->id;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e);

            return false;
        }
    }

    public function find($id)
    {
        return service::find($id);
    }

    public function delete($id)
    {
        $service = Service::find($id);
        if ($service) {
            return $service->delete();
        }
        Log::error("service doesn't exist");

        return false;
    }
}
