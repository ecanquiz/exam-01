<script setup lang="ts">
import { onMounted } from 'vue';
import { usePostStore } from 'stores/post';

const store = usePostStore();

onMounted(() => {
  store.searchPosts()
})

const columns = [{
  name: 'name',
  required: true,
  label: 'Title',
  align: 'left',
  field: 'title', 
  sortable: true,
}, {
  name: 'name',
  required: true,
  label: 'Body',
  align: 'left',
  field: 'body',
  sortable: true
}]
</script>

<template>
  <div style="min-height: 100vh;">
    <div class="q-pa-md">
      <q-spinner
        v-if="store.pending"
        size="3em"
        :thickness="10"
      />
      <q-table 
        v-else
        title="Posts"
        :rows="store.customPosts"
        :columns="columns as unknown as any"
        row-key="name"
      ></q-table>
    </div>
  </div>  
</template>

