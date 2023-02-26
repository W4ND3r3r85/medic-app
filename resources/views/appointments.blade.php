<x-layout>
    <x-navigation/>
    <x-main-card>
        <h1 class="text-center block mb-10 uppercase font-bold text-xl text-gray-700">Client appointments</h1>
        <div class="lg:grid lg:grid-cols-6 w-full place-items-center">
            <div
                class="col-span-6 w-full lg:grid lg:grid-cols-6 place-items-center border-b border-solid border-white mb-2">
                <x-appointment_card>Client Name</x-appointment_card>
                <x-appointment_card>Client Email</x-appointment_card>
                <x-appointment_card>Client phone number</x-appointment_card>
                <x-appointment_card>Appointment date</x-appointment_card>
                <x-appointment_card>Appointment status</x-appointment_card>
                <x-appointment_card>Action</x-appointment_card>
            </div>
            @foreach ($appointments as $appointment)
                @csrf
                <input class="hidden" type="number" name="id" id="id" value="{{ $appointment->id }}">
                <x-appointment_card>{{ $appointment->user->name }}</x-appointment_card>
                <x-appointment_card>{{ $appointment->user->email }}</x-appointment_card>
                <x-appointment_card>{{ $appointment->user->phone }}</x-appointment_card>
                <x-appointment_card>{{ $appointment->appointment_date }}</x-appointment_card>
                @if($appointment->status === 'pending')
                    @if($appointment->appointment_date <= today())
                        <x-appointment_card>expired</x-appointment_card>
                    @else
                        <form method="POST" action="{{ route('appointments.update', $appointment->id) }}"
                              class="flex justify-center col-span-1 my-2 w-full">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="approved">
                            <x-primary-button type="submit"
                                              class="bg-gray-800 text-white hover:bg-gray-700 hover:text-white">Approve
                            </x-primary-button>
                        </form>
                    @endif
                    {{--                    <x-appointment_card><x-green-text>Approved</x-green-text></x-appointment_card>--}}
                @else
                    @if($appointment->status === 'approved')
                        <x-appointment_card>
                            <x-green-text>{{ $appointment->status }}</x-green-text>
                        </x-appointment_card>
                    @else
                        <x-appointment_card>
                            <x-red-text>{{ $appointment->status }}</x-red-text>
                        </x-appointment_card>
                    @endif
                @endif
                @if($appointment->appointment_date <= today() || $appointment->status == 'rescheduled' )
                    <x-appointment_card>
                        <x-disabled-button>Reject</x-disabled-button>
                    </x-appointment_card>
                @else
                    <x-modal :appointment="$appointment"/>
                    <x-primary-button data-modal-target="{{ 'reject-modal-' . $appointment->id }}"
                                      data-modal-show="{{ 'reject-modal-' . $appointment->id }}"
                                      class="bg-red-800 text-white hover:bg-red-700 hover:text-white">Reject
                    </x-primary-button>
                @endif
            @endforeach
        </div>
        <x-pagination>
            {{ $appointments->links() }}
        </x-pagination>
    </x-main-card>
</x-layout>
