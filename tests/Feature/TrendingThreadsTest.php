<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Redis;
use App\Trending;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TrendingThreadsTest extends TestCase
{
    use RefreshDatabase;

    protected $trending;

    protected function setUp()
    {
        parent::setUp();

        $this->trending = new Trending();

        $this->trending->reset(); //re-init the redis store each test run
    }

    /** @test */
    public function it_increments_a_threads_score_each_time_it_is_read()
    {
        $this->assertEmpty($this->trending->get());

        $thread = create('App\Thread');

        $this->get($thread->path());

        $this->assertCount(1, $trending = $this->trending->get());

        $this->assertEquals($thread->title, $trending[0]->title);
    }
}
