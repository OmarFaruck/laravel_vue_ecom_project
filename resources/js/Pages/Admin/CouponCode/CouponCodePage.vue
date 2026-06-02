<template>
<CouponCodePage :CouponCode="CouponCode"/>
 <!-- <h1>category page</h1> -->
</template>

<script setup>
import CouponCodePage from "@/Components/CouponCode/CouponCodePage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  CouponCode: Array,
});

</script>
