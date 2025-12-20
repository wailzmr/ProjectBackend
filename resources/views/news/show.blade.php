<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">{{ $news->title }}</h1>

        @if($news->image_path)
            <img
                src="{{ asset('storage/' . $news->image_path) }}"
                class="w-full max-w-lg mb-4"
            >
        @endif

        <p class="mb-4 text-gray-700">
            {{ $news->content }}
        </p>

        <a href="{{ route('news.index') }}" class="text-blue-600 underline">
            Back to news
        </a>
    </div>
</x-app-layout>
