<?php

namespace App\Http\Controllers;

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

        if ($request->search) {
            $results = collect();
        }

        return view('search', [
            'results' => $results,
        ]);
    }
}
