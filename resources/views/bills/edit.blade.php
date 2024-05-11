<x-app-layout>
  <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    <div class="mt-6 p-6 bg-white shadow-sm rounded-lg divide-y">
      <h2 class="text-center font-bold text-xl"> Update Account </h2>
      <form method="POST" action="{{ route('bills.update', ['bill' => $bill->id]) }}">
              @csrf
              @method("PUT")
              <div class="my-2"> 
                <label class="mx-1 font-semibold"> Bill Name </label>
                <input name="bill_name" placeholder="{{ __('Write bill name') }}"
                value="{{ old('bill_name', $bill->bill_name) }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                </input>
              </div>
              <div class="my-2"> 
                <label class="mx-1 font-semibold"> Bill Frequency </label>
                <input name="frequency" placeholder="{{ __('Write bill frequency') }}"
                    value="{{ old('frequency', $bill->frequency) }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                </input>
              </div>
              <div class="my-2"> 
                <label class="mx-1 font-semibold"> Bill Due Date </label>
                <input name="due_date" placeholder="{{ __('yyyy-mm-dd') }}"
                    value="{{ old('due_date', $bill->due_date) }}" 
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                </input>
              </div>
              <div class="my-2"> 
                <label class="mx-1 font-semibold"> Bill Amount </label>
                <input name="amount" placeholder="{{ __('Write bill amount') }}"
                    value="{{ old('amount', $bill->amount) }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                </input>
              </div>
              <x-input-error :messages="$errors->get('amount')" class="mt-2" />
              <x-primary-button class="mt-4">{{ __('Update') }}</x-primary-button>
          </form>
      </div>
  </div>
</x-app-layout>
