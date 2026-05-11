<?php

namespace Chrissantiago82\Monitor;

use Illuminate\Support\Facades\Queue;

class MonitorQueueClass
{

    protected $array = [];


    public static function run()
    {
        $class = new self();

        $class->array['reserved'] = [];
        $class->array['pending'] = [];
        $class->array['delayed'] = [];

        $class->processPendingJobs();
        $class->processReservedJobs();
        $class->processDeleyedJobs();

        return $class->array;
    }


    protected function processPendingJobs()
    {
        foreach (Queue::allPendingJobs() as $job) {
            $this->array['pending'][] = [
                'uuid' => $job->uuid,
                'name' => $job->name,
                'created' => $job->createdAt->toDateTimeString(),
            ];
        }
    }


    protected function processReservedJobs()
    {
        foreach (Queue::allReservedJobs() as $job) {
            $this->array['reserved'][] = [
                'uuid' => $job->uuid,
                'name' => $job->name,
                'created' => $job->createdAt->toDateTimeString(),
            ];
        }
    }


    protected function processDeleyedJobs()
    {
        foreach (Queue::allDelayedJobs() as $job) {
            $this->array['delayed'][] = [
                'uuid' => $job->uuid,
                'name' => $job->name,
                'created' => $job->createdAt->toDateTimeString(),
            ];
        }
    }
}
