<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FavoritesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_can_not_favorite_anything()
    {
        $this->post('replies/1/favorites')
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function an_authenticated_user_can_favorite_any_reply()
    {
        $this->signIn();

        $reply = create('App\Reply');

        $this->post(route('replies.favorite', $reply->id));

        $this->assertCount(1, $reply->favorites);
    }

    /** @test */
    public function an_authenticated_user_can_unfavorite_any_reply()
    {
        $this->signIn();

        $reply = create('App\Reply');

        $reply->favorite();

        $this->delete(route('replies.unfavorite', $reply->id));

        $this->assertCount(0, $reply->favorites);
    }

    /** @test */
    public function an_authenticated_may_only_favorite_a_repy_once()
    {
        $this->signIn();

        $reply = create('App\Reply');

        try {
            $this->post(route('replies.favorite', $reply->id));
            $this->post(route('replies.favorite', $reply->id));
        } catch (\Exception $e) {
            $this->fail('Did not expect to insert the same record set twice.');
        }

        $this->assertCount(1, $reply->favorites);
    }
}
