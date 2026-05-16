<template>
<StayUpdatePage :StayUpdate="StayUpdate"/>
 <!-- <h1>category page</h1> -->
</template>

<script setup>
import StayUpdatePage from "@/Components/StayUpdate/StayUpdatePage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  StayUpdate: Array,
});

</script>
