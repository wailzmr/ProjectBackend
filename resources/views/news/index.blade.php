<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">News</h1>

        @foreach($news as $item)
            <div class="mb-6 border-b pb-4">
                <h2 class="text-xl font-semibold">
                    <a href="{{ route('news.show', $item) }}">
                        {{ $item->title }}
                    </a>
                </h2>

                @if($item->image_path)
                    <img
                        src="{{ asset('storage/' . $item->image_path) }}"
                        class="w-full max-w-md my-2"
                    >
                @endif

                <p class="text-sm text-gray-600">
                    {{ optional($item->published_at)->format('d/m/Y') }}
                </p>
            </div>
        @endforeach
    </div>
</x-app-layout>
