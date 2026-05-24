<template>
<ContactAddressPage :ContactAddress="ContactAddress"/>
 <!-- <h1>category page</h1> -->
</template>

<script setup>
import ContactAddressPage from "@/Components/ContactAddress/ContactAddressPage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  ContactAddress: Array,
});

</script>
