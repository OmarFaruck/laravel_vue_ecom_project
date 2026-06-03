<template>
<SeoPage :Seo="Seo"/>
 <!-- <h1>category page</h1> -->
</template>

<script setup>
import SeoPage from "@/Components/Seo/SeoPage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  Seo: Array,
});

</script>
