<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Contact Us</h2>
    </x-slot>

    <div class="py-12 max-w-5xl mx-auto">
        <div class="bg-white rounded shadow divide-y border border-slate-200 dark:bg-slate-800 dark:border-slate-700 dark:text-slate-100">
            <div class="p-4">
                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium">Name</label>
                        <input type="text" name="name" id="name" class="w-full p-2 border rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium">Email</label>
                        <input type="email" name="email" id="email" class="w-full p-2 border rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="subject" class="block text-sm font-medium">Subject</label>
                        <input type="text" name="subject" id="subject" class="w-full p-2 border rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="message" class="block text-sm font-medium">Message</label>
                        <textarea name="message" id="message" class="w-full p-2 border rounded" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Send Message</button>
                </form>
            </div>

            @auth
                <div class="p-4">
                    <a href="{{ route('contacts.user.index') }}"
                       class="inline-flex items-center justify-center px-4 py-2 bg-emerald-600 text-white rounded hover:bg-emerald-700 transition">
                        View my contact messages
                    </a>
                </div>
            @endauth
        </div>
    </div>
</x-app-layout>
