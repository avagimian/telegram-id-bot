<?php

namespace App\Http\Controllers;

use App\Services\Bot\BotService;
use Illuminate\Http\Request;
use WeStacks\TeleBot\Exceptions\TeleBotException;

class BotController extends Controller
{
    /**
     * @throws TeleBotException
     */
    public function index(
        Request $request,
        BotService $botService
    ): void {
        $botService->run($request);
    }
}
