@php
    $total_balance = 00.0;
    foreach ($bills as $bill) {
        $total_balance += $bill->amount;
    }

@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bills') }}
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
      <div class="flex justify-end"> 
        <x-primary-button class="ms-3" x-on:click.prevent >
          <a href="{{route('bills.create')}}"> 
            {{ __('Add Bill') }}
          </a>
        </x-primary-button>
      </div>
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <div class="p-6 flex space-x-2 justify-between">
                <p class="text-xl font-semibold">Total bill to be paid: </p>
                <p class="text-xl font-semibold"> {{ $total_balance }} TK</p>
            </div>
        </div>
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($bills as $bill)
                <div class="p-6 flex space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">Bill No</span>
                                <small class="ml-2 text-sm text-gray-600">{{ $loop->iteration }}</small>
                                {{-- <small class="ml-2 text-sm text-gray-600">{{ $account->created_at->format('j M Y, g:i a') }}</small> --}}
                            </div>
                            <x-dropdown>
                              <x-slot name="trigger">
                                  <button>
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                          <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                      </svg>
                                  </button>
                              </x-slot>
                              <x-slot name="content">
                                  <x-dropdown-link :href="route('bills.edit', $bill->id)">
                                      {{ __('Edit') }}
                                  </x-dropdown-link>
                                  <form method="POST" action="{{ route('bills.destroy', $bill) }}">
                                      @csrf
                                      @method('delete')
                                      <x-dropdown-link :href="route('bills.destroy', $bill)" onclick="event.preventDefault(); this.closest('form').submit();">
                                          {{ __('Delete') }}
                                      </x-dropdown-link>
                                  </form>
                              </x-slot>
                          </x-dropdown>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                              <p class="mt-4 text-lg text-gray-900 capitalize">Bill Name: {{ $bill->bill_name }}</p>
                              <p class="mt-4 text-lg text-gray-900 capitalize">Bill Frequency: {{ $bill->frequency }}</p>
                              <p class="mt-4 text-lg text-gray-900">Due Date: {{ $bill->due_date }}</p>
                            </div>
                            <p class="mt-4 text-lg text-gray-900">{{ $bill->amount }} Tk</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
