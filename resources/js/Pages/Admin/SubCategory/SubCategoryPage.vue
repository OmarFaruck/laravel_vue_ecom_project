<template>
  <SubCategoryPage :subcategories="subcategories" :category="category" />
</template>

<script setup>
import SubCategoryPage from "@/Components/SubCategory/SubCategoryPage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  subcategories: Array,
  category: Array,
});
</script>
