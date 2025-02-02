<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected Model $model;

    /**
     * @param Model $model
     * @return void
    */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Kaynaktan bir liste görüntüler.
     *
     * @param Request $request
     * @return LengthAwarePaginator|Collection
    */
    public function all(Request $request) : LengthAwarePaginator|Collection
    {
        return $this->model->filterBy($request->all());
    }

    /**
     * Yeni oluşturulan bir kaynağı database katmanına kaydeder.
     *
     * @param array $data
     * @return Model
    */
    public function create(array $data) : Model
    {
        return $this->model->create($data);
    }

    /**
     * Yeni oluşturulan bir kaynağı database katmanına kaydeder.
     *
     * @param array $data
     * @return bool
    */
    public function insert(array $data) : bool
    {
        return $this->model->insert($data);
    }

    /**
     * Bir kaynağı görüntülemek için kullanılır.
     *
     * @param string $id
     * @param string $slug
     * @return Model
    */
    public function showBySlug(string $key, string $slug) : Model
    {
        return $this->model->where($key, $slug)->first();
    }

    /**
     * Bir kaynağı görüntülemek için kullanılır.
     *
     * @param int|string $id
     * @param array $with
     * @return Model
    */
    public function find(int|string $id, array $with = []) : Model
    {
        return $this->model->with($with)->findOrFail($id);
    }

    /**
     * Bir kaynağı güncellemek için kullanılır.
     *
     * @param array $data
     * @param int $id
     * @return bool
    */
    public function update(array $params, string $id) : bool
    {
        return $this->model->find($id)->update($params);
    }

    /**
     * Bir kaynağı güncellemek için kullanılır.
     *
     * @param array $data
     * @param array $values
     * @return bool
    */
    public function updateOrCreate(array $params, array $values) : Model
    {
        return $this->model->updateOrCreate($params, $values);
    }

    /**
     * Bir kaynağı kaldırmak için kullanılır.
     *
     * @param string $id
     * @return bool
    */
    public function delete(string $id) : bool
    {
        return $this->model->findOrFail($id)->delete();
    }
}
