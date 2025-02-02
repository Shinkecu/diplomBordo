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
        $images = Image::where('service-id', $service->id)->get();
        return view('serviceInformation', compact('masters','service','images'));
    }
    public function createOrder(Request $request, $id){
        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
        $order= new Order;
        $order->customer_name = $request->name;
        $order->master_id = $request->master;
        $order->service_id = $id;
        $order->date = $request->date;
        $order->time = $request->time;
        $order->customer_telephone = $request->phone;
        $order->save();

        return redirect('/');
    }
}
