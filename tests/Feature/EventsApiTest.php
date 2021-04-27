<?php

namespace Tests\Feature;

use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventsApiTest extends TestCase
{

    use RefreshDatabase;


    /**
     * Test the list endpoint.
     *
     * @return void
     */
    public function testListEndpoint_withSeededData_expectTheCorrectCount()
    {
        Event::factory()->times(3)->create();

        $this->get(route('events.list'))
            ->assertStatus(200)
            ->assertJsonCount(3, 'data');
    }

    /**
     * Test the list endpoint with static data.
     *
     * @return void
     */
    public function testListEndpoint_withStaticData_expectCorrectDataReturned()
    {
        Event::factory()
            ->create(
                [
                    'eventName' => 'LSB 50KM Ultramarathon 2021',
                    'location' => 'Davao City, Davao',
                    'date' => '2021-04-04',
                ],

            );

            $this->get(route('events.list'))
            ->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment([
                'data' => [
                    [
                        'eventName' => 'LSB 50KM Ultramarathon 2021',
                        'location' => 'Davao City, Davao',
                        'date' => '2021-04-04',
                    ],
                ]
            ]);         
    }

    /**
     * Test the create endpoint validation.
     *
     * @return void
     */
    public function testCreateEndpoint_withInvalidData_expectValidationErrors()
    {
        $this->postJson(route('events.create'), [])
            ->assertJsonValidationErrors(['eventName', 'location', 'date', ]);

        $this->postJson(route('events.create'), [
            'eventName' => 'Cebu Marathon 2021',
            'location' => 'Cebu City, Cebu',
            'date' => 'ASDF',
        ])
            ->assertJsonValidationErrors(['date']);
    }

    /**
     * Test the create endpoint.
     *
     * @return void
     */
    public function testCreateEndpoint_withValidData_expectResource()
    {
        $this->postJson(route('events.create'), [
            'eventName' => 'Digos City to Davao City 2021',
            'location' => 'Davao City, Davao',
            'date' => '2021-03-20',
        ])
            ->assertStatus(201)
            ->assertJson([
                'data' => [
                    'eventName' => 'Digos City to Davao City 2021',
                    'location' => 'Davao City, Davao',
                    'date' => '2021-03-20',
                ]
            ]);
    }

    /**
     * Test the show endpoint with missing resource.
     *
     * @return void
     */
    public function testShowEndpoint_withMissingResource_expectPageNotFound()
    {
        $this->get(route('events.show', 2))
            ->assertNotFound();
    }

    /**
     * Test the show endpoint.
     *
     * @return void
     */
    public function testShowEndpoint_withCorrectRoute_expectResource()
    {
        $event = Event::factory()->create([
            'eventName' => 'Cebu Marathon 2021',
            'location' => 'Cebu City, Cebu',
            'date' => '2021-01-29',
        ]);

        $this->get(route('events.show', $event))
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'eventName' => 'Cebu Marathon 2021',
                    'location' => 'Cebu City, Cebu',
                    'date' => '2021-01-29',
                ]
            ]);
    }

    /**
     * Test the update endpoint validation.
     *
     * @return void
     */
    public function testUpdateEndpoint_withInvalidData_expectValidationErrors()
    {
        $this->putJson(route('events.update', 2))
            ->assertNotFound();

        $event = Event::factory()->create();

        $this->putJson(route('events.update', $event), [])
            ->assertJsonValidationErrors(['eventName', 'location', 'date']);

        $this->putJson(route('events.update', $event), [
            'eventName' => null,
            'location' => 'Panglao, Bohol',
            'date' => '2020-08-08',
        ])
            ->assertJsonValidationErrors(['eventName']);
    }

    /**
     * Test the update endpoint.
     *
     * @return void
     */
    public function testUpdateEndpoint_withValidData_expectResource()
    {
        $event = Event::factory()->create([
            'location' => 'Bohol',
        ]);

        $this->putJson(route('events.update', $event), [
            'eventName' => 'Loboc Eco Run 2020',
            'location' => 'Loboc, Bohol',
            'date' => '2020-06-30',
        ])
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'eventName' => 'Loboc Eco Run 2020',
                    'location' => 'Loboc, Bohol',
                    'date' => '2020-06-30',
                ]
            ]);
    }

    /**
     * Test the destroy endpoint validation.
     *
     * @return void
     */
    public function testDestroyEndpoint_withMissingResource_expectPageNotFound()
    {
        $this->deleteJson(route('events.destroy', 2))
            ->assertNotFound();
    }

    /**
     * Test the destroy endpoint.
     *
     * @return void
     */
    public function testDestroyEndpoint_withCorrectRoute_expectSuccessMessage()
    {
        $event = Event::factory()->create([
            'eventName' => '711 Run 2020',
            'location' => 'Cebu City, Cebu',
            'date' => '2020-02-02'
        ]);

        $this->deleteJson(route('events.destroy', $event))
            ->assertStatus(200);
    }

}
