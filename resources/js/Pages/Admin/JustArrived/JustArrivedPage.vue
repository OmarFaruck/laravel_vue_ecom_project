<template>
  <JustArrivedPage :justarriveds="justarriveds" />
</template>

<script setup>
import JustArrivedPage from "@/Components/JustArrived/JustArrivedPage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  justarriveds: Array,
});
</script>