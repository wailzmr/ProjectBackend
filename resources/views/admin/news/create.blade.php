<x-app-layout>
    <div class="max-w-xl mx-auto py-8">
        <h1 class="text-xl font-bold mb-4">Create news</h1>

        @if($errors->any())
            <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
            @csrf

            <label class="block mb-2 text-sm font-medium">Title</label>
            <input name="title" placeholder="Title" value="{{ old('title') }}" class="w-full mb-3 border rounded px-2 py-1" required>

            <label class="block mb-2 text-sm font-medium">Content</label>
            <textarea name="content" placeholder="Content" class="w-full mb-3 border rounded px-2 py-1" required>{{ old('content') }}</textarea>

            <label class="block mb-2 text-sm font-medium">Publish date</label>
            <input type="date" name="published_at" value="{{ old('published_at') }}" class="mb-3 border rounded px-2 py-1">

            <label class="block mb-2 text-sm font-medium">Image</label>
            <input type="file" name="image" class="mb-3">

            <div class="flex items-center gap-2">
                <button type="submit" class="bg-black text-white px-4 py-2 rounded">Save</button>
                <a href="{{ route('admin.news.index') }}" class="px-4 py-2 border rounded">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
