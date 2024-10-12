<template>
    <div>
        <form @submit.prevent="Submit">
            <div class="w-full mx-auto p-2">
                <DefaultInput v-model="userData.name" inputType="text"  placeholder="Your Name" label="Name" :errorMessages="errors.name"/>
            </div>
            <div class="w-full mx-auto p-2">
                <DefaultInput v-model="userData.email" inputType="text"  placeholder="Your Email" label="Email" :errorMessages="errors.email"/>
            </div>
            <div class="w-full mx-auto p-2">
                <DefaultInput v-model="userData.nid" inputType="text"  placeholder="Your NID" label="NID" :errorMessages="errors.nid"/>
            </div>
            <div class="w-full mx-auto p-2">
                <DefaultListBox v-model="userData.venue_id" textLabel="name" :data="venues" :reduce="option => option.id" placeholder="Select Venue" label="Venue" :errorMessages="errors.venue_id"/>
            </div>
            <div class="w-full mx-auto p-2">
                <div class="flex justify-end">
                    <DefaultButton buttonType="submit" buttonText="Register"/>
                </div>
            </div>
        </form>
    </div>
</template>
 
<script setup>
    import { reactive, ref, onBeforeMount } from 'vue';
    import DefaultInput from '../Common/Inputs/DefaultInput.vue';
    import DefaultButton from '../Common/Buttons/DefaultButton.vue';
    import DefaultListBox from '../Common/ListBox/DefaultListBox.vue'
    import { useMessage } from '../../Composables/Messages/useMessage';
    import { useFetch } from '../../Composables/Requests/useFetch';
    import { usePost } from '../../Composables/Requests/usePost';

    const { fetchData } = useFetch();
    const { postData } = usePost();
    const { errorMessage, successMessage } = useMessage();

    const userData = reactive({
        name: '',
        email: '',
        nid: '',
        venue_id: ''
    });

    const errors = reactive({
        name: null,
        email: null,
        nid: null,
        venue_id: null
    });

    const venues = ref([]);

    const fetchVenues = async () => {
        try {
            venues.value = (await fetchData('/venues')).data;
        } catch (e) {

        }
    }
    
    onBeforeMount(()=>{
        fetchVenues();
    })


    const Submit = async () => {

        try {
            const data = await postData('/store-user', userData);

            if (data.status == 422) {
                for (const [key, value] of Object.entries(errors)) {
                    errors[key] = data.errors[key] ? data.errors[key] : null;
                }
                errorMessage(data.message);
                return;
            }
            console.log(data)
            if(data.status == 201){
                for (const [key, value] of Object.entries(errors)) {
                    errors[key] =  null;
                }
                successMessage('Successfully Registered');
                return;
            }


        } catch (e) {
            console.log('error', e.status)
        }

    }

</script>