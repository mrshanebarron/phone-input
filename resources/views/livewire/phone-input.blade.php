<div x-data="{ open: false }" class="relative">
    <div class="flex">
        <button
            type="button"
            @click="open = !open"
            @if($disabled) disabled @endif
            class="flex items-center gap-2 px-3 py-2 border border-r-0 border-gray-300 rounded-l-lg bg-gray-50 hover:bg-gray-100 disabled:opacity-50 disabled:cursor-not-allowed"
        >
            <span>{{ $this->getSelectedCountry()['flag'] }}</span>
            <span class="text-sm text-gray-600">{{ $this->getSelectedCountry()['dial'] }}</span>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <input
            type="tel"
            wire:model="value"
            placeholder="{{ $placeholder }}"
            @if($disabled) disabled @endif
            class="flex-1 px-4 py-2 border border-gray-300 rounded-r-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 disabled:bg-gray-100 disabled:cursor-not-allowed"
        >
    </div>

    <div
        x-show="open"
        @click.outside="open = false"
        x-transition
        class="absolute z-10 mt-1 w-64 bg-white border border-gray-200 rounded-lg shadow-lg max-h-60 overflow-y-auto"
    >
        @foreach($countries as $country)
            <button
                type="button"
                wire:click="$set('countryCode', '{{ $country['code'] }}')"
                @click="open = false"
                class="w-full flex items-center gap-3 px-4 py-2 hover:bg-gray-50 {{ $countryCode === $country['code'] ? 'bg-blue-50' : '' }}"
            >
                <span>{{ $country['flag'] }}</span>
                <span class="flex-1 text-left text-sm">{{ $country['name'] }}</span>
                <span class="text-sm text-gray-500">{{ $country['dial'] }}</span>
            </button>
        @endforeach
    </div>
</div>
