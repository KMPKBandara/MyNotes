<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold leading-tight text-gray-800">Your Notes</h2>
    </x-slot>

    <div class="py-6 px-4">
        @if(session('success'))
            <div class="mb-4 text-green-600 font-semibold">{{ session('success') }}</div>
        @endif

        <a href="{{ route('notes.create') }}"
           class="inline-block mb-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Add New Note
        </a>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($notes as $note)
                <div class="bg-white p-4 shadow rounded border">
                    <h3 class="text-lg font-bold text-gray-800">{{ $note->title }}</h3>
                    <p class="mt-2 text-gray-600">{{ $note->description }}</p>

                    <div class="mt-4 flex gap-2">
                        <a href="{{ route('notes.edit', $note) }}"
                           class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('notes.destroy', $note) }}" method="POST"
                              onsubmit="return confirm('Are you sure?')" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-600">You have no notes yet.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
