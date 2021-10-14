<?php

namespace App\Http\Controllers;

use App\Events\AddMessageEvent;
use App\Events\AddPrivateMessageEvent;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function add(Request $request): bool
    {
        event(new AddMessageEvent(['message' => $request->input('message')]));

        return true;
    }

    public function addPrivate(Request $request): bool
    {
        event(new AddPrivateMessageEvent(['message' => $request->input('message')]));

        return true;
    }
}
