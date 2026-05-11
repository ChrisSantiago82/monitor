<?php


Route::GET('/krebscmonitor/{key}', 'chrissantiago82\monitor\MonitorController@monitor');
Route::GET('/krebscmonitor/{key}/queues', 'chrissantiago82\monitor\MonitorController@queues');
