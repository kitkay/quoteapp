<?php

namespace App\Services;

use App\Interfaces\QuoteRepositoryInterface;

class QuoteServices
{
    /** @var QuoteRepositoryInterface $interface */
    private QuoteRepositoryInterface $interface;

    public function __construct(QuoteRepositoryInterface $quoteInterface)
    {
        $this->interface = $quoteInterface;
    }

    public function all()
    {
        dd($this->interface->all());
//        return $this->all();
    }
}
