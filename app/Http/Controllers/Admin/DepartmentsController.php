<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;
use App\Services\Admin\DepartmentService;
use Log;
use Session;

class DepartmentsController extends Controller
{
    public function __construct(DepartmentService $departmentService) {
        $this->departmentService = $departmentService;
    }

    public function index()
    {
        $departments = $this->departmentService->listDepartment();
        //dd($departments);
        return view('admin.department.index', compact('departments'));
    }

    public function create()
    {
        return view('admin.department.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();

        $id = $this->departmentService->create($inputs);
        if ($id) {
            return redirect()->action('Admin\DepartmentsController@index')
                ->with(['message' => trans('admin/department.create_success')]);
        }

        return redirect()->back()->withErrors(['errors' => trans('admin/department.create_error')]);
    }

    public function edit($id)
    {
        $department = $this->departmentService->find($id);
        return view('admin.department.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->all();

        if ($this->departmentService->update($inputs, $id)) {
            return redirect()->action('Admin\DepartmentsController@index')
                ->with(['message' => trans('admin/department.update_success')]);
        }

        return redirect()->back()->withErrors(['errors' => trans('admin/department.update_error')]);
    }

    public function destroy($id)
    {
        Log::debug('id='.$id);

        $response = [
            'status' => false,
            'message' => trans('admin/department.delete_error'),
        ];
        $rs = $this->departmentService->delete($id);

        if ($rs) {
            return redirect()->action('Admin\DepartmentsController@index')
                ->with(['message' => trans('admin/department.delete_success')]);
        }
        return redirect()->action('Admin\DepartmentsController@index')
                ->withErrors(['errors' => trans('admin/department.department_not_exist')]);

        //ajax
        // if ($rs) {
        //     $response = [
        //         'status' => true,
        //         'message' => trans('admin/department.delete_error'),
        //     ];
        //     Session::flash('message', trans('admin/category.delete_success'));
        // } else {
        //     Session::flash('error', trans('admin/category.delete_error'));
        // }
        // return response()->json($response);

    }
}
