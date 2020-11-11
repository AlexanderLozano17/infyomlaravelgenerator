<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePosterAPIRequest;
use App\Http\Requests\API\UpdatePosterAPIRequest;
use App\Models\Poster;
use App\Repositories\PosterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PosterController
 * @package App\Http\Controllers\API
 */

class PosterAPIController extends AppBaseController
{
    /** @var  PosterRepository */
    private $posterRepository;

    public function __construct(PosterRepository $posterRepo)
    {
        $this->posterRepository = $posterRepo;
    }

    /**
     * Display a listing of the Poster.
     * GET|HEAD /posters
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $posters = $this->posterRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($posters->toArray(), 'Posters retrieved successfully');
    }

    /**
     * Store a newly created Poster in storage.
     * POST /posters
     *
     * @param CreatePosterAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePosterAPIRequest $request)
    {
        $input = $request->all();

        $poster = $this->posterRepository->create($input);

        return $this->sendResponse($poster->toArray(), 'Poster saved successfully');
    }

    /**
     * Display the specified Poster.
     * GET|HEAD /posters/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Poster $poster */
        $poster = $this->posterRepository->find($id);

        if (empty($poster)) {
            return $this->sendError('Poster not found');
        }

        return $this->sendResponse($poster->toArray(), 'Poster retrieved successfully');
    }

    /**
     * Update the specified Poster in storage.
     * PUT/PATCH /posters/{id}
     *
     * @param int $id
     * @param UpdatePosterAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePosterAPIRequest $request)
    {
        $input = $request->all();

        /** @var Poster $poster */
        $poster = $this->posterRepository->find($id);

        if (empty($poster)) {
            return $this->sendError('Poster not found');
        }

        $poster = $this->posterRepository->update($input, $id);

        return $this->sendResponse($poster->toArray(), 'Poster updated successfully');
    }

    /**
     * Remove the specified Poster from storage.
     * DELETE /posters/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Poster $poster */
        $poster = $this->posterRepository->find($id);

        if (empty($poster)) {
            return $this->sendError('Poster not found');
        }

        $poster->delete();

        return $this->sendSuccess('Poster deleted successfully');
    }
}
