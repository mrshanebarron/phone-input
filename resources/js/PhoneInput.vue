<template>
  <div class="flex">
    <div class="relative">
      <button
        @click="dropdownOpen = !dropdownOpen"
        class="flex items-center gap-2 px-3 py-2 border border-r-0 border-gray-300 rounded-l-lg bg-gray-50 hover:bg-gray-100"
      >
        <span class="text-lg">{{ selectedCountry.flag }}</span>
        <span class="text-sm text-gray-600">{{ selectedCountry.dialCode }}</span>
        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
      </button>

      <div v-if="dropdownOpen" class="absolute z-50 mt-1 w-64 bg-white border border-gray-200 rounded-lg shadow-lg max-h-60 overflow-y-auto">
        <input
          v-model="searchQuery"
          type="text"
          placeholder="Search country..."
          class="w-full px-3 py-2 border-b border-gray-200 focus:outline-none"
        >
        <button
          v-for="country in filteredCountries"
          :key="country.code"
          @click="selectCountry(country)"
          class="w-full flex items-center gap-3 px-3 py-2 hover:bg-gray-50 text-left"
        >
          <span class="text-lg">{{ country.flag }}</span>
          <span class="flex-1">{{ country.name }}</span>
          <span class="text-sm text-gray-500">{{ country.dialCode }}</span>
        </button>
      </div>
    </div>

    <input
      v-model="phoneNumber"
      type="tel"
      :placeholder="placeholder"
      class="flex-1 px-4 py-2 border border-gray-300 rounded-r-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
      @input="formatNumber"
    >
  </div>
</template>

<script>
import { ref, computed, watch } from 'vue';

export default {
  name: 'LdPhoneInput',
  props: {
    modelValue: { type: String, default: '' },
    defaultCountry: { type: String, default: 'US' },
    placeholder: { type: String, default: 'Phone number' }
  },
  emits: ['update:modelValue'],
  setup(props, { emit }) {
    const countries = [
      { code: 'US', name: 'United States', dialCode: '+1', flag: '🇺🇸' },
      { code: 'GB', name: 'United Kingdom', dialCode: '+44', flag: '🇬🇧' },
      { code: 'CA', name: 'Canada', dialCode: '+1', flag: '🇨🇦' },
      { code: 'AU', name: 'Australia', dialCode: '+61', flag: '🇦🇺' },
      { code: 'DE', name: 'Germany', dialCode: '+49', flag: '🇩🇪' },
      { code: 'FR', name: 'France', dialCode: '+33', flag: '🇫🇷' },
      { code: 'IT', name: 'Italy', dialCode: '+39', flag: '🇮🇹' },
      { code: 'ES', name: 'Spain', dialCode: '+34', flag: '🇪🇸' },
      { code: 'JP', name: 'Japan', dialCode: '+81', flag: '🇯🇵' },
      { code: 'CN', name: 'China', dialCode: '+86', flag: '🇨🇳' },
      { code: 'IN', name: 'India', dialCode: '+91', flag: '🇮🇳' },
      { code: 'BR', name: 'Brazil', dialCode: '+55', flag: '🇧🇷' },
      { code: 'MX', name: 'Mexico', dialCode: '+52', flag: '🇲🇽' }
    ];

    const dropdownOpen = ref(false);
    const searchQuery = ref('');
    const phoneNumber = ref('');
    const selectedCountry = ref(countries.find(c => c.code === props.defaultCountry) || countries[0]);

    const filteredCountries = computed(() => {
      if (!searchQuery.value) return countries;
      const q = searchQuery.value.toLowerCase();
      return countries.filter(c => c.name.toLowerCase().includes(q) || c.dialCode.includes(q));
    });

    const selectCountry = (country) => {
      selectedCountry.value = country;
      dropdownOpen.value = false;
      searchQuery.value = '';
      emitValue();
    };

    const formatNumber = () => {
      phoneNumber.value = phoneNumber.value.replace(/[^0-9]/g, '');
      emitValue();
    };

    const emitValue = () => {
      emit('update:modelValue', `${selectedCountry.value.dialCode}${phoneNumber.value}`);
    };

    return { countries, dropdownOpen, searchQuery, phoneNumber, selectedCountry, filteredCountries, selectCountry, formatNumber };
  }
};
</script>
