<template>
  <div>
    <label v-if="label" class="block mb-2" :class="style">
      {{ label }}
    </label>
    <v-select
      v-model="internalValue"
      :options="data"
      :label="textLabel"
      :placeholder="placeholder"
      :multiple="multiple"
      :required="isRequired"
      :clearable="clearable"
      :reduce="reduce"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-[1px] outline-none"
    />

    <div v-if="props.errorMessages" class="error">
      <ul>
        <li v-for="(error, index) in props.errorMessages" :key="'error'+index" class="text-red-600 ml-3 mt-1 text-sm list-disc text-justify">{{ error }} ***</li>
      </ul>
    </div>

  </div>
</template>

<script setup>
import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";
import { defineProps, defineEmits, watch, ref } from "vue";

const props = defineProps({
  data: Array,
  placeholder: String,
  label: String,
  textLabel: String,
  isRequired: Boolean,
  multiple: Boolean,
  errorMessages: Array | null,
  reduce: {
    type: Function,
    default: (option) => option,
  },
  modelValue: {
    type: [String, Number, Array, Object],
    default: null,
  },
  clearable: {
    type: Boolean,
    default: true,
  },
  style: {
    type: String,
    default: "text-sm font-medium text-gray-900",
  },
});

// Emit function setup
const emit = defineEmits(["update:modelValue"]);

// Use a ref to maintain internal state
const internalValue = ref(props.modelValue);

// Watch for changes in modelValue prop and update internalValue
watch(
  () => props.modelValue,
  (newVal) => {
    internalValue.value = newVal;
  }
);

// Watch for changes in internalValue and emit them
watch(internalValue, (newVal) => {
  emit("update:modelValue", newVal);
});
</script>

<style>
.vs__dropdown-toggle {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  display: flex;
  padding: 0 0 4px;
  background: none;
  border: 0px;
  white-space: normal;
}
</style>
