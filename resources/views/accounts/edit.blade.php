<x-app-layout>
  <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    <div class="mt-6 p-6 bg-white shadow-sm rounded-lg divide-y">
      <h2 class="text-center font-bold text-xl"> Update Account </h2>
      <form method="POST" action="{{ route('accounts.update', ['account' => $account->id]) }}">
              @csrf
              @method("PUT")
              <div class="my-2"> 
                <label class="mx-1 font-semibold"> Account Name </label>
                <input name="account_name" placeholder="{{ __('Write account name') }}"
                value="{{ old('account_name', $account->account_name) }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                </input>
              </div>
              <div class="my-2"> 
                <label class="mx-1 font-semibold"> Account Type </label>
                <input name="account_type" placeholder="{{ __('Write account type') }}"
                    value="{{ old('account_type', $account->account_type) }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                </input>
              </div>
              <div class="my-2"> 
                <label class="mx-1 font-semibold"> Account Balance </label>
                <input name="balance" placeholder="{{ __('Write account balance') }}"
                    value="{{ old('balance', $account->balance) }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                </input>
              </div>
              <x-input-error :messages="$errors->get('balance')" class="mt-2" />
              <x-primary-button class="mt-4">{{ __('Update') }}</x-primary-button>
          </form>
      </div>
  </div>
</x-app-layout>
