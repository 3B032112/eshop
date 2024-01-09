<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table>
                        <tr>
                            <td>訂單編號</td>
                            <td>訂單建立日期</td>
                            <td>產品</td>
                        </tr>
                        @foreach ($order_items as $order_item)
                        <tr>
                            <td>{{ $order_item->order_id }}</td>
                            <td>{{ $order_item->product()->first()->name }}</td>
                            <td>{{ $order_item->created_at }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>