<template>
  <JustArrivedPage :justarriveds="justarriveds" :product_color="product_color" :product_size="product_size"/>
</template>

<script setup>
import JustArrivedPage from "@/Components/JustArrived/JustArrivedPage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  justarriveds: Array,
  product_color: Array,
  product_size: Array, 
});
</script>