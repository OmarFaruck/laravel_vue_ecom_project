<template>
  <HomeSliderPage :HomeSlider="HomeSlider" />
</template>

<script setup>
import HomeSliderPage from "@/Components/HomeSlider/HomeSliderPage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  HomeSlider: Array,
});
</script>
