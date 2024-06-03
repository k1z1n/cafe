@extends('admin.template')
@section('content')
    <div class="container mt-3">
        <div id="users" class="page">
            <h1 class="text-3xl font-bold my-6">Товары корзины</h1>
            @if(session('success'))
                <div class="text-green-600 my-4">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-container overflow-x-auto">
                <table class="table w-full border-collapse">
                    <thead class="bg-gray-200">
                    <tr class="text-center">
                        <th class="px-4 py-2 text-center">ID</th>
                        <th class="px-4 py-2 text-center">Имя</th>
                        <th class="px-4 py-2 text-center">Товары</th>
                        <th class="px-4 py-2 text-center">Общая сумма</th>
                        <th class="px-4 py-2 text-center">Статус</th>
                        <th class="px-4 py-2 text-center">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr class="border-b border-gray-200">
                            <td class="px-4 py-2 text-center">{{ $order->id }}</td>
                            <td class="px-4 py-2 text-center">{{ $order->user->phone_number }}</td>
                            <td class="px-4 py-2 text-center">
                                @foreach($order->orderItems as $item)
                                    {{ $item->product->title }}*{{ $item->quantity }}<br>
                                @endforeach
                            </td>
                            <td class="px-4 py-2 text-center">{{ $order->total }} ₽</td>
                            <td class="px-4 py-2 text-center">{{ $order->status }}</td>
                            <td class="px-4 py-2 text-center">
                                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-select">
                                        <option value="создано" {{ $order->status == 'создано' ? 'selected' : '' }}>Создано</option>
                                        <option value="оплачено" {{ $order->status == 'оплачено' ? 'selected' : '' }}>Оплачено</option>
                                        <option value="готовиться" {{ $order->status == 'готовиться' ? 'selected' : '' }}>Готовится</option>
                                        <option value="доставляется" {{ $order->status == 'доставляется' ? 'selected' : '' }}>Доставляется</option>
                                        <option value="доставлено" {{ $order->status == 'доставлено' ? 'selected' : '' }}>Доставлено</option>
                                        <option value="отменено" {{ $order->status == 'отменено' ? 'selected' : '' }}>Отменено</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-2">Обновить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
