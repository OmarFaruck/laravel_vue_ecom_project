<template>
  <TrendyProductPage :TrendyProduct="TrendyProduct" :product_color="product_color" :product_size="product_size"/>
</template>

<script setup>
import TrendyProductPage from "@/Components/TrendyProduct/TrendyProductPage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  TrendyProduct: Array,
  product_color: Array,
  product_size: Array, 
});
</script>