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
     * @return LengthAwarePaginator|Collection
    */
    public function all(Request $request) : LengthAwarePaginator|Collection
    {
        return $this->repository->all($request);
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
     * @param int $id
     * @return Model
    */
    public function show(string $id) : Model
    {
        return $this->repository->find($id);
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
