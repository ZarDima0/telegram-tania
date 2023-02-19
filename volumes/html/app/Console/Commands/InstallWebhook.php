<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class InstallWebhook extends Command
{
    private const API_TELEGRAM = 'https://api.telegram.org/bot';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install-webhook {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'install webhook';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $res = Http::get(self::API_TELEGRAM . config('app.telegram_token') . '/deleteWebhook');
        if ($res->status() == '200') {
            $installWebhook =
                Http::get(
                    self::API_TELEGRAM .
                    config('app.telegram_token') .
                    '/setWebhook?url=' .
                    $this->argument('url') .
                    '/api/bot/webhook'
                );
            dd($installWebhook->body());
        }
        return Command::SUCCESS;
    }
}
