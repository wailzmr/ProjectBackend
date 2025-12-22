<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            Create user
        </h2>
    </x-slot>

    <div class="py-12 max-w-xl mx-auto">
        <div class="bg-white p-6 rounded shadow">

            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block font-medium">Name</label>
                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           class="w-full border rounded p-2"
                           required>
                    @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Username</label>
                    <input type="text"
                           name="username"
                           value="{{ old('username') }}"
                           class="w-full border rounded p-2"
                           required>
                    @error('username') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Email</label>
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="w-full border rounded p-2"
                           required>
                    @error('email') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Password</label>
                    <input type="password"
                           name="password"
                           class="w-full border rounded p-2"
                           required>
                    @error('password') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Confirm password</label>
                    <input type="password"
                           name="password_confirmation"
                           class="w-full border rounded p-2"
                           required>
                </div>

                <div class="mb-4 flex items-center gap-2">
                    <input type="hidden" name="is_admin" value="0">

                    <input type="checkbox"
                           name="is_admin"
                           id="is_admin"
                           value="1"
                        @checked(old('is_admin'))>

                    <label for="is_admin">Admin</label>
                </div>
                @error('is_admin') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror


                <div class="flex gap-2">
                    <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        Create
                    </button>

                    <a href="{{ route('admin.users.index') }}"
                       class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                        Cancel
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
