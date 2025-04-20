<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Appointment; // Ваша модель записей

class TelegramPollingCommand extends Command
{
    protected $signature = 'telegram:polling';
    protected $description = 'Poll Telegram for new messages';

    private $token;

    public function __construct()
    {
        parent::__construct();
        $this->token = env('TELEGRAM_BOT_TOKEN'); // Токен из .env
    }

    public function handle()
    {
        $offset = 0;
        while (true) {
            $response = Http::get("https://api.telegram.org/bot{$this->token}/getUpdates", [
                'offset' => $offset + 1,
                'timeout' => 30, // Долгий опрос (long polling)
            ]);

            if ($response->ok()) {
                $updates = $response->json();
                foreach ($updates['result'] as $update) {
                    $this->processUpdate($update);
                    $offset = $update['update_id'];
                }
            }
            sleep(1);
        }
    }

    private function processUpdate($update)
    {
        $chatId = $update['message']['chat']['id'] ?? null;
        $text = $update['message']['text'] ?? null;

        if ($text === '/bookings') {
            $bookings = Appointment::all();
            $message = "Список записей:\n";
            foreach ($bookings as $booking) {
                $message .= "{$booking->date} - {$booking->client_name}\n";
            }
            $this->sendMessage($chatId, $message);
        }
    }

    private function sendMessage($chatId, $text)
    {
        Http::post("https://api.telegram.org/bot{$this->token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $text,
        ]);
    }
}
