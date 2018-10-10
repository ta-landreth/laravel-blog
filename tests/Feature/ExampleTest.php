<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

//Traits
use Illuminate\Foundation\Testing\DatabaseMigrations;       //run migrations and rolling back after test
use Illuminate\Foundation\Testing\DatabaseTransactions;     //run tests through transactions

use Carbon\Carbon;

class ExampleTest extends TestCase
{

    use DatabaseTransactions;
    //      For all the test methods below, it will add records, then when finished
    //      will ROLL BACK the transaction.  UNDO!

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testArchives()
    {
        //Given
        /* When I have 2 Post records in DB that are 1 month apart */
        $first = factory(Post::class)->create([
            'created_at' => Carbon::now()->subMonth()
        ]);
        $second = factory(Post::class)->create();

        //When
        /* When I fetch the archives */
        $archives = Post::archives();

        //Then
        /* Then the response is returned in correct format */
        $this->assertCount(2, $archives);

        //More specific test to identify what you added is what is returned
        $this->assertEquals(
            [
                [
                  "year" => $second->created_at->format('Y'),        //created_at is an instance of Carbon
                  "month" => $second->created_at->format('F'),
                  "published" => 1,
                ],
                [
                  "year" => $first->created_at->format('Y'),        //created_at is an instance of Carbon
                  "month" => $first->created_at->format('F'),
                  "published" => 1,
                ],
            ], $archives);

    }
}
