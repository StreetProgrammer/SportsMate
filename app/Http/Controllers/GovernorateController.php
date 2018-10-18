<?php

namespace App\Http\Controllers;

use App\Model\governorate;

use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    public function GetAreas(governorate $governorate)
    {
    	return $governorate->Areas;
    }
}
