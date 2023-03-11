<?php

namespace App\Services;

use App\Repositories\QuoteRepository;
use Illuminate\Database\Eloquent\Collection;

class QuoteServices
{
    /** @var QuoteRepository $repository */
    private QuoteRepository $repository;

    public function __construct(QuoteRepository $quoteRepository)
    {
        $this->repository = $quoteRepository;
    }

    /**
     * Show All Quotes
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->repository->all();
    }
}
