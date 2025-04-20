<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master;
use App\Models\Service;
use App\Models\Image;
use App\Models\Order;
use Telegram\Bot\Api;
USE App\Http\Controllers\TelegramController;
class OrderController extends Controller
{
    public function index($id){
        $service = Service::find($id);
        $masters = Master::All();
        $images = Image::where('service_id', $service->id)->get();
        return view('serviceInformation', compact('masters','service','images'));
    }
    public function createOrder(Request $request, $id)
    {
        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));

        // Проверка, что время не занято
        $existingOrder = Order::where('master_id', $request->master)
                              ->where('date', $request->date)
                              ->where('time', $request->time)
                              ->first();

        if ($existingOrder) {
            // Получаем список доступных времен для выбранной даты и мастера
            $availableTimes = $this->getAvailableTimes($request, $request->master, $request->date)->getData();

            // Находим ближайшее свободное время
            $nearestTime = null;
            foreach ($availableTimes as $time) {
                if (strtotime($time) > strtotime($request->time)) {
                    $nearestTime = $time;
                    break;
                }
            }

            // Формируем сообщение об ошибке
            $errorMessage = 'Выбранное время уже занято. ';
            if ($nearestTime) {
                $errorMessage .= 'Ближайшее свободное время: ' . $nearestTime;
            } else {
                $errorMessage .= 'На этот день свободных времен нет.';
            }

            return redirect()->back()->withErrors(['time' => $errorMessage]);
        }

        // Создаем новый заказ
        $order = new Order;
        $order->customer_name = $request->name;
        $order->master_id = $request->master;
        $order->service_id = $id;
        $order->date = $request->date;
        $order->time = $request->time;
        $order->customer_telephone = $request->phone;
        $order->save();

        return redirect('/');
    }
    public function getAvailableTimes(Request $request, $masterId, $date)
    {
        // Получаем все заказы для выбранного мастера и даты
        $bookedTimes = Order::where('master_id', $masterId)
                            ->where('date', $date)
                            ->pluck('time')
                            ->toArray();

        // Генерируем список всех возможных временных слотов с 12:00 до 20:00 с интервалом в час
        $allTimes = [];
        for ($hour = 12; $hour < 20; $hour++) {
            $allTimes[] = sprintf('%02d:00', $hour); // Только часы, без минут
        }

        // Исключаем забронированные времена
        $availableTimes = array_diff($allTimes, $bookedTimes);

        return response()->json(array_values($availableTimes));
    }
    public function adminIndex()
    {
        $orders = Order::with(['master', 'service'])->get(); // Загружаем связанные данные мастера и услуги
        return view('admin.orders.index', compact('orders'));
    }

    public function adminEdit($id)
    {
        $order = Order::findOrFail($id);
        $masters = Master::all();
        $services = Service::all();
        return view('admin.orders.edit', compact('order', 'masters', 'services'));
    }

    public function adminUpdate(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'customer_name' => 'required|string',
            'master_id' => 'required|exists:masters,id',
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date',
            'time' => 'required',
            'customer_telephone' => 'required|string',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Заказ успешно обновлен.');
    }

    public function adminDestroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Заказ успешно удален.');
    }
}
