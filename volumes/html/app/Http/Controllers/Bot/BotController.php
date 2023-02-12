<?php

namespace App\Http\Controllers\Bot;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bot\Webhook;
use App\Http\Services\Bot\BotServices;
use Illuminate\Http\Request;

class BotController extends Controller
{
    /**
     * @param Webhook $webhook
     * @param BotServices $botServices
     * @return null
     */
    public function index(Webhook $webhook, BotServices $botServices)
    {
        return $botServices->index($webhook->getReq());
    }
}
