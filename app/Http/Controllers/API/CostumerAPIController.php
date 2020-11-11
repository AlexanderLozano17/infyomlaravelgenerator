<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCostumerAPIRequest;
use App\Http\Requests\API\UpdateCostumerAPIRequest;
use App\Models\Costumer;
use App\Repositories\CostumerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CostumerController
 * @package App\Http\Controllers\API
 */

class CostumerAPIController extends AppBaseController
{
    /** @var  CostumerRepository */
    private $costumerRepository;

    public function __construct(CostumerRepository $costumerRepo)
    {
        $this->costumerRepository = $costumerRepo;
    }

    /**
     * Display a listing of the Costumer.
     * GET|HEAD /costumers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $costumers = $this->costumerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($costumers->toArray(), 'Costumers retrieved successfully');
    }

    /**
     * Store a newly created Costumer in storage.
     * POST /costumers
     *
     * @param CreateCostumerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCostumerAPIRequest $request)
    {
        $input = $request->all();

        $costumer = $this->costumerRepository->create($input);

        return $this->sendResponse($costumer->toArray(), 'Costumer saved successfully');
    }

    /**
     * Display the specified Costumer.
     * GET|HEAD /costumers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Costumer $costumer */
        $costumer = $this->costumerRepository->find($id);

        if (empty($costumer)) {
            return $this->sendError('Costumer not found');
        }

        return $this->sendResponse($costumer->toArray(), 'Costumer retrieved successfully');
    }

    /**
     * Update the specified Costumer in storage.
     * PUT/PATCH /costumers/{id}
     *
     * @param int $id
     * @param UpdateCostumerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCostumerAPIRequest $request)
    {
        $input = $request->all();

        /** @var Costumer $costumer */
        $costumer = $this->costumerRepository->find($id);

        if (empty($costumer)) {
            return $this->sendError('Costumer not found');
        }

        $costumer = $this->costumerRepository->update($input, $id);

        return $this->sendResponse($costumer->toArray(), 'Costumer updated successfully');
    }

    /**
     * Remove the specified Costumer from storage.
     * DELETE /costumers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Costumer $costumer */
        $costumer = $this->costumerRepository->find($id);

        if (empty($costumer)) {
            return $this->sendError('Costumer not found');
        }

        $costumer->delete();

        return $this->sendSuccess('Costumer deleted successfully');
    }
}
