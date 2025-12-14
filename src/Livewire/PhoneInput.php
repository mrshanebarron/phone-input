<?php

namespace MrShaneBarron\PhoneInput\Livewire;

use Livewire\Component;
use Livewire\Attributes\Modelable;

class PhoneInput extends Component
{
    #[Modelable]
    public string $value = '';
    
    public string $countryCode = 'US';
    public string $placeholder = 'Phone number';
    public bool $disabled = false;

    public array $countries = [
        ['code' => 'US', 'name' => 'United States', 'dial' => '+1', 'flag' => '🇺🇸'],
        ['code' => 'GB', 'name' => 'United Kingdom', 'dial' => '+44', 'flag' => '🇬🇧'],
        ['code' => 'CA', 'name' => 'Canada', 'dial' => '+1', 'flag' => '🇨🇦'],
        ['code' => 'AU', 'name' => 'Australia', 'dial' => '+61', 'flag' => '🇦🇺'],
        ['code' => 'DE', 'name' => 'Germany', 'dial' => '+49', 'flag' => '🇩🇪'],
        ['code' => 'FR', 'name' => 'France', 'dial' => '+33', 'flag' => '🇫🇷'],
        ['code' => 'IN', 'name' => 'India', 'dial' => '+91', 'flag' => '🇮🇳'],
        ['code' => 'JP', 'name' => 'Japan', 'dial' => '+81', 'flag' => '🇯🇵'],
        ['code' => 'BR', 'name' => 'Brazil', 'dial' => '+55', 'flag' => '🇧🇷'],
        ['code' => 'MX', 'name' => 'Mexico', 'dial' => '+52', 'flag' => '🇲🇽'],
    ];

    public function mount(
        string $value = '',
        string $countryCode = 'US',
        string $placeholder = 'Phone number',
        bool $disabled = false
    ): void {
        $this->value = $value;
        $this->countryCode = $countryCode;
        $this->placeholder = $placeholder;
        $this->disabled = $disabled;
    }

    public function getSelectedCountry(): array
    {
        return collect($this->countries)->firstWhere('code', $this->countryCode) ?? $this->countries[0];
    }

    public function render()
    {
        return view('ld-phone-input::livewire.phone-input');
    }
}
