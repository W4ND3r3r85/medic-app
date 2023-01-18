<form method="post" action="/logout">
    @csrf
    <x-primary-button type="submit" class="px-3 py-2 bg-red-800 text-white hover:bg-red-700 hover:text-white">Log out</x-primary-button>
</form>
