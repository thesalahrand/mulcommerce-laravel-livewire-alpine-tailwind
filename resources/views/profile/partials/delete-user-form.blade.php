<section class="w-full max-w-3xl space-y-6">
  <header>
    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
      {{ __('Delete Account') }}
    </h2>

    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
      {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
    </p>
  </header>

  {{-- <x-danger-button x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete Account') }}</x-danger-button>

      <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
          @csrf
          @method('delete')

          <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Are you sure you want to delete your account?') }}
          </h2>

          <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
          </p>

          <div class="mt-6">
            <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

            <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
              placeholder="{{ __('Password') }}" />

            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
          </div>

          <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
              {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
              {{ __('Delete Account') }}
            </x-danger-button>
          </div>
        </form>
      </x-modal> --}}

  <div x-data="customModalHandler('#confirm-user-deletion-modal', @js($errors->userDeletion->isNotEmpty()))">
    <x-regular-button type="button" color="red" @click="show">
      {{ __('Delete Account') }}
    </x-regular-button>

    <template x-teleport="body">
      <div id="confirm-user-deletion-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[53] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
        x-init="isToShowOnPageLoad()">
        <div class="relative p-4 w-full max-w-md max-h-full">
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
              <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                {{ __('Are you sure you want to delete your account?') }}
              </h3>
              <button type="button"
                class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                @click="hide">
                <x-icons.close-icon class="w-3 h-3" />
                <span class="sr-only">Close modal</span>
              </button>
            </div>
            <div class="p-4 md:p-5">
              <form action="{{ route('profile.destroy') }}" method="post">
                @csrf
                @method('delete')

                <p class="text-sm text-gray-500 dark:text-gray-400">
                  {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                </p>

                <div class="mt-6">
                  <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                  <x-text-input id="password" name="password" type="password" placeholder="{{ __('Password') }}"
                    required />

                  <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                  <x-regular-button type="button" color="light" @click="hide">
                    {{ __('Cancel') }}
                  </x-regular-button>

                  <x-regular-button color="red" class="ms-3">
                    {{ __('Delete Account') }}
                  </x-regular-button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </template>
  </div>
</section>
