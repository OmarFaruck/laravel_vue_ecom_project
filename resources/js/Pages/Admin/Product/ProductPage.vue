<template>
  <ProductPage :ProductPage="ProductPage" :categories="categories" :subcategories="subcategories" :brands="brands"
    :pickupPoints="pickupPoints" :warehouses="warehouses" :trendyProducts="trendyProducts" :users="users" />
  <!-- <h1>category page</h1> -->
</template>

<script setup>
import ProductPage from "@/Components/Product/ProductPage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  ProductPage: Array,
  users: Array,
  categories: Array,
  subcategories: Array,
  brands: Array,
  pickupPoints: Array,
  warehouses: Array,
  trendyProducts: Array, 
});

</script>
