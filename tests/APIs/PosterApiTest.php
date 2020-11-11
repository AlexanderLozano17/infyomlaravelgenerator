<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Poster;

class PosterApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_poster()
    {
        $poster = factory(Poster::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/posters', $poster
        );

        $this->assertApiResponse($poster);
    }

    /**
     * @test
     */
    public function test_read_poster()
    {
        $poster = factory(Poster::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/posters/'.$poster->id
        );

        $this->assertApiResponse($poster->toArray());
    }

    /**
     * @test
     */
    public function test_update_poster()
    {
        $poster = factory(Poster::class)->create();
        $editedPoster = factory(Poster::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/posters/'.$poster->id,
            $editedPoster
        );

        $this->assertApiResponse($editedPoster);
    }

    /**
     * @test
     */
    public function test_delete_poster()
    {
        $poster = factory(Poster::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/posters/'.$poster->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/posters/'.$poster->id
        );

        $this->response->assertStatus(404);
    }
}
