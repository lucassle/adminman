<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller {
    protected $pathViewController     = 'page.dashboard.';
    protected $controllerName         = 'dashboard';
    protected $arrParam               = [];
    protected $model;

    public function __construct() {
        view()->share('controllerName', $this->controllerName);
    }

    public function index () {
        return view($this->pathViewController . 'index');
    }
}