<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;
use App\Services\Admin\ServiceService;

class ServicesController extends Controller
{
    public function __construct(ServiceService $serviceService) {
        $this->serviceService = $serviceService;
    }

    public function index()
    {
        $services = $this->serviceService->listservice();

        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();

        $id = $this->serviceService->create($inputs);
        if ($id) {
            return redirect()->action('Admin\ServicesController@index')
                ->with(['message' => trans('admin/service.create_success')]);
        }

        return redirect()->back()->withErrors(['errors' => trans('admin/service.create_error')]);
    }

    public function edit($id)
    {
        $service = $this->serviceService->find($id);
        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->all();

        if ($this->serviceService->update($inputs, $id)) {
            return redirect()->action('Admin\ServicesController@index')
                ->with(['message' => trans('admin/service.update_success')]);
        }

        return redirect()->back()->withErrors(['errors' => trans('admin/service.update_error')]);
    }

    public function destroy($id)
    {
        $response = [
            'status' => false,
            'message' => trans('admin/service.delete_error'),
        ];
        $rs = $this->serviceService->delete($id);

        if ($rs) {
            return redirect()->action('Admin\ServicesController@index')
                ->with(['message' => trans('admin/service.delete_success')]);
        }
        return redirect()->action('Admin\ServicesController@index')
                ->withErrors(['errors' => trans('admin/service.service_not_exist')]);
    }
}
