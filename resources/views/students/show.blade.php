<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="mb-6">
                        <h3 class="text-3xl font-bold mb-4">{{ $student->name }}</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-700 mb-2">Contact Information</h4>
                            <p class="text-gray-600 mb-1"><strong>Email:</strong> {{ $student->email }}</p>
                            <p class="text-gray-600 mb-1"><strong>Phone:</strong> {{ $student->phone }}</p>
                        </div>
                        
                        <div>
                            <h4 class="text-lg font-semibold text-gray-700 mb-2">Academic Information</h4>
                            <p class="text-gray-600 mb-1"><strong>Roll Number:</strong> {{ $student->roll_number }}</p>
                            <p class="text-gray-600 mb-1"><strong>Program:</strong> {{ $student->program }}</p>
                        </div>
                    </div>

                    <div class="mb-6">
                        <p class="text-gray-500 text-sm">Added by: <strong>{{ $student->user->name }}</strong></p>
                        <p class="text-gray-500 text-sm">Added on: {{ $student->created_at->format('M d, Y') }}</p>
                    </div>

                    <div class="flex gap-4">
                        <a href="{{ route('students.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Back to Students List
                        </a>
                        
                        @if($student->user_id === Auth::id())
                            <a href="{{ route('students.edit', $student) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                Edit
                            </a>
                            
                            <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
