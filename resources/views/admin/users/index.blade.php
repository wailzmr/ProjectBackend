<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Admin · Users</h2>
    </x-slot>

    <div class="py-12 max-w-6xl mx-auto">
        <a href="{{ route('admin.users.create') }}"
           class="mb-4 inline-block px-4 py-2 bg-green-600 text-white rounded">
            Create user
        </a>

        <table class="w-full bg-white  border border-slate-200  dark:bg-slate-900 dark:border-slate-600
dark:text-slate-100
dark:placeholder-slate-500">
            <thead>
            <tr class="border-b">
                <th class="p-3 text-left">Name</th>
                <th>Email</th>
                <th>Admin</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="border-b">
                    <td class="p-3">{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->is_admin)
                            <span class="text-green-600 font-semibold">Yes</span>
                        @else
                            No
                        @endif
                    </td>
                    <td class="flex gap-2 p-3">
                        <a href="{{ route('admin.users.edit', $user) }}"
                           class="px-3 py-1 bg-blue-600 text-white rounded">
                            Edit
                        </a>

                        @if(auth()->id() !== $user->id)
                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 bg-red-600 text-white rounded">
                                    Delete
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>


