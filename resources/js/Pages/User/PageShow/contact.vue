<template>
    <FrontendLayout>
        <!-- Page Header Start -->
        <div class="container-fluid bg-secondary mb-5">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
                <h1 class="font-weight-semi-bold text-uppercase mb-3">Our {{ pagename.name }}</h1>
                <div class="d-inline-flex">
                    <p class="m-0"><a href="">Home</a></p>
                    <p class="m-0 px-2">-</p>
                    <p class="m-0">{{ pagename.name }}</p>
                </div>
            </div>
        </div>
    </FrontendLayout>
</template>

<script setup>
import FrontendLayout from '@/Layout/FrontendLayout.vue'
import { Link } from '@inertiajs/vue3'
import { arrow } from '@popperjs/core';
import { ref, computed } from 'vue'
import { usePage } from '@inertiajs/vue3'
const page = usePage()

defineProps({
    pagename: Array,
    // justarrived: Array,
    // trendyproduct: Array,

})
</script>