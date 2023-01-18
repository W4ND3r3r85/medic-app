<x-layout>
    <x-navigation/>
    <x-main-card>
        <h1 class="text-center block mb-10 uppercase font-bold text-xl text-gray-700">My appointments</h1>
        <div class="lg:grid lg:grid-cols-3 w-full place-items-center">
            <div class="col-span-3 bg-white rounded-xl w-full lg:grid lg:grid-cols-3 place-items-center mb-2">
                <x-appointment_card>Appointment date</x-appointment_card>
                <x-appointment_card>Appointment status</x-appointment_card>
                <x-appointment_card>Action</x-appointment_card>
            </div>

            @foreach ($appointments as $appointment)
                <x-appointment_card>{{ $appointment->appointment_date }}</x-appointment_card>
                <x-appointment_card>{{ $appointment->status }}</x-appointment_card>
                    <form method="POST" action="/user-appointments" class="flex w-full justify-around">
                        @csrf
                        <input class="hidden"
                               type="datetime-local"
                               name="appointment_date"
                               id="appointment_date"
                               value="{{ $appointment->appointment_date }}">
                        @if($appointment->appointment_date <= today())
                            <x-primary-button disabled class="bg-gray-400 text-white">Re-schedule</x-primary-button>
                        @else
                            <x-primary-button type="submit" class="bg-gray-800 text-white hover:bg-gray-700 hover:text-white">Re-schedule</x-primary-button>
                        @endif
                    </form>
            @endforeach
        </div>
    </x-main-card>
</x-layout>
