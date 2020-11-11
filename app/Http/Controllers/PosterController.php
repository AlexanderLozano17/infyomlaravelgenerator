<?php

namespace App\Http\Controllers;

use App\DataTables\PosterDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePosterRequest;
use App\Http\Requests\UpdatePosterRequest;
use App\Repositories\PosterRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PosterController extends AppBaseController
{
    /** @var  PosterRepository */
    private $posterRepository;

    public function __construct(PosterRepository $posterRepo)
    {
        $this->posterRepository = $posterRepo;
    }

    /**
     * Display a listing of the Poster.
     *
     * @param PosterDataTable $posterDataTable
     * @return Response
     */
    public function index(PosterDataTable $posterDataTable)
    {
        return $posterDataTable->render('posters.index');
    }

    /**
     * Show the form for creating a new Poster.
     *
     * @return Response
     */
    public function create()
    {
        return view('posters.create');
    }

    /**
     * Store a newly created Poster in storage.
     *
     * @param CreatePosterRequest $request
     *
     * @return Response
     */
    public function store(CreatePosterRequest $request)
    {
        $input = $request->all();

        $poster = $this->posterRepository->create($input);

        Flash::success('Poster saved successfully.');

        return redirect(route('posters.index'));
    }

    /**
     * Display the specified Poster.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $poster = $this->posterRepository->find($id);

        if (empty($poster)) {
            Flash::error('Poster not found');

            return redirect(route('posters.index'));
        }

        return view('posters.show')->with('poster', $poster);
    }

    /**
     * Show the form for editing the specified Poster.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $poster = $this->posterRepository->find($id);

        if (empty($poster)) {
            Flash::error('Poster not found');

            return redirect(route('posters.index'));
        }

        return view('posters.edit')->with('poster', $poster);
    }

    /**
     * Update the specified Poster in storage.
     *
     * @param  int              $id
     * @param UpdatePosterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePosterRequest $request)
    {
        $poster = $this->posterRepository->find($id);

        if (empty($poster)) {
            Flash::error('Poster not found');

            return redirect(route('posters.index'));
        }

        $poster = $this->posterRepository->update($request->all(), $id);

        Flash::success('Poster updated successfully.');

        return redirect(route('posters.index'));
    }

    /**
     * Remove the specified Poster from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $poster = $this->posterRepository->find($id);

        if (empty($poster)) {
            Flash::error('Poster not found');

            return redirect(route('posters.index'));
        }

        $this->posterRepository->delete($id);

        Flash::success('Poster deleted successfully.');

        return redirect(route('posters.index'));
    }
}
