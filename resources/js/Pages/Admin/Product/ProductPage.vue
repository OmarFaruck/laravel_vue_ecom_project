<template>
<ProductPage :Product="Product"/>
 <!-- <h1>category page</h1> -->
</template>

<script setup>
import ProductPage from "@/Components/Product/ProductPage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  Product: Array,
});

</script>
