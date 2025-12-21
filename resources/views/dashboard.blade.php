<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Gewone gebruiker --}}
            @if(!auth()->user()->is_admin)
                <div class="p-6 bg-white shadow rounded-lg">
                    <h3 class="text-lg font-semibold mb-2">Welcome</h3>
                    <p>You are logged in as a user.</p>
                </div>
            @endif

            {{-- Admin dashboard --}}
            @if(auth()->user()->is_admin)
                <div class="p-6 bg-white shadow rounded-lg">
                    <h3 class="text-lg font-semibold mb-4">Admin panel</h3>

                    <ul class="list-disc list-inside space-y-2">
                        <li>
                            <a href="{{ route('admin.news.create') }}" class="text-blue-600 underline">
                                Create news
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.news.index') }}" class="text-blue-600 underline">
                                Manage news
                            </a>
                        </li>
                        {{-- later --}}
                        {{-- <li>Manage FAQ</li> --}}
                        {{-- <li>View contact messages</li> --}}
                    </ul>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
