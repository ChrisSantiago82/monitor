<?php

namespace Chrissantiago82\Monitor;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class MonitorController extends Controller
{

    public function monitor($key)
    {

        if (config('krebsmonitor.key') === null) {
            return;
        }

        if (config('krebsmonitor.key') != $key) {
            return;
        }

        //$monitorClass = new Monitor();

        $monitorClass = new MonitorClass();


        return response()->json($monitorClass->results);

    }

}
