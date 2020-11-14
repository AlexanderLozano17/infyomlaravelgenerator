<?php

namespace App\Http\Controllers;

use App\DataTables\PersonDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Repositories\PersonRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PersonController extends AppBaseController
{
    /** @var  PersonRepository */
    private $personRepository;

    public function __construct(PersonRepository $personRepo)
    {
        $this->personRepository = $personRepo;
    }

    /**
     * Display a listing of the Person.
     *
     * @param PersonDataTable $personDataTable
     * @return Response
     */
    public function index(PersonDataTable $personDataTable)
    {
        return $personDataTable->render('people.index');
    }

    /**
     * Show the form for creating a new Person.
     *
     * @return Response
     */
    public function create()
    {
        return view('people.create');
    }

    /**
     * Store a newly created Person in storage.
     *
     * @param CreatePersonRequest $request
     *
     * @return Response
     */
    public function store(CreatePersonRequest $request)
    {
        $input = $request->all();

        $person = $this->personRepository->create($input);

        Flash::success('Person saved successfully.');

        return redirect(route('people.index'));
    }

    /**
     * Display the specified Person.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $person = $this->personRepository->find($id);

        if (empty($person)) {
            Flash::error('Person not found');

            return redirect(route('people.index'));
        }

        return view('people.show')->with('person', $person);
    }

    /**
     * Show the form for editing the specified Person.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $person = $this->personRepository->find($id);

        if (empty($person)) {
            Flash::error('Person not found');

            return redirect(route('people.index'));
        }

        return view('people.edit')->with('person', $person);
    }

    /**
     * Update the specified Person in storage.
     *
     * @param  int              $id
     * @param UpdatePersonRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonRequest $request)
    {
        $person = $this->personRepository->find($id);

        if (empty($person)) {
            Flash::error('Person not found');

            return redirect(route('people.index'));
        }

        $person = $this->personRepository->update($request->all(), $id);

        Flash::success('Person updated successfully.');

        return redirect(route('people.index'));
    }

    /**
     * Remove the specified Person from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $person = $this->personRepository->find($id);

        if (empty($person)) {
            Flash::error('Person not found');

            return redirect(route('people.index'));
        }

        $this->personRepository->delete($id);

        Flash::success('Person deleted successfully.');

        return redirect(route('people.index'));
    }
}
