<x-dashboard-layout>
    <x-slot name="header">
        Mensaje / {{ $message->subject }}
    </x-slot>

    <div class="mx-auto py-8">
        @if (Session::has('flash.banner'))
            <div class="pb-4 rounded">
                <x-jet-banner/>
            </div>
        @endif
        <div class="grid grid-cols-1 md:grid-cols-6 gap-5">
            <div class="md:col-span-2 bg-white rounded-lg p-4 h-content">
                @include('dashboard.messages.partials.message-menu')
            </div>
            <div class="md:col-span-4 bg-white rounded p-4 shadow mb-4">
                <div class="mb-5 w-full">
                    <h2>
                        De:
                        <span class="ml-1 py-1 px-2 bg-gray-200 rounded w-full font-semibold">
                            {{ $message->fromUser->name }}:
                            <h6 class="ml-2 inline-block font-normal text-gray-700 text-sm">
                                {{ $message->fromUser->email }}
                            </h6>
                        </span>
                    </h2>
                </div>
                <span class="font-semibold">{{ $message->subject }}</span>
                <div class="my-3">{!! $message->message !!}</div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
