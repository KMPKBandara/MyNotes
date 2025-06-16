<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800">Edit Note</h2>
    </x-slot>

    <div class="py-6 px-4">
        <form action="{{ route('notes.update', $note) }}" method="POST" class="max-w-xl space-y-4">
            @csrf @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium">Title</label>
                <input type="text" name="title" id="title" value="{{ $note->title }}" required
                       class="w-full mt-1 border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" />
            </div>

            <div>
                <label for="description" class="block text-sm font-medium">Description</label>
                <textarea name="description" id="description" rows="4" required
                          class="w-full mt-1 border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ $note->description }}</textarea>
            </div>

            <div>
                <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                    Update
                </button>
                <a href="{{ route('dashboard') }}" class="ml-3 text-gray-600 hover:underline">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
