<?php

namespace Chrissantiago82\Monitor;

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

        $monitorClass = new MonitorClass();

        return response()->json($monitorClass->results);

    }


    public function queues($key)
    {
        if (config('krebsmonitor.key') === null) {
            return;
        }

        if (config('krebsmonitor.key') != $key) {
            return;
        }

        return response()->json(MonitorQueueClass::run());
    }

}
