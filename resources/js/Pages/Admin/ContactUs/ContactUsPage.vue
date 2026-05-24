<template>
<ContactUsPage :ContactUs="ContactUs"/>
 <!-- <h1>category page</h1> -->
</template>

<script setup>
import ContactUsPage from "@/Components/ContactUs/ContactUsPage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  ContactUs: Array,
});

</script>
