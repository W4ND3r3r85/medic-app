@props(['appointment'])
<!-- Main modal -->
<div id="{{ 'messages-modal-' . $appointment->id }}"
     data-modal-backdrop="static"
     tabindex="-1"
     aria-hidden="true"
     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full"
>
    <div class="relative w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div
            class="relative bg-gray-300 my-32 mx-auto max-w-7xl px-4 sm:px-6 lg:flex lg:items-center lg:justify-center  rounded-2xl flex-col flex-sp">
            <!-- Modal header -->
            <div class="flex justify-center p-4 w-full">
                <h1 class=" block font-bold text-xl text-gray-700">
                    MY MESSAGES
                </h1>
            </div>
            <!-- Modal body -->
            <div class="lg:grid lg:grid-cols-2 w-full place-items-center">
                <div
                    class="col-span-2 w-full lg:grid lg:grid-cols-2 place-items-center border-b border-solid border-white mb-2">
                    <x-appointment_card>Message</x-appointment_card>
                    <x-appointment_card>Date received</x-appointment_card>
                </div>
                @foreach($appointment->messages as $message)
                    <div
                        class="col-span-2 w-full lg:grid lg:grid-cols-2 place-items-center border-b border-solid border-white mb-2">
                        <x-appointment_card>{{ $message->value }}</x-appointment_card>
                        <x-appointment_card>{{ $message->created_at }}</x-appointment_card>
                    </div>
                @endforeach
                <div class="my-5 mx-auto flex items-center space-x-2">
                    <x-primary-button type="button"
                                      data-modal-hide="{{ 'messages-modal-' . $appointment->id }}"
                                      class="bg-gray-800 text-white hover:bg-gray-700 hover:text-white"
                    >
                        Close
                    </x-primary-button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
