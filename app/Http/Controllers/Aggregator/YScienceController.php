<?php

namespace App\Http\Controllers\Aggregator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YScienceModel;



class YScienceController extends Controller
{
   public function showNews()
   {
        return (new YScienceModel())->getShowNews();
   }
}
