<?php

namespace App\Services\Admin;

use App\Models\Department;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Validator;
use DB;

class TeamService
{
    public static function listDepartment()
    {
        $departments = Department::paginate(5);

        return $departments;
    }

    public static function listCategoryLocale($localeID)
    {
        $categories = Category::where('locale_id', $localeID)->get();

        return $categories;
    }

    public static function update($inputs, $id)
    {
        try {
            $department = Department::find($id);
            if ($department) {
                return $department->update([
                        'name' => $inputs['name']
                    ]);
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
            $department = new Department();
            $department->name = $inputs['name'];
            $department->save();
            DB::commit();

            return $department->id;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e);

            return false;
        }
    }

    public function find($id)
    {
        return Department::find($id);
    }

    public function delete($id)
    {
        $department = Department::find($id);
        if ($department) {
            return $department->delete();
        }
        Log::error("department doesn't exist");

        return false;
    }
}
