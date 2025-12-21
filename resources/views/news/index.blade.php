<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">News</h1>

        @foreach($news as $item)
            <div class="mb-6 border-b pb-4">
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
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
