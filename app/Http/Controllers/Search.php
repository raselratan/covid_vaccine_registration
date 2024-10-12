<?php

namespace App\Http\Controllers;

use Inertia\Inertia;


class Search extends BaseAction
{
    public function __invoke()
    {
        return Inertia::render('Landing/Search');
    }
}
