<script setup lang="ts">
import MyComponent from 'components/MyComponent.vue';

defineOptions({
  name: 'IndexPage'
});
</script>

<template>
  <q-page class="row items-center justify-evenly">
    <my-component
      title="My component"
      active
    ></my-component>
  </q-page>
</template>
