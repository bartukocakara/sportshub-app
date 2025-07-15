<?php

namespace App\Repositories;

use App\Models\Definition;

class DefinitionRepository extends BaseRepository
{
    protected Definition $definition;

    /**
     * @param Definition $definition
     * @return void
    */
    public function __construct(Definition $definition)
    {
        parent::__construct($definition);
        $this->definition = $definition;
    }

    public function findByParams(array $params): Definition
    {
        return $this->definition->where($params)
            ->first();
    }
}
