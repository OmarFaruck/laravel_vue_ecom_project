<template>
<NewsLetterPage :NewsLetter="NewsLetter"/>
 <!-- <h1>category page</h1> -->
</template>

<script setup>
import NewsLetterPage from "@/Components/NewsLetter/NewsLetterPage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  NewsLetter: Array,
});

</script>
