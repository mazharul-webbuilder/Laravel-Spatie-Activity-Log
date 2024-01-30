<?php

use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Activity History
Route::get('activities/all', function (\Illuminate\Http\Request $request){
    try {
        $perPage = $request->input('per_page', 10);

        // Fetch activities with eager loading to retrieve the related user
        $activities = Activity::with(['causer' => function ($query) {
            $query->select('id', 'name');
        }])->paginate($perPage);

        return $this->successResponse('Data fetched successfully', $activities);

    } catch (\Exception $exception) {
        return $this->errorResponse($exception->getMessage(), null);
    }
});

Route::delete('activity/delete/{id}', function ($id){
    try {
        $activity = Activity::findOrFail($id);

        $activity->delete();

        return $this->successResponse('Activity Deleted Successfully', null);

    } catch (\Exception $exception){
        return $this->errorResponse($exception->getMessage(), null);
    }
});
