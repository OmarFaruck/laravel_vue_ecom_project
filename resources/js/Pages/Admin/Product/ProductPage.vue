<template>
  <ProductPageComponent :ProductPage="ProductPage" :categories="categories" :subcategories="subcategories" :brands="brands"
    :pickupPoints="pickupPoints" :warehouses="warehouses" :trendyProducts="trendyProducts" :users="users" :product_color="product_color" :product_size="product_size" :product_quantity="product_quantity"/>
  <!-- <h1>category page</h1> -->
</template>

<script setup>
import ProductPageComponent from "@/Components/Product/ProductPage.vue";
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
  product_color: Array, 
  product_size: Array, 
  product_quantity: Array, 
});

</script>
