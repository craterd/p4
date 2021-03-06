<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('enter');
});

Route::get('/removeplayer', 'GolfController@removeplayer');
Route::get('/chooseplayer2', 'GolfController@chooseplayer2');
Route::get('/deleteplayer/{player}', 'GolfController@deleteplayer');
Route::get('/changeplayer', 'GolfController@changeplayer');
Route::get('/editplayer/{player}', 'GolfController@editplayer');
Route::get('/chooseplayer', 'GolfController@chooseplayer');
Route::get('/newplayer', 'GolfController@newplayer');
Route::get('/scores', 'GolfController@scores');
Route::get('/scores/{player}', 'GolfController@scores');
Route::get('/players', 'GolfController@players');
Route::get('/courses', 'GolfController@courses');

Route::get('/debug', function () {
    
        $debug = [
            'Environment' => App::environment(),
            'Database defaultStringLength' => Illuminate\Database\Schema\Builder::$defaultStringLength,
        ];
    
        /*
        The following commented out line will print your MySQL credentials.
        Uncomment this line only if you're facing difficulties connecting to the
        database and you need to confirm your credentials. When you're done
        debugging, comment it back out so you don't accidentally leave it
        running on your production server, making your credentials public.
        */
        #$debug['MySQL connection config'] = config('database.connections.mysql');
    
        try {
            $databases = DB::select('SHOW DATABASES;');
            $debug['Database connection test'] = 'PASSED';
            $debug['Databases'] = array_column($databases, 'Database');
        } catch (Exception $e) {
            $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
        }
    
        dump($debug);
    });