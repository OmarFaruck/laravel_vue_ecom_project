<template>
<PageSettingPage :PageSetting="PageSetting"/>
 <!-- <h1>category page</h1> -->
</template>

<script setup>
import PageSettingPage from "@/Components/PageSetting/PageSettingPage.vue";
import BackendLayout from "@/Layout/BackendLayout.vue";

defineOptions({
  layout: BackendLayout,
});

defineProps({
  PageSetting: Array,
});

</script>
