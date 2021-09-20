<div>
    <div class="mb-4 flex justify-between items-center gap-4">
        <div class="flex">
            <button class="mr-2 flex items-center justify-center p-2 bg-golden-normal text-white rounded">
                <input class="rounded" type="checkbox">
            </button>
            <button class="flex items-center justify-center p-1.5 bg-golden-normal text-white rounded-l">
                <span class="material-icons-outlined">
                    delete
                </span>
            </button>
            <button class="flex items-center justify-center p-1.5 bg-golden-normal text-white">
                <span class="material-icons-outlined">
                    sync
                </span>
            </button>
            <button class="flex items-center justify-center p-1.5 bg-golden-normal text-white">
                <span class="material-icons-outlined">
                    reply
                </span>
            </button>
            <button class="flex items-center justify-center p-1.5 bg-golden-normal text-white rounded-r">
                <span class="material-icons-outlined" style="transform: scaleX(-1);">
                    reply
                </span>
            </button>
        </div>
        <input class="form-input" type="text" wire:model="search" placeholder="Buscar mensaje...">
    </div>
    @foreach ($messages as $message)
        <div class="bg-white rounded p-4 shadow mb-4">
            <div class="mb-5 w-full">
                <h2>
                    <input class="rounded mr-3" type="checkbox" value="{{ $message->id }}">
                    De:
                    <span class="ml-1 py-1 px-1.5 bg-gray-200 rounded w-full font-semibold">
                        {{ $message->fromUser->name }}:
                        <h6 class="ml-1 inline-block font-normal text-gray-700 text-sm">
                            {{ $message->fromUser->email }}
                        </h6>
                    </span>
                </h2>
            </div>
            <a href="{{ route('message.show', $message) }}" class="flex flex-col gap-1">
                <div class="flex justify-between">
                    <span class="font-semibold">{{ $message->subject }}</span>
                    <span class="text-gray-500 text-sm">{{ $message->created_at->diffForHumans() }}</span>
                </div>
                <div class="message-body">{!! $message->message !!}</div>
            </a>
        </div>
    @endforeach
</div>
