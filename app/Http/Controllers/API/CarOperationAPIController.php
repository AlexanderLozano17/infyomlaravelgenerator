<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCarOperationAPIRequest;
use App\Http\Requests\API\UpdateCarOperationAPIRequest;
use App\Models\CarOperation;
use App\Repositories\CarOperationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CarOperationController
 * @package App\Http\Controllers\API
 */

class CarOperationAPIController extends AppBaseController
{
    /** @var  CarOperationRepository */
    private $carOperationRepository;

    public function __construct(CarOperationRepository $carOperationRepo)
    {
        $this->carOperationRepository = $carOperationRepo;
    }

    /**
     * Display a listing of the CarOperation.
     * GET|HEAD /carOperations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $carOperations = $this->carOperationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($carOperations->toArray(), 'Car Operations retrieved successfully');
    }

    /**
     * Store a newly created CarOperation in storage.
     * POST /carOperations
     *
     * @param CreateCarOperationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCarOperationAPIRequest $request)
    {
        $input = $request->all();

        $carOperation = $this->carOperationRepository->create($input);

        return $this->sendResponse($carOperation->toArray(), 'Car Operation saved successfully');
    }

    /**
     * Display the specified CarOperation.
     * GET|HEAD /carOperations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CarOperation $carOperation */
        $carOperation = $this->carOperationRepository->find($id);

        if (empty($carOperation)) {
            return $this->sendError('Car Operation not found');
        }

        return $this->sendResponse($carOperation->toArray(), 'Car Operation retrieved successfully');
    }

    /**
     * Update the specified CarOperation in storage.
     * PUT/PATCH /carOperations/{id}
     *
     * @param int $id
     * @param UpdateCarOperationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarOperationAPIRequest $request)
    {
        $input = $request->all();

        /** @var CarOperation $carOperation */
        $carOperation = $this->carOperationRepository->find($id);

        if (empty($carOperation)) {
            return $this->sendError('Car Operation not found');
        }

        $carOperation = $this->carOperationRepository->update($input, $id);

        return $this->sendResponse($carOperation->toArray(), 'CarOperation updated successfully');
    }

    /**
     * Remove the specified CarOperation from storage.
     * DELETE /carOperations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CarOperation $carOperation */
        $carOperation = $this->carOperationRepository->find($id);

        if (empty($carOperation)) {
            return $this->sendError('Car Operation not found');
        }

        $carOperation->delete();

        return $this->sendSuccess('Car Operation deleted successfully');
    }
}
