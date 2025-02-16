<?php

namespace App\Filters;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class FilterBuilder
{
    protected $query;
    protected array $filters;
    protected string $namespace;
    public int $defaultPerPage = 10;
    public string $defaultSortField = 'created_at';
    public string $defaultSortOrder = 'desc';

    /**
     * FilterBuilder constructor.
     *
     * @param $query
     * @param $filters
     * @param $namespace
     */
    public function __construct($query, $filters, $namespace)
    {
        $this->query = $query;
        $this->filters = $filters;
        $this->namespace = $namespace;
    }

    /**
     * Apply filters.
     *
     * @return LengthAwarePaginator
     */
    public function apply(): LengthAwarePaginator
    {
        foreach ($this->filters as $name => $value) {
            // Skip if the value is null or an empty string
            if ($value === null || $value === '') {
                continue;
            }

            $normalizedName = ucfirst(Str::camel($name));
            $class = "App\Filters\\" . $this->namespace . "\\{$normalizedName}";

            if (!class_exists($class)) {
                continue;
            }

            (new $class($this->query))->handle($value);
        }

        // Apply sorting if order_by is provided
        if (isset($this->filters['order_by'])) {
            $this->query->orderBy($this->filters['order_by'], $this->filters['order_sort'] ?? $this->defaultSortOrder);
        }

        return $this->paginating($this->query, $this->filters);
    }

    /**
     * Handle pagination.
     *
     * @param $query
     * @param $filters
     * @return LengthAwarePaginator
     */
    public function paginating($query, $filters): LengthAwarePaginator
    {
        $searchArray['order_by'] = $filters['order_by'] ?? $this->defaultSortField;
        $searchArray['order_sort'] = $filters['order_sort'] ?? $this->defaultSortOrder;
        $searchArray['per_page'] = $filters['per_page'] ?? $this->defaultPerPage;

        return $query->orderBy($searchArray['order_by'], $searchArray['order_sort'])
            ->paginate($searchArray["per_page"]);
    }
}
