<x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
    {{ __('Dashboard') }}
</x-nav-link>

<x-nav-link :href="route('courses.index')" :active="request()->routeIs('courses.*')">
    {{ __('Courses') }}
</x-nav-link>

<x-nav-link :href="route('faculty.index')" :active="request()->routeIs('faculty.*')">
    {{ __('Faculty') }}
</x-nav-link>

<x-nav-link :href="route('students.index')" :active="request()->routeIs('students.*')">
    {{ __('Students') }}
</x-nav-link>
