<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Costumer;

class CostumerApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_costumer()
    {
        $costumer = factory(Costumer::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/costumers', $costumer
        );

        $this->assertApiResponse($costumer);
    }

    /**
     * @test
     */
    public function test_read_costumer()
    {
        $costumer = factory(Costumer::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/costumers/'.$costumer->id
        );

        $this->assertApiResponse($costumer->toArray());
    }

    /**
     * @test
     */
    public function test_update_costumer()
    {
        $costumer = factory(Costumer::class)->create();
        $editedCostumer = factory(Costumer::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/costumers/'.$costumer->id,
            $editedCostumer
        );

        $this->assertApiResponse($editedCostumer);
    }

    /**
     * @test
     */
    public function test_delete_costumer()
    {
        $costumer = factory(Costumer::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/costumers/'.$costumer->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/costumers/'.$costumer->id
        );

        $this->response->assertStatus(404);
    }
}
