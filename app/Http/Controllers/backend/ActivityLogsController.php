<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\MenuRequest;
use App\Models\Backend\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActivityLogsController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:activity-logs', ['only' => ['activityLogs']]);

    }
    /**
     * Display a listing of the resource.
     */
    public function activityLogs()
    {
        $notifications = DB::table('notifications')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('backend.activityLogs.index', ['notifications' => $notifications]);
    }


}
