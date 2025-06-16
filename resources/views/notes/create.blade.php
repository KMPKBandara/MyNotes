<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <div class="p-2 bg-gray-800 rounded-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-white">Create New Note</h2>
        </div>
    </x-slot>

    <div class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <!-- Main Form Card -->
            <div class="bg-gray-800 backdrop-blur-sm border border-gray-700 rounded-2xl shadow-2xl overflow-hidden">
                <div class="px-8 py-6 border-b border-gray-700 m-5">
                    <h3 class="text-lg font-semibold text-white">Note Details</h3>
                    <p class="text-gray-400 text-sm mt-1">Fill in the information below to create your note</p>
                </div>
                
                <form action="{{ route('notes.store') }}" method="POST" class="p-8 space-y-6">
                    @csrf
                    
                    <!-- Title Field -->
                    <div class="space-y-2">
                        <label for="title" class="block text-sm font-medium text-white">
                            Title
                            <span class="text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" 
                                   name="title" 
                                   id="title" 
                                   required
                                   placeholder="Enter note title..."
                                   class="w-full px-4 py-3 bg-gray-900 border border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-500" />
                        </div>
                    </div>

                    <!-- Description Field -->
                    <div class="space-y-2">
                        <label for="description" class="block text-sm font-medium text-white">
                            Description
                            <span class="text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <textarea name="description" 
                                      id="description" 
                                      rows="6" 
                                      required
                                      placeholder="Write your note content here..."
                                      class="w-full px-4 py-3 bg-gray-900 border border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-500 resize-vertical"></textarea>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-4">
                        <button type="submit"
                                class="flex-1 sm:flex-initial bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium px-8 py-3 rounded-xl transition-all duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-800 shadow-lg">
                            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Save Note
                        </button>
                        
                        <a href="{{ route('dashboard') }}" 
                           class="flex-1 sm:flex-initial text-center bg-gray-700 hover:bg-gray-600 text-white font-medium px-8 py-3 rounded-xl transition-all duration-200 border border-gray-600 hover:border-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Cancel
                        </a>
                    </div>
                </form>
            </div>

            <!-- Tips Card -->
            <div class="mt-6 bg-gray-800 border border-gray-700 rounded-xl p-6">
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-blue-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-white mb-1">Quick Tips</h4>
                        <ul class="text-sm text-gray-400 space-y-1">
                            <li>• Use descriptive titles to easily find your notes later</li>
                            <li>• Add relevant details in the description for better context</li>
                            <li>• You can always edit your notes after saving</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>