<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', function () {
    return response()->json(['response' => 'ok']);
});
$router->get('/api/me', function (\Illuminate\Http\Request $request) {
    if ($request->hasHeader('Authorization')) {
        $ohDearSDK = new \OhDear\PhpSdk\OhDear(str_replace('Bearer ', '', $request->header('Authorization')));

        return response()->json($ohDearSDK->me());
    }
});
$router->get('/api/sites', function (\Illuminate\Http\Request $request) {
    if ($request->hasHeader('Authorization')) {
        $ohDearSDK = new \OhDear\PhpSdk\OhDear(str_replace('Bearer ', '', $request->header('Authorization')));

        return response()->json(['data' => $ohDearSDK->sites()]);
    }
});
