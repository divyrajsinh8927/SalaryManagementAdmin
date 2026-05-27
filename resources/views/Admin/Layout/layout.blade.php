@include('Admin.Layout.header')
<div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
@include('Admin.Layout.sidebar')

<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
    @include('Admin.Layout.navbar')
    @yield('content')
</main>
@include('Admin.Layout.themebar')
@include('Admin.Layout.footer')
