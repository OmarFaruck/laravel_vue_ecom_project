<template>
<PickupPointPage :PickupPoint="PickupPoint"/>
 <!-- <h1>category page</h1> -->
</template>

<script setup>
import PickupPointPage from "@/Components/PickupPoint/PickupPointPage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  PickupPoint: Array,
});

</script>
