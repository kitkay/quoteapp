<?php

namespace App\Repositories;

use App\Interfaces\QuoteRepositoryInterface;
use App\Models\Quote;
use Illuminate\Database\Eloquent\Collection;

class QuoteRepository implements QuoteRepositoryInterface
{
    /** @var Quote */
    private Quote $quote;

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Quote::all();
    }
}
