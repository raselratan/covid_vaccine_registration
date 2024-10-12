<template>
    <div>
        <!-- Head Title Section -->
         <Head title="Home" />
        <div class="m-4 w-1/2 mx-auto">
            <Form />
        </div>
    </div>
</template>

<script setup>

    import { Head } from '@inertiajs/vue3';
    import Form from '../../Components/Landing/Form.vue';
    import Layout from '../../Layouts/LandingLayout.vue';
    defineOptions({
        layout: Layout
    });

</script>