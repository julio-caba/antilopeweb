<?php

namespace App\Repositories\Admin;

use App\Models\Admin\role;
use App\Repositories\BaseRepository;

/**
 * Class roleRepository
 * @package App\Repositories\Admin
 * @version May 13, 2022, 12:40 pm UTC
*/

class roleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return role::class;
    }
}
