@props(['type' => '', 'user' => ''])

<form class="box-content w-96 rounded-2xl bg-white p-4 sm:px-8 md:px-16 md:py-8"
      @if ($type === 'signup') action="{{ route('storeUser') }}"
      @elseif ($type === 'login') action="{{ route('storeSession') }}"
      @elseif ($type === 'updateProfile') action="{{ route('updateUser', ['user' => $user->id]) }}" @endif
      method="POST">
    @if ($type === 'updateProfile')
        @method('PATCH')
    @endif
    @csrf
    @if ($type === 'signup' || $type === 'login')
        <h1 class="mb-8 text-center text-3xl font-bold tracking-tight text-gray-900">
            @if ($type === 'signup')
                Sign Up
            @elseif ($type === 'login')
                Log In
            @endif
        </h1>
    @endif

    @if ($type === 'signup' || $type === 'updateProfile')
        <div class="flex-row md:flex">
            <div class="mb-4 md:mr-4">
                <x-form-label for="first_name">First Name</x-form-label>
                <x-form-input full="true"
                              type="text"
                              name="first_name"
                              id="first_name"
                              outline="true" />
            </div>
            <div class="mb-4">
                <x-form-label for="last_name">Last Name</x-form-label>
                <x-form-input full="true"
                              type="text"
                              name="last_name"
                              id="last_name"
                              outline="true" />
            </div>
        </div>
        <div class="mb-4 block">
            <x-form-label for="employer_name">Company Name (optional)</x-form-label>
            <x-form-input full="true"
                          type="text"
                          name="employer_name"
                          id="employer_name"
                          outline="true" />
        </div>
    @endif

    <div class="mb-4 block">
        <x-form-label for="email">Email</x-form-label>
        <x-form-input full="true"
                      type="email"
                      name="email"
                      id="email"
                      outline="true" />
    </div>
    <div class="mb-4 block">
        <x-form-label for="password">Password</x-form-label>
        <x-form-input full="true"
                      type="password"
                      name="password"
                      id="password"
                      outline="true" />
    </div>

    @if ($type === 'login')
        @error('credentials')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
        @enderror
    @endif

    @if ($type === 'signup' || $type === 'updateProfile')
        <div class="mb-4 block">
            <x-form-label for="password">Confirm Password</x-form-label>
            <x-form-input full="true"
                          type="password"
                          name="password_confirmation"
                          id="password_confirmation"
                          outline="true" />
        </div>
    @endif

    <x-primary-button type="submit"
                      class="mb-2">
        @if ($type === 'signup')
            Sign Up
        @elseif ($type === 'login')
            Log In
        @elseif ($type === 'updateProfile')
            Update Profile
        @endif
    </x-primary-button>

    @if ($type != 'updateProfile')
        <p class="mb-2">Or</p>
        <a href="
        @if ($type === 'signup') {{ route('login') }}
        @elseif ($type === 'login') {{ route('signup') }} @endif"
           class="switchAuthLink mb-2 inline-block">
            @if ($type === 'signup')
                Log in
            @elseif ($type === 'login')
                Sign up
            @endif
        </a>
    @endif

    @if ($errors->any())
        <div class="text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>
