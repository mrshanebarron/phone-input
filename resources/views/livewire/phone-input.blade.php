<div x-data="{ open: false }" style="position: relative;">
    <div style="display: flex;">
        <button
            type="button"
            x-on:click="open = !open"
            @if($this->disabled) disabled @endif
            style="display: flex; align-items: center; gap: 8px; padding: 8px 12px; border: 1px solid #d1d5db; border-right: none; border-radius: 8px 0 0 8px; background: #f9fafb; cursor: pointer;"
        >
            <span>{{ $this->getSelectedCountry()['flag'] }}</span>
            <span style="font-size: 14px; color: #4b5563;">{{ $this->getSelectedCountry()['dial'] }}</span>
            <svg style="width: 16px; height: 16px; color: #9ca3af;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <input
            type="tel"
            wire:model="value"
            placeholder="{{ $this->placeholder }}"
            @if($this->disabled) disabled @endif
            style="flex: 1; padding: 8px 16px; border: 1px solid #d1d5db; border-radius: 0 8px 8px 0; outline: none;"
            onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 2px rgba(59,130,246,0.2)';"
            onblur="this.style.borderColor='#d1d5db'; this.style.boxShadow='none';"
        >
    </div>

    <div
        x-show="open"
        x-on:click.outside="open = false"
        :class="open ? 'sb-dropdown-visible' : 'sb-dropdown-hidden'"
        style="position: absolute; z-index: 50; margin-top: 4px; width: 256px; background: white; border: 1px solid #e5e7eb; border-radius: 8px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); max-height: 240px; overflow-y: auto;"
    >
        @foreach($this->countries as $country)
            <button
                type="button"
                wire:click="$set('countryCode', '{{ $country['code'] }}')"
                x-on:click="open = false"
                style="width: 100%; display: flex; align-items: center; gap: 12px; padding: 8px 16px; border: none; background: {{ $this->countryCode === $country['code'] ? '#eff6ff' : 'white' }}; cursor: pointer; text-align: left;"
                onmouseover="this.style.background='#f9fafb'"
                onmouseout="this.style.background='{{ $this->countryCode === $country['code'] ? '#eff6ff' : 'white' }}'"
            >
                <span>{{ $country['flag'] }}</span>
                <span style="flex: 1; font-size: 14px;">{{ $country['name'] }}</span>
                <span style="font-size: 14px; color: #6b7280;">{{ $country['dial'] }}</span>
            </button>
        @endforeach
    </div>
    <style>
        .sb-dropdown-hidden { visibility: hidden; opacity: 0; transition: opacity 150ms ease, visibility 150ms ease; }
        .sb-dropdown-visible { visibility: visible; opacity: 1; transition: opacity 150ms ease, visibility 150ms ease; }
    </style>
</div>
