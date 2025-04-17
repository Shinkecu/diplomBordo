@extends('layout')
@section('content')
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">

<div class="container">
    <h1 class="text-center m-5">Редактирование заказа</h1>

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="customer_name">Имя клиента</label>
            <input type="text" name="customer_name" class="form-control" value="{{ $order->customer_name }}" required>
        </div>
        <div class="form-group">
            <label for="master_id">Мастер</label>
            <select name="master_id" class="form-control" required>
                @foreach($masters as $master)
                    <option value="{{ $master->id }}" {{ $order->master_id == $master->id ? 'selected' : '' }}>{{ $master->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="service_id">Услуга</label>
            <select name="service_id" class="form-control" required>
                @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ $order->service_id == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">Дата</label>
            <input type="date" name="date" class="form-control" value="{{ $order->date }}" required>
        </div>
        <div class="form-group">
            <label for="time">Время</label>
            <input type="time" name="time" class="form-control" value="{{ $order->time }}" required>
        </div>
        <div class="form-group">
            <label for="customer_telephone">Телефон</label>
            <input type="text" name="customer_telephone" class="form-control" value="{{ $order->customer_telephone }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Обновить</button>
    </form>
</div>

@endsection
