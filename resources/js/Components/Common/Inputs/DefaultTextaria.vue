<template>
    <div>
      <label v-if="props.label"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
        >{{ props.label }}</label
      >
      <textarea
        :rows="props.rows"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
        :placeholder="props.placeholder"
        required
      ></textarea>
    </div>
  </template>
  
  <script setup>
  const props = defineProps({
    rows: Number,
    placeholder: String,
    label: String,
  });
  </script>
  