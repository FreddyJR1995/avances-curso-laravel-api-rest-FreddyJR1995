<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Resources\Article as ArticleResource;
use App\Http\Resources\ArticleCollection;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Collection;

class ArticleController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es necesario',
        'body_required' => 'El body no es válido',

    ];

    public function index()
    {
        return new ArticleCollection(Article::paginate(10));
    }

    public function show(Article $article)
    {
        return response()->json(new ArticleResource($article),200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:articles|max:255',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
        ], self::$messages);

        $article = Article::create($request->all());
        return response()->json($article, 201);
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|unique:articles,title,'.$article->id.'|max:255',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
        ], self::$messages);

        $article->update($request->all());
        return response()->json($article, 200);
    }

    public function delete(Article $article)
    {
        $article->delete();
        return reponse()->json(null, 204);
    }
}
