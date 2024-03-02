<?php

namespace App\Console\Commands;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class SetWebhookCommand extends Command
{
    protected $signature = 'set:webhook {url}';
    protected $description = 'Set webhook url';

    public function handle(): void
    {
        $webhookUrl = $this->argument('url');
        $botToken = config('bot.token');

        $url = "https://api.telegram.org/bot"
            . $botToken
            . '/setWebhook?url='
            . $webhookUrl
            . '/api/callback';

        $client = new Client();

        try {
            $response = $client->request('GET', $url);
            $response = $response->getBody()->getContents();

            echo "Response: " . $response . "\n";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }
    }
}
