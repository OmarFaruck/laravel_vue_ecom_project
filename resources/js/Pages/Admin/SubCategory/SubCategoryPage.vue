<template>
<SubCategoryPage :SubCategory="SubCategory"/>
 <!-- <h1>subcategory page</h1> -->
</template>

<script setup>
import SubCategoryPage from "@/Components/SubCategory/SubCategoryPage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  SubCategory: Array,
});

</script>
