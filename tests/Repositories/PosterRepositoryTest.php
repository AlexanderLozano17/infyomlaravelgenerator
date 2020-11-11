<?php namespace Tests\Repositories;

use App\Models\Poster;
use App\Repositories\PosterRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PosterRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PosterRepository
     */
    protected $posterRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->posterRepo = \App::make(PosterRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_poster()
    {
        $poster = factory(Poster::class)->make()->toArray();

        $createdPoster = $this->posterRepo->create($poster);

        $createdPoster = $createdPoster->toArray();
        $this->assertArrayHasKey('id', $createdPoster);
        $this->assertNotNull($createdPoster['id'], 'Created Poster must have id specified');
        $this->assertNotNull(Poster::find($createdPoster['id']), 'Poster with given id must be in DB');
        $this->assertModelData($poster, $createdPoster);
    }

    /**
     * @test read
     */
    public function test_read_poster()
    {
        $poster = factory(Poster::class)->create();

        $dbPoster = $this->posterRepo->find($poster->id);

        $dbPoster = $dbPoster->toArray();
        $this->assertModelData($poster->toArray(), $dbPoster);
    }

    /**
     * @test update
     */
    public function test_update_poster()
    {
        $poster = factory(Poster::class)->create();
        $fakePoster = factory(Poster::class)->make()->toArray();

        $updatedPoster = $this->posterRepo->update($fakePoster, $poster->id);

        $this->assertModelData($fakePoster, $updatedPoster->toArray());
        $dbPoster = $this->posterRepo->find($poster->id);
        $this->assertModelData($fakePoster, $dbPoster->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_poster()
    {
        $poster = factory(Poster::class)->create();

        $resp = $this->posterRepo->delete($poster->id);

        $this->assertTrue($resp);
        $this->assertNull(Poster::find($poster->id), 'Poster should not exist in DB');
    }
}
