<template>
    <div>
        <button :type="buttonType" class="w-full bg-[#2FA360] px-4 py-[6px] rounded-lg text-white">
            {{ props.buttonText }}
        </button>
    </div>
</template>

<script setup>
    const props = defineProps({
        buttonText: String,
        buttonType: {
            type: String,
            default: 'button'
        }
    });
</script>