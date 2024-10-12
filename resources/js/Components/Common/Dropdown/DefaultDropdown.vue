<template>
    <div class="relative group">
        <div @click="()=>{isShow = !isShow}" class="cursor-pointer">
            <div class="flex justify-between items-center gap-2 text-[#6c757d] group-hover:text-black">
                <div v-if="props.title" class="title">
                    {{ props.title }}
                </div>
                <div v-if="props.icon" class="icon" :class="props.iconStyle">
                    <Icon :icon="props.icon" />
                </div>
            </div>
        </div>
        <div v-if="isShow" class="rounded border-[1px] border-grey-300 bg-white absolute top-[45px] min-w-[150px] right-0">
            <ul>
                <li class="text-left px-6 py-2 hover:bg-[#FFE185] cursor-pointer border-b-1 border-black" v-for="(item, index) in list" :key="index">
                    <Link :href="item.link">
                        <div class="flex justify-start items-center gap-2">
                            <div v-if="item.icon" class="icon">
                                <Icon :icon="item.icon" />
                            </div>
                            <div v-if="item.title" class="title">
                                {{ item.title }}
                            </div>
                        </div>
                    </Link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
    import { ref } from 'vue';
    import { Icon } from '@iconify/vue';
    import { Link } from '@inertiajs/vue3';

    const isShow = ref(false);
    const props = defineProps({
        title: String,
        icon:String,
        iconStyle:String,
        list: Array
    });
</script>