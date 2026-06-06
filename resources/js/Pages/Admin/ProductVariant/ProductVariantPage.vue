<template>
<ProductVariantPage :ProductVariant="ProductVariant"/>
 <!-- <h1>category page</h1> -->
</template>

<script setup>
import ProductVariantPage from "@/Components/ProductVariant/ProductVariantPage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  ProductVariant: Array,
});

</script>
