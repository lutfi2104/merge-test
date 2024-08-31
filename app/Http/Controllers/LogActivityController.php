<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class LogActivityController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = 'Log Activity';
        $data['log_activities'] = Activity::latest()
            ->whereIn('event', ['updated', 'deleted'])
            ->get();
        return view('admin.log_activity.index', $data);
    }
}
