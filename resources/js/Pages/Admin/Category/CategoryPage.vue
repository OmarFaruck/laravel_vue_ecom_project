<template>
<CategoryPage :Category="Category"/>
 <!-- <h1>category page</h1> -->
</template>

<script setup>
import CategoryPage from "@/Components/Category/CategoryPage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  Category: Array,
});

</script>
