<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full min-w-80">
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex sm:h-16 items-start sm:items-center justify-between pt-2 sm:pt-0">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8 ml-3"
                                 src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500"
                                 alt="Your Company">
                        </div>
                        <div class="sm:ml-4 flex items-baseline space-x-4">
                            <x-primary-nav />
                        </div>
                    </div>
                    <div class="flex items-center mx-4">
                        @guest
                            <x-nav-link routeName="login">Log in</x-nav-link>
                        @endguest
                        @auth
                            <form action="{{ route('destroySession') }}"
                                  method="POST">
                                @csrf
                                <x-primary-button type="submit"
                                                  linkAppearance="true"
                                                  class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white md:inline">
                                    Log out
                                </x-primary-button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
        @if (request()->route()->getName() != 'login' && request()->route()->getName() != 'signup')
            <header class="bg-white shadow">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    @yield('page-header')
                </div>
            </header>
            <main>
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    @yield('content')
                </div>
            </main>
        @else
            <main class="mx-auto box-border flex max-w-7xl items-center justify-center px-4 py-6 sm:px-6 lg:px-8"
                  style="min-height: calc(100vh - 8rem)">
                @yield('content')
            </main>
        @endif
    </div>
</body>

</html>
