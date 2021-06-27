<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke(Request $request)
    {
        $results = null;

        $users = User::get();

        if ($search = $request->search) {
            $results = Article::search($search, function ($meilisearch, $search, $options) use ($request) {
                if ($userId = $request->user_id) {
                    $options['filters'] = 'user_id=' . $userId;
                }
                return $meilisearch->search($search, $options);
            })->paginate(5)->withQueryString();
            $results->appends('query', null);
        }

        return view('search', [
            'users' => $users,
            'results' => $results,
        ]);
    }
}
