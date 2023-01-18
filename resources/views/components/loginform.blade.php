<div class="mx-auto w-2/6">
    <h1 class="text-center block mb-10 uppercase font-bold text-xl text-gray-700">Login</h1>
    <form method="POST" action="/sessions">
        @csrf
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="email">
                Email
            </label>
            <input class="border border-gray-400 p-2 w-full"
                   type="email"
                   name="email"
                   id="email"
                   value="{{ old('email') }}"
                   required>
            @error('email')
            <x-error>{{$message}}</x-error>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="password">
                Password
            </label>
            <input class="border border-gray-400 p-2 w-full"
                   type="password"
                   name="password"
                   id="password"
                   required>
            @error('password')
            <x-error>{{$message}}</x-error>
            @enderror
        </div>
        <div>
            <x-primary-button type="submit" class="w-full bg-gray-800 text-white hover:bg-gray-700 hover:text-white">
                Login
            </x-primary-button>
        </div>
    </form>
    <h3 class="text-center block my-2 text-sm text-gray-700">Don't have an account? <a href="/register" class="hover:text-red-500 px-3 py-2">Register</a></h3>
</div>
