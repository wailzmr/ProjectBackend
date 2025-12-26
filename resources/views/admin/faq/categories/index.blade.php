<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Admin · FAQ Categories</h2>
    </x-slot>

    <div class="py-12 max-w-5xl mx-auto space-y-4">
        <a href="{{ route('admin.faq-categories.create') }}"
           class="px-4 py-2 bg-green-600 text-white rounded">
            Create category
        </a>

        <div class="bg-white p-6 dark:border-slate-600
dark:bg-slate-900
dark:text-slate-100
dark:placeholder-slate-500">
            @foreach($categories as $category)
                <div class="flex justify-between items-center border-b py-3">
                    <span>{{ $category->name }}</span>

                    <div class="flex gap-2">
                        <a href="{{ route('admin.faq-categories.edit', $category) }}"
                           class="px-3 py-1 bg-blue-600 text-white rounded">
                            Edit
                        </a>

                        <form method="POST"
                              action="{{ route('admin.faq-categories.destroy', $category) }}">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 bg-red-600 text-white rounded">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
