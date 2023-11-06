<?php

return [

    /*
    |------------------------------------------------------------------
    | Log Viewer Route
    |------------------------------------------------------------------
    | Log Viewer will be available under this URL.
    |
    */
    'route_path' => 'admin/log-viewer',


    /*
    |--------------------------------------------------------------------------
    | Log Viewer route middleware.
    |--------------------------------------------------------------------------
    | The middleware should enable session and cookies support in order for the Log Viewer to work.
    | The 'web' middleware will be applied automatically if empty.
    |
    */
    'middleware' => ['auth']
];
