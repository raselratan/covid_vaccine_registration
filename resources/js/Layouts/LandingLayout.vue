<template>
    <div class="h-screen bg-[#E8F0FE] scroll-smooth">
      <Header />
      <main>
        <slot />
      </main>
    </div>
  </template>
  
  <script setup>
  
  import Header from '../Components/Landing/Header.vue'


  </script>
  