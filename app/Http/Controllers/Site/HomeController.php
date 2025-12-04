<?php

namespace App\Http\Controllers\Site;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

class HomeController extends BaseController
{
    public function __invoke(): View
    {
        return view('site.home');
    }
}
