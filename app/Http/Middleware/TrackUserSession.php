<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TrackUserSession
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            // Get existing login counter or initialize to 0
            $loginCounter = session('login_counter', 0);
            
            // Check if this is a new login (not just a page refresh)
            if (!session()->has('user_session_initialized')) {
                $loginCounter++;
                session(['login_counter' => $loginCounter]);
                session(['user_session_initialized' => true]);
            }
            
            // Create user data array
            $userData = [
                'username' => $user->name,
                'email' => $user->email,
                'role' => 'Student', // You can make this dynamic later
                'login_counter' => $loginCounter,
                'last_login_time' => now()->format('Y-m-d H:i:s'),
                'academic_info' => [
                    'course' => 'Computer Science',
                    'semester' => 'Fall 2024',
                    'year' => '2024'
                ]
            ];
            
            // Convert to JSON and store in session
            $userDataJson = json_encode($userData);
            session(['user_data_json' => $userDataJson]);
            session(['user_data' => $userData]);
        }
        
        return $next($request);
    }
}
