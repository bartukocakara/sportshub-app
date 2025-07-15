<?php

namespace App\Repositories;

use App\Models\CourtImage;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class CourtImageRepository extends BaseRepository
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected CourtImage $courtImage;

    /**
     * @param Court $report
     * @return void
    */
    public function __construct(CourtImage $courtImage)
    {
        parent::__construct($courtImage);
        $this->courtImage = $courtImage;
    }

    /**
     * all
     *
     * @param  Request $request
     * @param  array $with
     * @param  bool $useCache
     * @return LengthAwarePaginator|Collection
     */
    public function all(Request $request, array $with = [], bool $useCache = false): LengthAwarePaginator|Collection
    {
        $with = [];
        if ($request->has('request_create_court_id')) {
            $with[] = 'requestCreateCourt';
        }

        return $this->courtImage->with($with)->filterBy($request->all());
    }

    /**
     * Find by getByCourtId
     *
     * @param  array $params
     * @return Collection|array
     */
    public function getByCourtId(string $courtId) : Collection|array
    {
        return $this->courtImage->where('court_id', $courtId)
                                ->get();
    }

    /**
     * Find by params
     *
     * @param  mixed $request
     * @return Model
     */
    public function getByIds(array $params) : Collection|array
    {
        return $this->courtImage->whereIn('id', $params['id'])->get();
    }

    /**
     * Get by params
     *
     * @param  array $params
     * @return Collection|array
     */
    public function getByParams(array $params) : Collection|array
    {
        return $this->courtImage->where($params)->get();
    }

    /**
     * insert
     *
     * @param  array $rows
     * @return bool
     */
    public function insert(array $rows) : bool
    {
        return $this->courtImage->insert($rows);
    }

    /**
     * deleteByParams
     *
     * @param  array $params
     * @return bool
     */
    public function deleteByParams(array $params) : bool
    {
        return $this->courtImage->where($params)->delete();
    }

    /**
     * destroy
     *
     * @param  array $params
     * @return bool
     */
    public function destroy(array $params) : bool
    {
        return $this->courtImage->destroy($params);
    }
}
