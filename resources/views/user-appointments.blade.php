<x-layout>
    <x-navigation/>
    <x-main-card>
        <h1 class="text-center block mb-10 uppercase font-bold text-xl text-gray-700">My appointments</h1>
        <div
            class="w-full lg:grid lg:grid-cols-4 place-items-center border-b border-solid border-white mb-2">
            <x-appointment_card>Appointment date</x-appointment_card>
            <x-appointment_card>Appointment status</x-appointment_card>
            <x-appointment_card>Messages</x-appointment_card>
            <x-appointment_card>Action</x-appointment_card>
        </div>
        <div class="lg:grid lg:grid-cols-4 w-full place-items-center">
            @foreach ($appointments as $appointment)
                <x-appointment_card>
                    {{ $appointment->appointment_date }}
                </x-appointment_card>
                @if($appointment->status === 'approved')
                    <x-appointment_card>
                        <x-green-text>
                            {{ $appointment->status }}
                        </x-green-text>
                    </x-appointment_card>
                @elseif($appointment->status === 'rejected')
                    <x-appointment_card>
                        <x-red-text>
                            {{ $appointment->status }}
                        </x-red-text>
                    </x-appointment_card>
                @else
                    <x-appointment_card>{{ $appointment->status }}</x-appointment_card>
                @endif
                @if(!$appointment->messages->isEmpty())
                    <x-messages-modal :appointment="$appointment"/>
                    <x-primary-button
                        data-modal-target="{{ 'messages-modal-' . $appointment->id }}"
                        data-modal-show="{{ 'messages-modal-' . $appointment->id }}"
                        class="bg-gray-800 text-white hover:bg-gray-700 hover:text-white"
                    >
                        View Messages
                    </x-primary-button>
                    @else
                    <x-appointment_card>There are no messages</x-appointment_card>
                @endif
                <form method="POST"
                      action="{{ route('appointments.update', $appointment->id) }}"
                      class="flex justify-center col-span-1 my-2 w-full"
                >
                    @csrf
                    @method('PUT')
                    <input type="hidden"
                           name="status"
                           value="rescheduled"
                    >
                    @if($appointment->appointment_date <= today())
                        <x-primary-button disabled class="bg-gray-400 text-white">Reschedule</x-primary-button>
                    @else
                        <x-primary-button type="submit"
                                          class="bg-gray-800 text-white hover:bg-gray-700 hover:text-white">Reschedule
                        </x-primary-button>
                    @endif
                </form>
            @endforeach
        </div>
    </x-main-card>
</x-layout>
