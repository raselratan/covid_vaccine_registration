<template>
  <div>
    <label v-if="props.label"
      class="block mb-2"
      :class="props.style"
      >{{ props.label }}</label
    >
    <input
      :type="props.inputType"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2"
      :placeholder="props.placeholder"
      :value="modelValue"
      @input="handleInput($event.target.value)"
      :required="isRequired"
    />
    <div v-if="props.errorMessages" class="error">
      <ul>
        <li v-for="(error, index) in props.errorMessages" :key="'error'+index" class="text-red-600 ml-3 mt-1 text-sm list-disc text-justify">{{ error }} ***</li>
      </ul>
    </div>
    
  </div>
</template>

<script setup>

import { defineProps, defineEmits } from "vue";

const props = defineProps({
  inputType: String,
  placeholder: String,
  label: String,
  style:{
    type: String,
    default: 'text-sm font-medium text-gray-900'
  },
  isRequired: Boolean,
  errorMessages: Array | null,
  modelValue: String
});

const emit = defineEmits(['update:modelValue']);

const handleInput = (event) => {
  emit('update:modelValue', event)
}

</script>
