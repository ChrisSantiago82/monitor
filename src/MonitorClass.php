<?php

namespace Chrissantiago82\Monitor;

use Queue;

class MonitorClass
{

    public $results = [];

    function __construct()
    {
        $this->getDiskSpace();
        $this->getMemory();
        $this->getCpuLoad();
        $this->getQueue();
    }


    protected function getDiskSpace()
    {
        $path = sys_get_temp_dir();
        $this->results['freeDiskPro'] = round(100/(disk_total_space($path) / disk_free_space($path)), 1);
        $this->results['freeDiskGB'] = round(disk_free_space($path) / (1000 * 1000 * 1000), 1);
    }

    protected function getMemory()
    {
        //RAM usage
        $free = shell_exec('free');
        $free = (string) trim($free);
        $free_arr = explode("\n", $free);
        $mem = explode(" ", $free_arr[1]);
        $mem = array_filter($mem);
        $mem = array_merge($mem);
        $memory1 = $mem[2] / $mem[1] * 100;
        $memory = round($memory1, 1);

        $this->results['memoryLoad'] = $memory;
    }

    protected function getCpuLoad()
    {
        $load2 = sys_getloadavg();

        $command = "cat /proc/cpuinfo | grep processor | wc -l";
        $coreCount = (int) shell_exec($command);
        $load2 = round($load2[2] / $coreCount, 2);

        $this->results['cpuLoad'] = $load2;
    }

    protected function getQueue()
    {
        $total = 0;
        foreach (config('krebsmonitor.queues') as $queue) {
            $total = $total +  Queue::size($queue);
        }

        $this->results['queue'] = $total;
    }



}
