<template>
    <div>
        <div>
            <a :href="props.link" class="">
                <div class="flex justify-center gap-2 bg-gradient-to-r from-teal-400 to-blue-500 hover:from-pink-500 hover:to-orange-500 p-6 rounded-full">
                    <div class="text-[18px]">{{ props.text }}</div>
                    <div class="flex justify-center items-center">
                        <Icon icon="ph:arrow-right-bold" style="color: black" />
                    </div>
                </div>
            </a>
        </div>
    </div>
</template>

<script setup>
    import { Icon } from '@iconify/vue';
    const props = defineProps({
        text: String,
        link: String
    });

</script>