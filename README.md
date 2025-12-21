# Phone Input

A phone number input with country code selector for Laravel applications. Flag dropdown with dial codes. Works with Livewire and Vue 3.

## Installation

```bash
composer require mrshanebarron/phone-input
```

## Livewire Usage

### Basic Usage

```blade
<livewire:sb-phone-input wire:model="phone" />
```

### With Default Country

```blade
<livewire:sb-phone-input
    wire:model="phone"
    default-country="GB"
/>
```

### Livewire Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `wire:model` | string | - | Full phone number with country code |
| `default-country` | string | `'US'` | Default country code |
| `placeholder` | string | `'Phone number'` | Input placeholder |

## Vue 3 Usage

### Setup

```javascript
import { SbPhoneInput } from './vendor/sb-phone-input';
app.component('SbPhoneInput', SbPhoneInput);
```

### Basic Usage

```vue
<template>
  <SbPhoneInput v-model="phone" />
  <p class="mt-2 text-sm text-gray-500">Full number: {{ phone }}</p>
</template>

<script setup>
import { ref } from 'vue';
const phone = ref('');
</script>
```

### With Default Country

```vue
<template>
  <SbPhoneInput
    v-model="phone"
    default-country="GB"
    placeholder="Enter your mobile"
  />
</template>
```

### Contact Form Example

```vue
<template>
  <form @submit.prevent="submit" class="space-y-4">
    <div>
      <label class="block text-sm font-medium mb-1">Name</label>
      <input v-model="form.name" class="w-full px-3 py-2 border rounded-lg" />
    </div>

    <div>
      <label class="block text-sm font-medium mb-1">Email</label>
      <input v-model="form.email" type="email" class="w-full px-3 py-2 border rounded-lg" />
    </div>

    <div>
      <label class="block text-sm font-medium mb-1">Phone</label>
      <SbPhoneInput v-model="form.phone" />
    </div>

    <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded-lg">
      Submit
    </button>
  </form>
</template>

<script setup>
import { reactive } from 'vue';

const form = reactive({
  name: '',
  email: '',
  phone: ''
});

const submit = () => {
  console.log('Submitting:', form);
};
</script>
```

### Vue Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `modelValue` | String | `''` | Full phone number with dial code |
| `defaultCountry` | String | `'US'` | Default country code (ISO) |
| `placeholder` | String | `'Phone number'` | Input placeholder text |

### Events

| Event | Payload | Description |
|-------|---------|-------------|
| `update:modelValue` | `string` | Phone number changed |

## Included Countries

| Code | Country | Dial Code |
|------|---------|-----------|
| US | United States | +1 |
| GB | United Kingdom | +44 |
| CA | Canada | +1 |
| AU | Australia | +61 |
| DE | Germany | +49 |
| FR | France | +33 |
| IT | Italy | +39 |
| ES | Spain | +34 |
| JP | Japan | +81 |
| CN | China | +86 |
| IN | India | +91 |
| BR | Brazil | +55 |
| MX | Mexico | +52 |

## Features

- **Country Selector**: Dropdown with flags and dial codes
- **Search Countries**: Filter countries by name or code
- **Flag Display**: Emoji flags for each country
- **Auto Format**: Strips non-numeric characters
- **Combined Output**: Returns full number with dial code
- **Click Outside**: Closes dropdown on outside click

## Styling

Uses Tailwind CSS:
- Country button with flag
- Dropdown with search
- Hover highlights
- Focus ring on input
- Rounded input group

## Requirements

- PHP 8.1+
- Laravel 10, 11, or 12
- Tailwind CSS 3.x

## License

MIT License
