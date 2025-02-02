<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Api;
class TelegramController extends Controller
{
    public function handleWebhook()
    {
        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
        $updates = $telegram->getWebhookUpdates();

        // Обработка сообщения
        $chatId = $updates->getMessage()->getChat()->getId();
        $text = "Новое сообщение о записи клиента!";

        // Отправка сообщения
        $telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => $text,
        ]);

        return response('OK', 200);
    }
}
