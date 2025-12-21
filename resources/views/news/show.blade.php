<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">{{ $news->title }}</h1>

        @if($news->image_path)
            <div class="w-full max-w-3xl mx-auto mb-4 overflow-hidden rounded bg-gray-100 h-64">
                <img
                    src="{{ asset('storage/' . $news->image_path) }}"
                    alt="{{ $news->title }}"
                    class="w-full h-full object-cover"
                >
            </div>
        @endif

        <p class="mb-4 text-gray-700">
            {{ $news->content }}
        </p>

        <p class="text-sm text-gray-600 mb-4">Published: {{ optional($news->published_at)->format('d/m/Y') }}</p>

        <a href="{{ route('news.index') }}" class="text-blue-600 underline">
            Back to news
        </a>
    </div>
</x-app-layout>
