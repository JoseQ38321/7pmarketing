<x-dashboard-layout>
    <x-slot name="header">
        {{ __('Mensajes / Inbox') }}
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
            <div class="md:col-span-4">
                @foreach (Auth::user()->sendMessages->sortByDesc('created_at') as $message)
                    <div class="bg-white rounded p-4 shadow mb-4">
                        <h2>para:
                            <span class="py-1 px-4 bg-gray-200 rounded">
                                {{ $message->toUser->name }} <{{ $message->toUser->email }}>
                            </span>
                        </h2>
                        <span>{{ $message->subject }}</span>
                        <div>{!! $message->message !!}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-dashboard-layout>
