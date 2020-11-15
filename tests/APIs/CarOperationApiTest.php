<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CarOperation;

class CarOperationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_car_operation()
    {
        $carOperation = factory(CarOperation::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/car_operations', $carOperation
        );

        $this->assertApiResponse($carOperation);
    }

    /**
     * @test
     */
    public function test_read_car_operation()
    {
        $carOperation = factory(CarOperation::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/car_operations/'.$carOperation->id
        );

        $this->assertApiResponse($carOperation->toArray());
    }

    /**
     * @test
     */
    public function test_update_car_operation()
    {
        $carOperation = factory(CarOperation::class)->create();
        $editedCarOperation = factory(CarOperation::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/car_operations/'.$carOperation->id,
            $editedCarOperation
        );

        $this->assertApiResponse($editedCarOperation);
    }

    /**
     * @test
     */
    public function test_delete_car_operation()
    {
        $carOperation = factory(CarOperation::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/car_operations/'.$carOperation->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/car_operations/'.$carOperation->id
        );

        $this->response->assertStatus(404);
    }
}
