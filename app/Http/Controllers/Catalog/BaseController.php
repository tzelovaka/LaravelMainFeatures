<?php

namespace App\Http\Controllers\Catalog;
use App\Http\Controllers\Controller;
use App\Services\Catalog\Service;

class BaseController extends Controller{
    public $service;
    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}