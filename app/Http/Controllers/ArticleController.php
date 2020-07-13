<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Resources\Article as ArticleResource;
use App\Http\Resources\ArticleCollection;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Collection;

class ArticleController extends Controller
{
    public function index() {
        return new ArticleCollection(Article::paginate());
    } public function show(Article  $article) {
        return new ArticleResource($article);
    } public function store(Request $request) {
        $article=Article::create($request->all());
        return response()->json($article, 201);
    } public function update(Request $request, Article $article) {
        $article->update($request->all());
        return response()->json($article,200);
    } public function delete(Article $article) {
        $article->delete();
        return reponse()->json(null,204);
    }
}
