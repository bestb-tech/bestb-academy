<?php

namespace App\Http\Controllers\Backend\API;

use App\Http\Controllers\Backend\API\TraitController\TraitHumanController;
use Illuminate\Http\Request;

class TestHumanController extends TraitHumanController
{
    public $modelName = 'User';
}
