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
        $this->results['freeDiskPro'] = round(100/(disk_total_space("/") / disk_free_space("/")), 1);
        $this->results['freeDiskGB'] = round(disk_free_space("/") / (1000 * 1000 * 1000), 1);
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
        $usedmem = $mem[2];
        $usedmemInGB = number_format($usedmem / 1048576, 2) . ' GB';
        $memory1 = $mem[2] / $mem[1] * 100;
        $memory = round($memory1, 1);
        $fh = fopen('/proc/meminfo', 'r');
        $mem = 0;
        while ($line = fgets($fh)) {
            $pieces = array();
            if (preg_match('/^MemTotal:\s+(\d+)\skB$/', $line, $pieces)) {
                $mem = $pieces[1];
                break;
            }
        }
        fclose($fh);
        $totalram = number_format($mem / 1048576, 2) . ' GB';

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
        $this->results['queue'] = Queue::size();
    }



}
