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

<body class="min-w-80 h-full">
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto p-4 sm:px-8 sm:py-2"
                 style="max-width:84rem;">
                <div class="flex items-center justify-between sm:h-16">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8 mr-2"
                                 src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500"
                                 alt="Your Company">
                        </div>
                        <div class="flex items-baseline space-x-4">
                            <x-primary-nav />
                        </div>
                    </div>
                    <div class="flex items-center">
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
                <div class="mx-auto px-4 py-4 sm:px-8 sm:py-8"
                     style="max-width:84rem;">
                    @yield('page-header')
                </div>
            </header>
            <main>
                <div class="mx-auto px-4 py-4 sm:px-8 sm:py-8"
                     style="max-width:84rem;">
                    @yield('content')
                </div>
            </main>
        @else
            <main class="mx-auto flex items-center justify-center"
                  style="min-height: calc(100vh - 8rem); max-width:84rem;">
                @yield('content')
            </main>
        @endif
    </div>
</body>

</html>
