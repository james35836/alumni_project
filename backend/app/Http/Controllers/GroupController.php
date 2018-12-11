<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Group;

class GroupController extends Controller
{
    public function index()
    {
        return Group::all();
    }

    public function show(Group $article)
    {
        return $article;
    }

    public function store(Request $request)
    {
        $article = Group::create($request->all());

        return response()->json($article, 201);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        return response()->json($article, 200);
    }

    public function delete(Group $article)
    {
        $article->delete();

        return response()->json(null, 204);
    }
}
