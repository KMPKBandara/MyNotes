<x-app-layout>
    <x-slot name="header">
        <div class="bg-gray-900 dark:bg-gray-900 border-b border-gray-800 dark:border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <h2 class="text-3xl font-bold leading-tight text-white dark:text-white bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                    Your Notes
                </h2>
                <p class="mt-2 text-gray-400 dark:text-gray-400">Organize your thoughts and ideas</p>
            </div>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gray-900 dark:bg-gray-900">
        <div class="py-8 px-4 max-w-7xl mx-auto">
            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-900/20 border border-green-800 rounded-lg backdrop-blur-sm">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-green-300 font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Add New Note Button -->
            <div class="mb-8">
                <a href="{{ route('notes.create') }}"
                   class="group inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-xl font-bold text-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 ease-in-out">
                    <svg class="w-6 h-6 group-hover:rotate-90 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add New Note
                </a>
            </div>

            <!-- Notes Grid -->
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @forelse ($notes as $note)
                    <div class="group bg-gray-800/50 dark:bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 dark:border-gray-700/50 p-6 rounded-xl shadow-lg hover:shadow-2xl hover:bg-gray-800/70 dark:hover:bg-gray-800/70 transform hover:scale-105 transition-all duration-300 ease-in-out">
                        <!-- Note Header -->
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-white dark:text-white group-hover:text-blue-400 transition-colors duration-200 line-clamp-2">
                                    {{ $note->title }}
                                </h3>
                            </div>
                            <div class="ml-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Note Content -->
                        <p class="text-gray-300 dark:text-gray-300 leading-relaxed mb-6 line-clamp-3">
                            {{ $note->description }}
                        </p>

                        <!-- Note Actions -->
                        <div class="flex items-center justify-between pt-4 border-t border-gray-700/50 dark:border-gray-700/50">
                            <div class="flex gap-4">
                                <a href="{{ route('notes.edit', $note) }}"
                                   class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 group/edit">
                                    <svg class="w-4 h-4 group-hover/edit:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </a>
                                
                                <form action="{{ route('notes.destroy', $note) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this note?')" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 group/delete">
                                        <svg class="w-4 h-4 group-hover/delete:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                            
                            <!-- Note Meta -->
                            <div class="text-xs text-gray-300 dark:text-gray-300 font-medium">
                                <time>{{ $note->created_at->diffForHumans() }}</time>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Empty State -->
                    <div class="col-span-full flex flex-col items-center justify-center py-16">
                        <div class="bg-gray-800/30 dark:bg-gray-800/30 rounded-full p-6 mb-6">
                            <svg class="w-16 h-16 text-gray-600 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-400 dark:text-gray-400 mb-2">No notes yet</h3>
                        <p class="text-gray-500 dark:text-gray-500 text-center max-w-md mb-6">
                            Start organizing your thoughts by creating your first note. Ideas, reminders, or anything you want to remember.
                        </p>
                        <a href="{{ route('notes.create') }}"
                           class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-xl font-bold text-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 ease-in-out">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Create Your First Note
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</x-app-layout>