<?php

namespace App\Http\Controllers;

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

        if ($search = $request->search) {
            $results = Article::search($search)->paginate(5);
            $results->appends('query', null);
        }

        return view('search', [
            'results' => $results,
        ]);
    }
}
