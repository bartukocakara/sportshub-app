<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class BaseRepository
{
    /**
     * @param Model $model
     * @return void
    */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Kaynakları listelemek için kullanılır.
     *
     * @param Request $request
     * @return LengthAwarePaginator|Collection
    */
    public function all(Request $request) : LengthAwarePaginator|Collection
    {
        return $this->model->filterBy($request->all());
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param array $data
     * @return Model
    */
    public function create(array $data) : Model
    {
        return $this->model->create($data);
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param int $id
     * @return Model
    */
    public function find(string $id) : Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param array $data
     * @param int $id
     * @return bool
    */
    public function update(array $data, string $id) : bool
    {
        return $this->model->find($id)->update($data);
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param int $id
     * @return bool
    */
    public function delete(string $id) : bool
    {
        return $this->model->find($id)->delete();
    }
}
