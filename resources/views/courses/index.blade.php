<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-2xl font-bold">All Courses</h3>
                        <a href="{{ route('courses.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Create New Course
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($courses->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($courses as $course)
                                <div class="border rounded-lg p-4 hover:shadow-lg transition">
                                    <h4 class="text-xl font-semibold mb-2">{{ $course->title }}</h4>
                                    <p class="text-gray-600 mb-4">{{ Str::limit($course->description, 100) }}</p>
                                    <p class="text-sm text-gray-500 mb-4">By: {{ $course->user->name }}</p>
                                    
                                    <div class="flex gap-2">
                                        <a href="{{ route('courses.show', $course) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-sm">
                                            View
                                        </a>
                                        
                                        @if($course->user_id === Auth::id())
                                            <a href="{{ route('courses.edit', $course) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded text-sm">
                                                Edit
                                            </a>
                                            
                                            <form action="{{ route('courses.destroy', $course) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-sm" onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">No courses available yet. Create one!</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
