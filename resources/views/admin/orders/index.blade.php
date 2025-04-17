@extends('layout')
@section('content')
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">

<div class="container">
    <h1 class="text-center m-5">Список заказов</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя клиента</th>
                <th>Мастер</th>
                <th>Услуга</th>
                <th>Дата</th>
                <th>Время</th>
                <th>Телефон</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->master->name }}</td>
                    <td>{{ $order->service->name }}</td>
                    <td>{{ $order->date }}</td>
                    <td>{{ $order->time }}</td>
                    <td>{{ $order->customer_telephone }}</td>
                    <td>
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary">Редактировать</a>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
