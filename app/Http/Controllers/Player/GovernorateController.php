<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller ;
use App\Model\governorate;

use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    public function GetAreas(governorate $governorate)
    {
    	return $governorate->Areas;
    }
}
