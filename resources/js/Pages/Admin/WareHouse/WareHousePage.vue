<template>
<WareHousePage :WareHouse="WareHouse"/>
 <!-- <h1>category page</h1> -->
</template>

<script setup>
import WareHousePage from "@/Components/WareHouse/WareHousePage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  WareHouse: Array,
});

</script>
