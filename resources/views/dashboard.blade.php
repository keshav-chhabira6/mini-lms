<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Message -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-2">Welcome back, {{ Auth::user()->name }}!</h3>
                    <p class="text-gray-600">You're logged in to Mini-LMS</p>
                </div>
            </div>

            <!-- Session Data Display -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-bold mb-4">Session Information</h3>
                    
                    @if(session('user_data'))
                        @php
                            $userData = session('user_data');
                        @endphp
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h4 class="font-semibold text-lg mb-3 text-blue-600">User Details</h4>
                                <p class="mb-2"><strong>Username:</strong> {{ $userData['username'] }}</p>
                                <p class="mb-2"><strong>Email:</strong> {{ $userData['email'] }}</p>
                                <p class="mb-2"><strong>Role:</strong> <span class="bg-green-100 text-green-800 px-2 py-1 rounded">{{ $userData['role'] }}</span></p>
                            </div>
                            
                            <div>
                                <h4 class="font-semibold text-lg mb-3 text-purple-600">Session Stats</h4>
                                <p class="mb-2"><strong>Login Counter:</strong> <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded font-bold">{{ $userData['login_counter'] }}</span></p>
                                <p class="mb-2"><strong>Last Login:</strong> {{ $userData['last_login_time'] }}</p>
                            </div>
                        </div>

                        <div class="mt-6">
                            <h4 class="font-semibold text-lg mb-3 text-orange-600">Academic Information</h4>
                            <div class="bg-gray-50 p-4 rounded">
                                <p class="mb-2"><strong>Course:</strong> {{ $userData['academic_info']['course'] }}</p>
                                <p class="mb-2"><strong>Semester:</strong> {{ $userData['academic_info']['semester'] }}</p>
                                <p class="mb-2"><strong>Year:</strong> {{ $userData['academic_info']['year'] }}</p>
                            </div>
                        </div>

                        <div class="mt-6">
                            <h4 class="font-semibold text-lg mb-3 text-red-600">Raw JSON Data</h4>
                            <div class="bg-gray-900 text-green-400 p-4 rounded overflow-x-auto">
                                <pre>{{ session('user_data_json') }}</pre>
                            </div>
                        </div>
                    @else
                        <p class="text-gray-500">No session data available</p>
                    @endif
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-blue-500 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white">
                        <h4 class="text-lg font-semibold mb-2">Total Courses</h4>
                        <p class="text-3xl font-bold">{{ \App\Models\Course::count() }}</p>
                    </div>
                </div>
                
                <div class="bg-green-500 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white">
                        <h4 class="text-lg font-semibold mb-2">Faculty Members</h4>
                        <p class="text-3xl font-bold">{{ \App\Models\Faculty::count() }}</p>
                    </div>
                </div>
                
                <div class="bg-purple-500 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white">
                        <h4 class="text-lg font-semibold mb-2">Students</h4>
                        <p class="text-3xl font-bold">{{ \App\Models\Student::count() }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
