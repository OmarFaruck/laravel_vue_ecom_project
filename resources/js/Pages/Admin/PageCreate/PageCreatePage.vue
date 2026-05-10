<template>
  <PageCreatePage :PageCreate="PageCreate" />
</template>

<script setup>
import PageCreatePage from "@/Components/PageCreate/PageCreatePage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  PageCreate: Array,
});
</script>
