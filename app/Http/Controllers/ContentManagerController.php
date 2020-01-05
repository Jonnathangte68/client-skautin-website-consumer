<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Data\Website;

class ContentManagerController extends Controller
{
    public function get(Request $request, String $page) {
        $web = new Website;
        $html = $web->getWebsiteByCode($page);
        return $html;
    }
}
