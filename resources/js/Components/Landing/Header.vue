<template>
  <header class="sticky top-0 z-[400] shadow-md shadow-[#E8E8EA]">
      <nav class="w-full bg-[#FFE185]">
        <div class="flex justify-between p-4 border-t-4 border-red-600">
            <div>
              <Menu :menuList="menuList" />
            </div>
            <div>
                <h3>COVID Vaccination Programme</h3>
            </div>
        </div>
      </nav>
  </header>
</template>

<script setup>
import { reactive } from 'vue';

import Menu from './Menu.vue';

const menuList = reactive([
      {
          title: 'Register',
          link: '/'
      },
      {
          title: 'Search',
          link: '/search'
      }
]);

</script>
