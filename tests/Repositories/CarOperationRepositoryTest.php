<?php namespace Tests\Repositories;

use App\Models\CarOperation;
use App\Repositories\CarOperationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CarOperationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CarOperationRepository
     */
    protected $carOperationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->carOperationRepo = \App::make(CarOperationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_car_operation()
    {
        $carOperation = factory(CarOperation::class)->make()->toArray();

        $createdCarOperation = $this->carOperationRepo->create($carOperation);

        $createdCarOperation = $createdCarOperation->toArray();
        $this->assertArrayHasKey('id', $createdCarOperation);
        $this->assertNotNull($createdCarOperation['id'], 'Created CarOperation must have id specified');
        $this->assertNotNull(CarOperation::find($createdCarOperation['id']), 'CarOperation with given id must be in DB');
        $this->assertModelData($carOperation, $createdCarOperation);
    }

    /**
     * @test read
     */
    public function test_read_car_operation()
    {
        $carOperation = factory(CarOperation::class)->create();

        $dbCarOperation = $this->carOperationRepo->find($carOperation->id);

        $dbCarOperation = $dbCarOperation->toArray();
        $this->assertModelData($carOperation->toArray(), $dbCarOperation);
    }

    /**
     * @test update
     */
    public function test_update_car_operation()
    {
        $carOperation = factory(CarOperation::class)->create();
        $fakeCarOperation = factory(CarOperation::class)->make()->toArray();

        $updatedCarOperation = $this->carOperationRepo->update($fakeCarOperation, $carOperation->id);

        $this->assertModelData($fakeCarOperation, $updatedCarOperation->toArray());
        $dbCarOperation = $this->carOperationRepo->find($carOperation->id);
        $this->assertModelData($fakeCarOperation, $dbCarOperation->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_car_operation()
    {
        $carOperation = factory(CarOperation::class)->create();

        $resp = $this->carOperationRepo->delete($carOperation->id);

        $this->assertTrue($resp);
        $this->assertNull(CarOperation::find($carOperation->id), 'CarOperation should not exist in DB');
    }
}
