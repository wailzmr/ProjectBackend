<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            Contact
        </h2>
    </x-slot>




            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('contact.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block font-medium text-gray-700 dark:text-gray-300">Name</label>
                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           class="w-full border rounded p-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                           required>
                    @error('name')
                    <p class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="w-full border rounded p-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                           required>
                    @error('email')
                    <p class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-gray-700 dark:text-gray-300">Subject</label>
                    <input type="text"
                           name="subject"
                           value="{{ old('subject') }}"
                           class="w-full border rounded p-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                           required>
                    @error('subject')
                    <p class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-4">
                    <label class="block font-medium text-gray-700 dark:text-gray-300">Message</label>
                    <textarea name="message"
                              class="w-full border rounded p-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                              rows="5"
                              required>{{ old('message') }}</textarea>
                    @error('message')
                    <p class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600">
                    Send message
                </button>
            </form>



</x-app-layout>

