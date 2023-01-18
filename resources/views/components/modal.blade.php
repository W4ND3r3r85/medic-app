@props(['appointment'])
<!-- Main modal -->
<div id="{{ 'reject-modal-' . $appointment->id }}"
     data-modal-backdrop="static"
     tabindex="-1"
     aria-hidden="true"
     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full"
>
    <div class="relative w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-gray-300 my-32 mx-auto max-w-7xl px-4 sm:px-6 lg:flex lg:items-center lg:justify-center  rounded-2xl flex-col flex-sp">
            <!-- Modal header -->
            <div class="flex justify-center p-4 w-full">
                <h1 class=" block font-bold text-xl text-gray-700">
                    Type a reason for rejecting the client.
                </h1>
            </div>
            <!-- Modal body -->
            <form method="POST"
                  action="{{ route('appointments.update', $appointment->id) }}"
                  class="flex flex-col justify-center my-2 w-full"
            >
                @csrf
                @method('PUT')
                <textarea class="border border-gray-400 p-2 w-full rounded-xl h-32 text-s text-gray-700"
                       name="message"
                       required>
                </textarea>
                @error('message')
                <x-error>{{$message}}</x-error>
                @enderror
                <input type="hidden" name="status" value="rejected">
                <div class="my-5 mx-auto flex items-center space-x-2">
                    <x-primary-button type="submit"
                                      class="bg-red-800 text-white hover:bg-red-700 hover:text-white"
                    >
                        Reject
                    </x-primary-button>
                    <x-primary-button type="button"
                                      data-modal-hide="{{ 'reject-modal-' . $appointment->id }}"
                                      class="bg-gray-800 text-white hover:bg-gray-700 hover:text-white"
                    >
                        Cancel
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>
