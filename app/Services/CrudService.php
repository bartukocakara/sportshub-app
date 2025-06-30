<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CrudService
{
    protected $repository;

    /**
     * @return void
    */
    public function __construct($repository)
    {
        // Servisten gelen repository tanımlanıyor.
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @param array $with
     * @param bool $useCache = false
     * @return LengthAwarePaginator|Collection
    */
    public function all(Request $request, array $with = [], bool $useCache = false) : LengthAwarePaginator|Collection
    {
        return $this->repository->all($request, $with, $useCache);
    }

    /**
     * @param array $data
     * @return Model
    */
    public function store(array $data) : Model
    {
        return $this->repository->create($data);
    }

    /**
     * @param string $id
     * @param array $with
     * @return Model
    */
    public function show(string $id, array $with = []) : Model
    {
        return $this->repository->find($id, $with);
    }

    /**
     * @param array $data
     * @param int $id
     * @return bool
    */
    public function update(array $data, string $id) : bool
    {
        return $this->repository->update($data, $id);
    }

    /**
     * @param int $id
     * @return bool
    */
    public function destroy(string $id) : bool
    {
        return $this->repository->delete($id);
    }
}
