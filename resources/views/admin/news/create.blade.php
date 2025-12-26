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
            <input name="title" placeholder="Title" value="{{ old('title') }}" class="w-full
        border border-slate-300 dark:border-slate-100
        rounded p-2
        bg-white dark:bg-slate-900
        text-slate-900 dark:text-slate-100
        placeholder-slate-400 dark:placeholder-slate-100
        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>

            <label class="block mb-2 text-sm font-medium">Content</label>
            <textarea name="content" placeholder="Content" class="w-full
        border border-slate-300 dark:border-slate-100
        rounded p-2
        bg-white dark:bg-slate-900
        text-slate-900 dark:text-slate-100
        placeholder-slate-400 dark:placeholder-slate-100
        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>{{ old('content') }}</textarea>

            <label class="block mb-2 text-sm font-medium ">Publish date</label>
            <input
                type="date"
                name="published_at"
                value="{{ old('published_at') }}"
                class="mb-3
        border border-slate-300 dark:border-slate-600
        rounded px-2 py-1
        bg-white dark:bg-slate-900
        text-slate-900 dark:text-slate-100
        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
    "
            >

            <label class="block mb-2 text-sm font-medium">Image</label>
            <input type="file" name="image" class="mb-3">

            <div class="flex items-center gap-2">
                <button type="submit" class="bg-black text-white px-4 py-2 rounded">Save</button>
                <a href="{{ route('admin.news.index') }}" class="px-4 py-2 border rounded">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
