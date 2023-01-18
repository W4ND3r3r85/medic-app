<div class="flex flex-col">
    <div class="mx-auto mb-5">
        <h1 class="text-xl text-center mb-3">Dear {{ auth()->user()->name }},</h1>
        <p>You are about to make an appointment for a therapy session, please understand that your appointment must be approved by Dr. Jane Doe.</p>
        <p>You will receive an email to your provided address: <span class="text-red-500">{{ auth()->user()->email }}</span></p>
    </div>
    <div class="mx-auto">
        <form method="POST" action="/appointments">
            @csrf
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="appointment_date">
                    Appointment date
                </label>
                <input class="border border-gray-400 p-2 w-full"
                       type="datetime-local"
                       name="appointment_date"
                       id="appointment_date"
                       required>
                @error('appointment_date')
                    <x-error>{{$message}}</x-error>
                @enderror
            </div>
            <div>
            <x-primary-button type="submit" class="w-full bg-gray-800 text-white hover:bg-gray-700 hover:text-white">
                Submit
            </x-primary-button>
            </div>
        </form>
    </div>
</div>
