<?php

namespace LaravelSocial\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use LaravelSocial\User;

class SearchController extends Controller
{

    public function users(){

        $search_phrase = Input::get('q');
        $search_results = User::where('firstName', 'like', '%' . $search_phrase . '%')->paginate(6);
        $search_results = User::where('lastName', 'like', '%' . $search_phrase . '%')->paginate(6);

        return view('search.users', compact('search_results', 'search_phrase'));

//        var_dump($search_results);

    }

}
