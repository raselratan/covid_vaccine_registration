<template>
    <div>
        <!-- Head Title Section -->
         <Head title="Search" />
         <div class="m-4 w-1/2 mx-auto">
            <div class="flex justify-center items-end gap-6">
                <DefaultInput v-model="nid" inputType="text"  placeholder="Enter Your NID" label="Search Vaccination Schedule by NID" :errorMessages="null" />
                <DefaultButton @click="Search()" buttonType="button" buttonText="Search"/>
            </div>
        </div>
        <div class="m-4 w-1/2 mx-auto bg-slate-500 p-8 rounded-md mt-10">
            <div class="flex flex-col justify-center items-center">
                <table class="w-full leading-normal divide-y divide-slate-200">
                    <tr class="hover:bg-slate-100 cursor-pointer odd:bg-white even:bg-slate-50">
                        <td class="px-4 py-2"><b>Name</b></td>
                        <td class="px-4 py-2">{{ result ? result.name : '' }}</td>
                    </tr>
                    <tr class="hover:bg-slate-100 cursor-pointer odd:bg-white even:bg-slate-50">
                        <td class="px-4 py-2"><b>Email</b></td>
                        <td class="px-4 py-2">{{ result ? result.email : '' }}</td>
                    </tr>
                    <tr class="hover:bg-slate-100 cursor-pointer odd:bg-white even:bg-slate-50">
                        <td class="px-4 py-2"><b>NID</b></td>
                        <td class="px-4 py-2">{{ result ? result.nid : ''}}</td>
                    </tr>
                    <tr class="hover:bg-slate-100 cursor-pointer odd:bg-white even:bg-slate-50">
                        <td class="px-4 py-2"><b>STATUS</b></td>
                        <td class="px-4 py-2" :class="result ? '' : 'text-red-600'">{{ result ? result.status : 'Not Registered' }}</td>
                    </tr>
                    <tr class="hover:bg-slate-100 cursor-pointer odd:bg-white even:bg-slate-50">
                        <td class="px-4 py-2"><b>Venue</b></td>
                        <td class="px-4 py-2">{{ result ? result.venue : '' }}</td>
                    </tr>
                    <tr class="hover:bg-slate-100 cursor-pointer odd:bg-white even:bg-slate-50">
                        <td class="px-4 py-2"><b>Scheduled Date</b></td>
                        <td class="px-4 py-2">{{ result ? result.scheduled_date : '' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>

<script setup>

    import { ref } from 'vue';
    import { Head } from '@inertiajs/vue3';
    import DefaultInput from '../../Components/Common/Inputs/DefaultInput.vue';
    import DefaultButton from '../../Components/Common/Buttons/DefaultButton.vue';

    import Layout from '../../Layouts/LandingLayout.vue';
    defineOptions({
        layout: Layout
    });

    import { useFetch } from '../../Composables/Requests/useFetch.js';

    const { fetchData } = useFetch();

    const nid = ref('');
    const result = ref(null);

    const Search = async () => {
        try {
            result.value = (await fetchData(`/search/${nid.value}`)).data;
        } catch (e) {
            console.log(e);
        }
    }

</script>