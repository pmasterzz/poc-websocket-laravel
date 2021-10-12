<?php

namespace App\Http\Controllers;

use App\Events\CompleteTaskEvent;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function notify(Request $request)
    {
        event(new CompleteTaskEvent(['name' => $request->input('name')]));

        return true;
    }
}
