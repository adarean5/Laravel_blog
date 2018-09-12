<?php

namespace Tests\Unit;

use App\Post;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    // Reverts the database after running tests
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // GIVEN i have two records in the database that are posts, and each one is posted a month apart.
        $first = factory(Post::class)->create();
        $second = factory(Post::class)->create([
            'created_at' => \Carbon\Carbon::now()->subMonth()
        ]);

        // WHEN i fetch the archives.
        // This will fetch archives from our blog database, but we want to have a separate database for testing
        // Create a new database blog_testing and go to phpunit.xml
        // Add line <env name="DB_DATABASE" value="blog_testing"/>
        // change DB_DATABASE in .env from blog to blog_testing and run a migration
        $posts = Post::archives();

        // THEN the response should be in the proper format.
        //$this->assertCount(2, $posts);
        $this->assertEquals([
           [
               'year' => $first->created_at->format('Y'),
               'month' => $first->created_at->format('F'),
               'published' => 1
           ],
            [
                'year' => $second->created_at->format('Y'),
                'month' => $second->created_at->format('F'),
                'published' => 1
            ]
        ], $posts);
    }
}
