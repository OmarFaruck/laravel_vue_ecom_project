<template>
  <BrandPage :Brand="Brand" />
</template>

<script setup>
import BrandPage from "@/Components/Brand/BrandPage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  Brand: Array,
});
</script>
