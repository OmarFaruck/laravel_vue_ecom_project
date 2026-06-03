<template>
<TicketPage :Ticket="Ticket"/>
 <!-- <h1>category page</h1> -->
</template>

<script setup>
import TicketPage from "@/Components/Ticket/TicketPage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  Ticket: Array,
});

</script>
