<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-white">Edit Note</h2>
    </x-slot>

    <div class="flex items-center justify-center min-h-[70vh] px-4 py-6">
        <form action="{{ route('notes.update', $note) }}" method="POST" class="w-full max-w-xl space-y-5 bg-gray-800 p-6 rounded-xl shadow-md">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-white">Title</label>
                <input type="text" name="title" id="title" value="{{ $note->title }}" required
                       class="w-full mt-1 border border-gray-300 rounded px-3 py-2 bg-white text-black placeholder-gray-500 focus:outline-none focus:ring focus:ring-blue-400" />
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-white">Description</label>
                <textarea name="description" id="description" rows="4" required
                          class="w-full mt-1 border border-gray-300 rounded px-3 py-2 bg-white text-black placeholder-gray-500 focus:outline-none focus:ring focus:ring-blue-400">{{ old('description', $note->description) }}</textarea>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                        class="bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700 transition">
                    Update
                </button>
                <a href="{{ route('dashboard') }}" class="text-sm text-gray-300 hover:underline">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
