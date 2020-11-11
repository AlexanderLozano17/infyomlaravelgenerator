<?php

namespace App\Repositories;

use App\Models\Poster;
use App\Repositories\BaseRepository;

/**
 * Class PosterRepository
 * @package App\Repositories
 * @version November 11, 2020, 1:01 am UTC
*/

class PosterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Poster::class;
    }
}
