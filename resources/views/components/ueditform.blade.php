<div class="mx-auto w-2/6">
    <h1 class="text-center block mb-10 uppercase font-bold text-xl text-gray-700">Edit user information</h1>
    <form method="POST" action="/update">
        @csrf
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="name">
                Name
            </label>
            <input class="border border-gray-400 p-2 w-full"
                   type="text"
                   name="name"
                   id="name"
                   value="{{ auth()->user()->name }}"
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
                   value="{{ auth()->user()->email  }}"
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
                   value="{{ auth()->user()->phone  }}"
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
                   id="password">
            @error('password')
            <x-error>{{$message}}</x-error>
            @enderror
        </div>
        <div>
            <x-primary-button type="submit" class="w-full bg-gray-800 text-white hover:bg-gray-700 hover:text-white">
                Update my information
            </x-primary-button>
        </div>
    </form>
</div>
