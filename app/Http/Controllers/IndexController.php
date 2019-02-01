<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $users = User::all();
        $articles = Article::all();
        return view('index', [
            'users' => $users,
            'articles' => $articles
        ]);
    }

    public function currentUser($nickname)
    {
        $currentUser = User::where('nickname', $nickname)->first();
        $users = User::all();
        $articles = Article::all();
        return view ('index', [
            'users' => $users,
            'currentUser' => $currentUser,
            'articles' => $articles
        ]);
    }
}
