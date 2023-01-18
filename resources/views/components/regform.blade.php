<div class="mx-auto w-2/6">
    <h1 class="text-center block mb-10 uppercase font-bold text-xl text-gray-700">User Registration</h1>
    <form method="POST" action="/register">
        @csrf
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="username">
                    Username
                </label>
                <input class="border border-gray-400 p-2 w-full"
                       type="text"
                       name="username"
                       id="username"
                       value="{{ old('username') }}"
                       required>
                @error('username')
                    <x-error>{{$message}}</x-error>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="name">
                    Name
                </label>
                <input class="border border-gray-400 p-2 w-full"
                       type="text"
                       name="name"
                       id="name"
                       value="{{ old('name') }}"
                       required>
                @error('name')
                <x-error>{{$message}}</x-error>
                @enderror
            </div>
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
                       for="phone">
                    Phone number
                </label>
                <input class="border border-gray-400 p-2 w-full"
                       type="number"
                       name="phone"
                       id="phone"
                       value="{{ old('phone') }}"
                       required>
                @error('phone')
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
                    Register
                </x-primary-button>
            </div>
    </form>
    <h3 class="text-center block my-2 text-sm text-gray-700">Already have an account? <a href="/login" class="hover:text-green-500 px-3 py-2">Log in</a></h3>
</div>
