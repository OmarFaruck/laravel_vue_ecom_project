<template>
  <CollectionPage :Collection="Collection" />
</template>

<script setup>
import CollectionPage from "@/Components/Collection/CollectionPage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  Collection: Array,
});
</script>
