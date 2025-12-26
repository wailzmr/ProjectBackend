<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold tracking-tight text-slate-900">News</h1>
            <a href="{{ route('admin.news.create') }}"
               class="inline-flex items-center px-5 py-2.5 bg-slate-900 text-white rounded-xl font-medium hover:bg-slate-800 transition">
                Create news</a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @foreach($news as $item)
            <div class="mb-6 bg-white rounded-2xl p-6 shadow-sm border border-slate-200">

            <div class="flex flex-col sm:flex-row gap-4 items-start">
                    @if($item->image_path)
                        <div class="w-full sm:w-56 md:w-64 lg:w-72 h-40 md:h-44 lg:h-48 flex-shrink-0 overflow-hidden rounded bg-gray-100">
                            <img
                                src="{{ asset('storage/' . $item->image_path) }}"
                                alt="{{ $item->title }}"
                                class="w-full h-full object-cover"
                            >
                        </div>
                    @endif

                    <div class="flex-1">
                        <h2 class="text-xl font-semibold">
                            <a href="{{ route('news.show', $item) }}">
                                {{ $item->title }}
                            </a>
                        </h2>

                        <p class="text-sm text-gray-600 mt-2">
                            {{ optional($item->published_at)->format('d/m/Y') }}
                        </p>

                        <div class="mt-3 flex gap-2">
                            <a href="{{ route('admin.news.edit', $item) }}" class="px-3 py-1 border rounded">Edit</a>

                            <form action="{{ route('admin.news.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this news item?');" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
