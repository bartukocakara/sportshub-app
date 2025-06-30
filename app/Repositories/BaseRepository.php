<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class BaseRepository
{
    protected Model $model;
    protected string $cachePrefix = 'repository_';

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
     * @param array $with = []
     * @return LengthAwarePaginator|Collection
    */
    public function all(Request $request, array $with = [], bool $useCache = false): LengthAwarePaginator|Collection
    {
        if (!method_exists($this->model, 'scopeFilterBy')) {
            throw new \Exception("Model " . get_class($this->model) . " must have a scopeFilterBy() method.");
        }

        $cacheKey = $this->getCacheKey('all', $request->all());

        if ($useCache) {
            return Cache::remember($cacheKey, now()->addMinutes(10), function () use ($request, $with, $useCache) {
                return $this->model->filterBy($request->all(), $with, $useCache);
            });
        }

        return $this->model->filterBy($request->all(), $with, $useCache);
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
    public function find(int|string $id, array $with = [], bool $useCache = false): Model
    {
        $cacheKey = $this->getCacheKey('find_' . $id);

        if ($useCache) {
            return Cache::remember($cacheKey, now()->addMinutes(10), function () use ($id, $with) {
                return $this->model->with($with)->findOrFail($id);
            });
        }

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

    public function clearCache(string $suffix = '*'): void
    {
        // Redis üzerinden tüm cache key'leri silmek için
        if (Cache::getStore() instanceof \Illuminate\Cache\RedisStore) {
            $pattern = $this->cachePrefix . $this->model->getTable() . ':' . $suffix;
            $redis = Cache::getRedis();
            foreach ($redis->keys($pattern) as $key) {
                $redis->del($key);
            }
        }
    }

    protected function getCacheKey(string $method, array $params = []): string
    {
        return $this->cachePrefix . $this->model->getTable() . ':' . $method . ':' . md5(json_encode($params));
    }
}
