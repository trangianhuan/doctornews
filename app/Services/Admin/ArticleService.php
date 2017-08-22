<?php

namespace App\Services\Admin;

use App\Models\article;
use Illuminate\Support\Facades\Log;
use Validator;
use DB;

class ArticleService
{
    public static function listarticle()
    {
        $articles = Article::paginate(5);

        return $articles;
    }

    public static function update($inputs, $id)
    {
        try {
            $article = Article::find($id);
            if ($article) {
                return $article->update([
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
            $article = new Article();
            $article->title = $inputs['title'];
            $article->content = $inputs['content'];
            $article->save();
            DB::commit();

            return $article->id;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e);

            return false;
        }
    }

    public function find($id)
    {
        return Article::find($id);
    }

    public function delete($id)
    {
        $article = Article::find($id);
        if ($article) {
            return $article->delete();
        }
        Log::error("article doesn't exist");

        return false;
    }
}
