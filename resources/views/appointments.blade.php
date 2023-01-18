
<x-layout>
    <x-navigation/>
    <x-main-card>
         @foreach ($appointments as $appointment)
            <div class="lg:grid lg:grid-cols-6 w-full place-items-center">
                @csrf
                <input class="hidden" type="number" name="id" id="id" value="{{ $appointment->id }}">
                <x-appointment_card>{{ $appointment->user->name }}</x-appointment_card>
                <x-appointment_card>{{ $appointment->user->email }}</x-appointment_card>
                <x-appointment_card>{{ $appointment->user->phone }}</x-appointment_card>
                <x-appointment_card>{{ $appointment->appointment_date }}</x-appointment_card>
                @if($appointment->status === 'pending')
                    @if($appointment->appointment_date <= today())
                        <x-appointment_card><x-primary-button disabled class="bg-gray-400 text-white">Approve</x-primary-button></x-appointment_card>
                    @else
                        <form method="POST" action="{{ route('appointments.update', $appointment->id) }}" class="flex justify-center col-span-1 my-2 w-full">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="approved">
                            <x-primary-button type="submit" class="bg-gray-800 text-white hover:bg-gray-700 hover:text-white">Approve</x-primary-button>
                        </form>
                    @endif
{{--                    <x-appointment_card><x-green-text>Approved</x-green-text></x-appointment_card>--}}
                @else
                    <x-appointment_card>{{ $appointment->status }}</x-appointment_card>
                @endif
                @if($appointment->appointment_date <= today())
                    <x-appointment_card><x-primary-button disabled class="bg-gray-400 text-white">Reject</x-primary-button></x-appointment_card>
                @else
                    <x-modal :appointment="$appointment"/>
                    <x-primary-button data-modal-target="{{ 'reject-modal-' . $appointment->id }}" data-modal-show="{{ 'reject-modal-' . $appointment->id }}" class="bg-red-800 text-white hover:bg-red-700 hover:text-white">Reject</x-primary-button>
                @endif
            </div>
        @endforeach
        <x-pagination>
        {{ $appointments->links() }}
        </x-pagination>
    </x-main-card>
</x-layout>
