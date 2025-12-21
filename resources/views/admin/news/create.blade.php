<x-app-layout>
    <div class="max-w-xl mx-auto py-8">
        <h1 class="text-xl font-bold mb-4">Create news</h1>

        <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
            @csrf

            <input name="title" placeholder="Title" class="w-full mb-3">

            <textarea name="content" placeholder="Content" class="w-full mb-3"></textarea>

            <input type="date" name="published_at" class="mb-3">

            <input type="file" name="image" class="mb-3">

            <button class="bg-black text-white px-4 py-2">Save</button>
        </form>
    </div>
</x-app-layout>

