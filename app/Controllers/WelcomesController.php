<?php

namespace App\Controllers;

use App\Base\Controller;

class WelcomesController extends Controller
{
    public function hello()
    {
        views('index.php');
    }
}
