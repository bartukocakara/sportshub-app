<?php

namespace App\Filters;

use Illuminate\Support\Str;

class FilterBuilder
{
    protected $query;
    protected array $filters;
    protected string $namespace;
    protected int $defaultPerPage = 10;
    protected string $defaultSortField = 'created_at';
    protected string $defaultSortOrder = 'desc';
    protected array $relations;

    /**
     * FilterBuilder constructor.
     *
     * @param $query
     * @param $filters
     * @param $relations
     * @param $namespace
     */
    public function __construct($query, $filters, $relations, $namespace)
    {
        $this->query = $query;
        $this->filters = $filters;
        $this->relations = $relations;
        $this->namespace = $namespace;
    }

    /**
     * Apply filters and return the result.
     *
     * @return mixed
     */
    public function apply(): mixed
    {
        $this->applyFilters();

        if ($this->isCountable()) {
            return $this->query->count();
        }

        $this->applyOrdering();

        return $this->isPaginated()
            ? $this->paginateQuery()
            : $this->query->get()->loadMissing($this->relations);
    }

    /**
     * Apply individual filters using dynamically resolved filter classes.
     */
    protected function applyFilters(): void
    {
        foreach ($this->filters as $name => $value) {
            $normalizedName = ucfirst(Str::camel($name));
            $class = "App\Filters\\{$this->namespace}\\{$normalizedName}";

            if ($value && class_exists($class)) {
                (new $class($this->query))->handle($value ?? '');
            }
        }
    }

    /**
     * Check if the result should be a count of the query.
     *
     * @return bool
     */
    protected function isCountable(): bool
    {
        return isset($this->filters['countable']);
    }

    /**
     * Apply ordering to the query based on the filters.
     */
    protected function applyOrdering(): void
    {
        if (!isset($this->filters['order_by'])) {
            return;
        }

        $orderByColumns = $this->getOrderByColumns();
        $orderSort = $this->filters['order_sort'] ?? $this->defaultSortOrder;

        foreach ($orderByColumns as $column) {
            $this->query->orderBy($column, $orderSort);
        }
    }

    /**
     * Retrieve columns for ordering.
     *
     * @return array
     */
    protected function getOrderByColumns(): array
    {
        if (isset($this->filters['order_by']) && str_contains($this->filters['order_by'], ',')) {
            return array_map('trim', explode(',', $this->filters['order_by']));
        }

        return [$this->filters['order_by'] ?? $this->defaultSortField];
    }

    /**
     * Check if the query result should be paginated.
     *
     * @return bool
     */
    protected function isPaginated(): bool
    {
        return !empty($this->filters['per_page']);
    }

    /**
     * Paginate the query and load missing relations.
     *
     * @return mixed
     */
    protected function paginateQuery(): mixed
    {
        $perPage = $this->filters['per_page'] ?? $this->defaultPerPage;
        $orderByColumns = $this->getOrderByColumns();
        $orderSort = $this->filters['order_sort'] ?? $this->defaultSortOrder;

        foreach ($orderByColumns as $column) {
            $this->query->orderBy($column, $orderSort);
        }

        $result = $this->query->paginate($perPage);
        $result->loadMissing($this->relations);

        return $result;
    }
}
