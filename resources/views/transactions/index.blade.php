<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transactions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 inline">
                    <a href="{{route('transactions.edit')}}" ><x-primary-button >{{ __('New Transaction') }}</x-primary-button></a>
                    <div class="space-y-5">
                        @foreach($transactions as $transaction)
                            <a href="{{route('transactions.read',['id'=>$transaction->id])}}" >
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ $transaction->amount }} USD $ - {{$transaction->payer}}
                                </h2>
                            </a>

                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
