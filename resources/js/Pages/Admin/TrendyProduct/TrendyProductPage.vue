<template>
  <TrendyProductPage :TrendyProduct="TrendyProduct" />
</template>

<script setup>
import TrendyProductPage from "@/Components/TrendyProduct/TrendyProductPage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  TrendyProduct: Array,
});
</script>