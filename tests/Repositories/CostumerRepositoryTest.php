<?php namespace Tests\Repositories;

use App\Models\Costumer;
use App\Repositories\CostumerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CostumerRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CostumerRepository
     */
    protected $costumerRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->costumerRepo = \App::make(CostumerRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_costumer()
    {
        $costumer = factory(Costumer::class)->make()->toArray();

        $createdCostumer = $this->costumerRepo->create($costumer);

        $createdCostumer = $createdCostumer->toArray();
        $this->assertArrayHasKey('id', $createdCostumer);
        $this->assertNotNull($createdCostumer['id'], 'Created Costumer must have id specified');
        $this->assertNotNull(Costumer::find($createdCostumer['id']), 'Costumer with given id must be in DB');
        $this->assertModelData($costumer, $createdCostumer);
    }

    /**
     * @test read
     */
    public function test_read_costumer()
    {
        $costumer = factory(Costumer::class)->create();

        $dbCostumer = $this->costumerRepo->find($costumer->id);

        $dbCostumer = $dbCostumer->toArray();
        $this->assertModelData($costumer->toArray(), $dbCostumer);
    }

    /**
     * @test update
     */
    public function test_update_costumer()
    {
        $costumer = factory(Costumer::class)->create();
        $fakeCostumer = factory(Costumer::class)->make()->toArray();

        $updatedCostumer = $this->costumerRepo->update($fakeCostumer, $costumer->id);

        $this->assertModelData($fakeCostumer, $updatedCostumer->toArray());
        $dbCostumer = $this->costumerRepo->find($costumer->id);
        $this->assertModelData($fakeCostumer, $dbCostumer->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_costumer()
    {
        $costumer = factory(Costumer::class)->create();

        $resp = $this->costumerRepo->delete($costumer->id);

        $this->assertTrue($resp);
        $this->assertNull(Costumer::find($costumer->id), 'Costumer should not exist in DB');
    }
}
