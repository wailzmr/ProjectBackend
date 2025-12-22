<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            Contact
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">

            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('contact.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block font-medium">Name</label>
                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           class="w-full border rounded p-2"
                           required>
                    @error('name')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Email</label>
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="w-full border rounded p-2"
                           required>
                    @error('email')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Subject</label>
                    <input type="text"
                           name="subject"
                           value="{{ old('subject') }}"
                           class="w-full border rounded p-2"
                           required>
                    @error('subject')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-4">
                    <label class="block font-medium">Message</label>
                    <textarea name="message"
                              class="w-full border rounded p-2"
                              rows="5"
                              required>{{ old('message') }}</textarea>
                    @error('message')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Send message
                </button>
            </form>

        </div>
    </div>
</x-app-layout>

