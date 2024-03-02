<?php

namespace App\Services\Bot;

use App\Models\Click;
use Illuminate\Http\Request;
use WeStacks\TeleBot\Exceptions\TeleBotException;
use WeStacks\TeleBot\TeleBot;

class BotService
{
    /**
     * @throws TeleBotException
     */
    public function run(Request $request): void
    {
        $bot = new TeleBot(config('bot.token'));

        $click = Click::query()->firstOrNew(['id' => 1]);
        $click->count++;
        $click->save();

        $chatId = $request['message']['from']['id'] ?? $request['callback_query']['from']['id'];
        $message = $request['message']['text'] ?? null;
        $callbackData = $request['callback_query']['data'] ?? null;

        if ($callbackData === 'all_clicks') {
            $click = Click::query()->first();

            info($click->count);

            $bot->sendMessage([
                'chat_id' => $chatId,
                'text' => "Click count: $click->count",
            ]);
        }

        $keyboard = [
            'inline_keyboard' =>
                [
                    [
                        [
                            'text' => 'All clicks',
                            'callback_data' => 'all_clicks',
                        ],
                    ],
                ],
        ];

        if ($message === 'привет') {
            $bot->sendMessage([
                'chat_id' => $chatId,
                'text' => "Your telegram id: $chatId. Hello",
                'reply_markup' => $keyboard,
            ]);
        }
    }
}
