<?php

use App\Base\Router;
use App\Controllers\WelcomesController;
use App\Controllers\PortfoliosController;

Router::get('/', [WelcomesController::class, 'hello']);

Router::get('portfolios', [PortfoliosController::class, 'index']);
