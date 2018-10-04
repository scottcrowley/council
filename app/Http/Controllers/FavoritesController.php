<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Reputation;

class FavoritesController extends Controller
{
    /**
     * create a new controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * store a new favorite in the database
     *
     * @param Reply $reply
     * @return void
     */
    public function store(Reply $reply)
    {
        $reply->favorite();

        Reputation::gain($reply->owner, Reputation::REPLY_FAVORITED);
    }

    /**
     * delete the favorite from the database
     *
     * @param Reply $reply
     * @return void
     */
    public function destroy(Reply $reply)
    {
        $reply->unfavorite();

        Reputation::lose($reply->owner, Reputation::REPLY_FAVORITED);
    }
}
