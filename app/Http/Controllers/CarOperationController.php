<?php

namespace App\Http\Controllers;

use App\DataTables\CarOperationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCarOperationRequest;
use App\Http\Requests\UpdateCarOperationRequest;
use App\Repositories\CarOperationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Car;
use App\Models\Operation;
use App\Models\Person;
use Response;

class CarOperationController extends AppBaseController
{
    /** @var  CarOperationRepository */
    private $carOperationRepository;
    private $operations;
    private $cars;

    public function __construct(CarOperationRepository $carOperationRepo)
    {
        $this->carOperationRepository = $carOperationRepo;
        $this->operations = new Operation;;
        $this->cars = new Car;
    }

    /**
     * Display a listing of the CarOperation.
     *
     * @param CarOperationDataTable $carOperationDataTable
     * @return Response
     */
    public function index(CarOperationDataTable $carOperationDataTable)
    {
        return $carOperationDataTable->render('car_operations.index');
    }

    /**
     * Show the form for creating a new CarOperation.
     *
     * @return Response
     */
    public function create()
    {
        $cars = $this->cars::all();
        $operations = $this->operations::all();

        return view('car_operations.create', compact('cars', 'operations'));
    }

    /**
     * Store a newly created CarOperation in storage.
     *
     * @param CreateCarOperationRequest $request
     *
     * @return Response
     */
    public function store(CreateCarOperationRequest $request)
    {
        $input = $request->all();

        $carOperation = $this->carOperationRepository->create($input);

        Flash::success('Car Operation saved successfully.');

        return redirect(route('carOperations.index'));
    }

    /**
     * Display the specified CarOperation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $carOperation = $this->carOperationRepository->find($id);

        if (empty($carOperation)) {
            Flash::error('Car Operation not found');

            return redirect(route('carOperations.index'));
        }

        return view('car_operations.show')->with('carOperation', $carOperation);
    }

    /**
     * Show the form for editing the specified CarOperation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $carOperation = $this->carOperationRepository->find($id);

        if (empty($carOperation)) {
            Flash::error('Car Operation not found');

            return redirect(route('carOperations.index'));
        }

        $cars = $this->cars::all();
        $operations = $this->operations::all();

        return view('car_operations.edit', compact('cars', 'operations', 'carOperation'));
    }

    /**
     * Update the specified CarOperation in storage.
     *
     * @param  int              $id
     * @param UpdateCarOperationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarOperationRequest $request)
    {
        $carOperation = $this->carOperationRepository->find($id);

        if (empty($carOperation)) {
            Flash::error('Car Operation not found');

            return redirect(route('carOperations.index'));
        }

        $carOperation = $this->carOperationRepository->update($request->all(), $id);

        Flash::success('Car Operation updated successfully.');

        return redirect(route('carOperations.index'));
    }

    /**
     * Remove the specified CarOperation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $carOperation = $this->carOperationRepository->find($id);

        if (empty($carOperation)) {
            Flash::error('Car Operation not found');

            return redirect(route('carOperations.index'));
        }

        $this->carOperationRepository->delete($id);

        Flash::success('Car Operation deleted successfully.');

        return redirect(route('carOperations.index'));
    }
}
