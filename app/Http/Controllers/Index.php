<?php

namespace App\Http\Controllers;

use Inertia\Inertia;


class index extends BaseAction
{
    public function __invoke()
    {
        return Inertia::render('Landing/Home');
    }
}
