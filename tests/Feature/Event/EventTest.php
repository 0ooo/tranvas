<?php

namespace Tests\Feature\Event;

use App\Models\Event\Event;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventTest extends TestCase
{
    use DatabaseMigrations;
    
    private $user;
    private $event;

    protected function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->event = factory(Event::class)->create();
    }

    /** @test */
    public function a_guest_should_not_see_event_section()
    {
        $this->get(route('events.index'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function a_user_can_see_list_of_events()
    {
        $this->actingAs($this->user)
             ->get(route('events.index'))
             ->assertStatus(200)
             ->assertSeeText($this->event->title)
             ->assertSeeText($this->event->description);
    }

    /** @test */
    public function a_user_can_view_details()
    {
        $this->actingAs($this->user)
            ->get(route('events.show', $this->event->id))
            ->assertStatus(200)
            ->assertSeeText($this->event->title)
            ->assertSeeText($this->event->creator->name);
    }
}
