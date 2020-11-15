<?php

namespace App\Http\Controllers;

use App\DataTables\CarDriveDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCarDriveRequest;
use App\Http\Requests\UpdateCarDriveRequest;
use App\Repositories\CarDriveRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Car;
use App\Models\Person;
use Response;

class CarDriveController extends AppBaseController
{
    /** @var  CarDriveRepository */
    private $carDriveRepository;
    private $persons;
    private $cars;

    public function __construct(CarDriveRepository $carDriveRepo)
    {
        $this->carDriveRepository = $carDriveRepo;
        $this->persons = new Person;
        $this->cars = new Car;
    }

    /**
     * Display a listing of the CarDrive.
     *
     * @param CarDriveDataTable $carDriveDataTable
     * @return Response
     */
    public function index(CarDriveDataTable $carDriveDataTable)
    {
        return $carDriveDataTable->render('car_drives.index');
    }

    /**
     * Show the form for creating a new CarDrive.
     *
     * @return Response
     */
    public function create()
    {

        $cars =  $this->cars::all();
        $persons =  $this->persons->getDataPerson();
        return view('car_drives.create', compact('cars', 'persons'));
    }

    /**
     * Store a newly created CarDrive in storage.
     *
     * @param CreateCarDriveRequest $request
     *
     * @return Response
     */
    public function store(CreateCarDriveRequest $request)
    {
        $input = $request->all();

        $carDrive = $this->carDriveRepository->create($input);

        Flash::success('Car Drive saved successfully.');

        return redirect(route('carDrives.index'));
    }

    /**
     * Display the specified CarDrive.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $carDrive = $this->carDriveRepository->getDataCarDriver($id);
        
        if (empty($carDrive)) {
            Flash::error('Car Drive not found');

            return redirect(route('carDrives.index'));
        }

        return view('car_drives.show')->with('carDrive', $carDrive);
    }

    /**
     * Show the form for editing the specified CarDrive.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $carDrive = $this->carDriveRepository->find($id);

        if (empty($carDrive)) {
            Flash::error('Car Drive not found');

            return redirect(route('carDrives.index'));
        }

        $cars =  $this->cars::all();
        $persons =  $this->persons->getDataPerson();
        return view('car_drives.edit', compact('carDrive', 'cars', 'persons'));
    }

    /**
     * Update the specified CarDrive in storage.
     *
     * @param  int              $id
     * @param UpdateCarDriveRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarDriveRequest $request)
    {
        $carDrive = $this->carDriveRepository->find($id);

        if (empty($carDrive)) {
            Flash::error('Car Drive not found');

            return redirect(route('carDrives.index'));
        }

        $carDrive = $this->carDriveRepository->update($request->all(), $id);

        Flash::success('Car Drive updated successfully.');

        return redirect(route('carDrives.index'));
    }

    /**
     * Remove the specified CarDrive from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $carDrive = $this->carDriveRepository->find($id);

        if (empty($carDrive)) {
            Flash::error('Car Drive not found');

            return redirect(route('carDrives.index'));
        }

        $this->carDriveRepository->delete($id);

        Flash::success('Car Drive deleted successfully.');

        return redirect(route('carDrives.index'));
    }
}
