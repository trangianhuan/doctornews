<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;
use App\Services\Admin\ArticleService;

class ArticlesController extends Controller
{
    public function __construct(ArticleService $articleService) {
        $this->articleService = $articleService;
    }

    public function index()
    {
        $articles = $this->articleService->listarticle();

        return view('admin.article.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();

        $id = $this->articleService->create($inputs);
        if ($id) {
            return redirect()->action('Admin\ArticlesController@index')
                ->with(['message' => trans('admin/article.create_success')]);
        }

        return redirect()->back()->withErrors(['errors' => trans('admin/article.create_error')]);
    }

    public function edit($id)
    {
        $article = $this->articleService->find($id);
        return view('admin.article.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->all();

        if ($this->articleService->update($inputs, $id)) {
            return redirect()->action('Admin\ArticlesController@index')
                ->with(['message' => trans('admin/article.update_success')]);
        }

        return redirect()->back()->withErrors(['errors' => trans('admin/article.update_error')]);
    }

    public function destroy($id)
    {
        $response = [
            'status' => false,
            'message' => trans('admin/article.delete_error'),
        ];
        $rs = $this->articleService->delete($id);

        if ($rs) {
            return redirect()->action('Admin\ArticlesController@index')
                ->with(['message' => trans('admin/article.delete_success')]);
        }

        return redirect()->action('Admin\ArticlesController@index')
                ->withErrors(['errors' => trans('admin/article.article_not_exist')]);
    }
}
