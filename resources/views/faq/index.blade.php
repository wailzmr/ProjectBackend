<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">FAQ</h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto space-y-6">
        @foreach($categories as $category)
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-semibold text-lg mb-3">
                    {{ $category->name }}
                </h3>

                @foreach($category->faqs as $faq)
                    <div class="mb-4">
                        <strong>{{ $faq->question }}</strong>
                        <p class="text-gray-700">{{ $faq->answer }}</p>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</x-app-layout>
