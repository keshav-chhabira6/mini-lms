<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="mb-6">
                        <h3 class="text-3xl font-bold mb-4">{{ $course->title }}</h3>
                        <p class="text-gray-600 mb-2">Created by: <strong>{{ $course->user->name }}</strong></p>
                        <p class="text-gray-500 text-sm">Created: {{ $course->created_at->format('M d, Y') }}</p>
                    </div>

                    <div class="mb-6">
                        <h4 class="text-xl font-semibold mb-2">Description</h4>
                        <p class="text-gray-700 leading-relaxed">{{ $course->description }}</p>
                    </div>

                    <div class="flex gap-4">
                        <a href="{{ route('courses.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Back to Courses
                        </a>
                        
                        @if($course->user_id === Auth::id())
                            <a href="{{ route('courses.edit', $course) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                Edit Course
                            </a>
                            
                            <form action="{{ route('courses.destroy', $course) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure you want to delete this course?')">
                                    Delete Course
                                </button>
                            </form>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
