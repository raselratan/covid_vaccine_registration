<template>
    <div>
        <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
            <li v-for="menuItem in menuList" :key="menuItem" class="cursor-pointer group">
                <Link :href="menuItem.link" class="text-[#6c757d] group-hover:text-black">
                    {{ menuItem.title }}
                </Link>
            </li>
        </ul>
    </div>
</template>

<script setup>

import { Link } from '@inertiajs/vue3';

const props = defineProps({
    menuList: Array,
});

</script>
