<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            Edit user
        </h2>
    </x-slot>

    <div class="py-12 max-w-xl mx-auto">
        <div class="bg-white p-6 rounded border border-slate-200 dark:bg-slate-800 dark:border-slate-700 text-slate-800
dark:text-slate-100
dark:placeholder-slate-500">

            <form method="POST" action="{{ route('admin.users.update', $user) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-medium">Name</label>
                    <input type="text"
                           name="name"
                           value="{{ old('name', $user->name) }}"
                           class="w-full
        border border-slate-300 dark:border-slate-600
        rounded p-2
        bg-white dark:bg-slate-900
        text-slate-900 dark:text-slate-100
        placeholder-slate-400 dark:placeholder-slate-500
        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                           required>
                    @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Username</label>
                    <input type="text"
                           name="username"
                           value="{{ old('username', $user->username) }}"
                           class="w-full
        border border-slate-300 dark:border-slate-600
        rounded p-2
        bg-white dark:bg-slate-900
        text-slate-900 dark:text-slate-100
        placeholder-slate-400 dark:placeholder-slate-500
        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                           required>
                    @error('username') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Email</label>
                    <input type="email"
                           name="email"
                           value="{{ old('email', $user->email) }}"
                           class="w-full
        border border-slate-300 dark:border-slate-600
        rounded p-2
        bg-white dark:bg-slate-900
        text-slate-900 dark:text-slate-100
        placeholder-slate-400 dark:placeholder-slate-500
        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                           required>
                    @error('email') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">
                        New password (leave empty to keep current)
                    </label>
                    <input type="password"
                           name="password"
                           class="w-full
        border border-slate-300 dark:border-slate-600
        rounded p-2
        bg-white dark:bg-slate-900
        text-slate-900 dark:text-slate-100
        placeholder-slate-400 dark:placeholder-slate-500
        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @error('password') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Confirm password</label>
                    <input type="password"
                           name="password_confirmation"
                           class="w-full
        border border-slate-300 dark:border-slate-600
        rounded p-2
        bg-white dark:bg-slate-900
        text-slate-900 dark:text-slate-100
        placeholder-slate-400 dark:placeholder-slate-500
        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                @if(auth()->id() !== $user->id)
                    <div class="mb-4 flex items-center gap-2">
                        {{-- Always send a value --}}
                        <input type="hidden" name="is_admin" value="0">

                        <input type="checkbox"
                               name="is_admin"
                               id="is_admin"
                               value="1"
                            @checked(old('is_admin', $user->is_admin))>

                        <label for="is_admin">Admin</label>
                    </div>

                    @error('is_admin')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                @else
                    <p class="text-sm text-gray-600 mb-4">
                        You cannot change your own admin rights.
                    </p>
                @endif


                <div class="flex gap-2">
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Save
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
