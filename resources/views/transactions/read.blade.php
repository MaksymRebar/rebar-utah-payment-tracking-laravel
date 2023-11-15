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
                    <div class="" >
                    Amount : {{$transaction->amount}} USD $
                    </div>
                    <div>
                        Paid : {{$transaction->paid()}} USD $
                    </div>
                    <div>
                        Payer : {{$transaction->payer}}
                    </div>
                    <div>
                        Due On : {{$transaction->due_on}}
                    </div>
                    <div>
                        VAT : {{$transaction->vat}}
                    </div>
                    <div>
                        VAT Inclusive? : {{$transaction->is_vat_inclusive}}
                    </div>
                    <div>
                        Paid : {{$transaction->paid()}} USD $
                    </div>
                    <div class="m-1.5" >
                        <a href="/transactions/{{$transaction->id}}/add-payment" ><x-primary-button >{{ __('New Payment') }}</x-primary-button></a>
                    </div>
                    @foreach($payments as $payment)
                        <div>
                            {{$payment->amount}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
