<x-app-layout>
    <div class="max-w-xl mx-auto py-8">
        <h1 class="text-xl font-bold mb-4">Edit news</h1>

        <form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input name="title" value="{{ $news->title }}" class="w-full
        border border-slate-300 dark:border-slate-600
        rounded p-2
        bg-white dark:bg-slate-900
        text-slate-900 dark:text-slate-100
        placeholder-slate-400 dark:placeholder-slate-500
        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

            <textarea name="content" class="w-full
        border border-slate-300 dark:border-slate-600
        rounded p-2
        bg-white dark:bg-slate-900
        text-slate-900 dark:text-slate-100
        placeholder-slate-400 dark:placeholder-slate-500
        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">{{ $news->content }}</textarea>

            <input type="date" name="published_at"
                   value="{{ optional($news->published_at)->format('Y-m-d') }}"
                   class="w-full
        border border-slate-300 dark:border-slate-600
        rounded p-2
        bg-white dark:bg-slate-900
        text-slate-900 dark:text-slate-100
        placeholder-slate-400 dark:placeholder-slate-500
        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

            <input type="file" name="image" class="mb-3">

            <button class="bg-black text-white px-4 py-2">Update</button>
        </form>
    </div>
</x-app-layout>
