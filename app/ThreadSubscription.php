<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\ThreadWasUpdated;

class ThreadSubscription extends Model
{
    /**
     * don't auto apply mass assignment protection
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * a thread subscription belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * a thread subscription belongs to a thread
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    /**
     * notify all subscribed users thread was updated.
     *
     * @param array $reply
     * @return void
     */
    public function notify($reply)
    {
        $this->user->notify(new ThreadWasUpdated($this->thread, $reply));
    }
}
