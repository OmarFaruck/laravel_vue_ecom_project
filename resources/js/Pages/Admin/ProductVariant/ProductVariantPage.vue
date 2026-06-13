<template>
<ProductVariant :ProductVariant="ProductVariant" :Product="Product" />
 <!-- <h1>category page</h1> -->
</template>

<script setup>
import ProductVariant from "@/Components/ProductVariant/ProductVariantPage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  ProductVariant: Array,
  Product: Array,
});

</script>
