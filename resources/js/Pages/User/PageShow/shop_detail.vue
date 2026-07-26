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
import { usePage } from '@inertiajs/vue3'
const page = usePage()

defineProps({
    pagename: Array,
    // justarrived: Array,
    // trendyproduct: Array,

})


import { ref,computed } from "vue";



// const trendyproduct = computed(() => page.props.trendyproduct || [])
// const justarrived = computed(() => page.props.justarrived || [])


// const vendorsLoop = computed(() => [
//     ...trendyproduct.value,
//     ...justarrived.value
// ]);

// const slider = ref(null);
// let animationFrame = null;
// const speed = 1; // pixels per frame

// const slide = () => {
//     if (!slider.value) return;
//     slider.value.scrollLeft += speed;
//     if (slider.value.scrollLeft >= slider.value.scrollWidth / 2) {
//         slider.value.scrollLeft = 0; // loop
//     }
//     animationFrame = requestAnimationFrame(slide);
// };

// const startSlider = () => {
//     if (!animationFrame) slide();
// };

// const pauseSlider = () => {
//     cancelAnimationFrame(animationFrame);
//     animationFrame = null;
// };

// onMounted(() => {
//     startSlider();
// });

// onBeforeUnmount(() => {
//     pauseSlider();
// });
</script>

<!-- <style scoped>
.vendor-wrapper {
    display: flex;
    gap: 25px;
    overflow-x: hidden;
    scroll-behavior: smooth;
    cursor: grab;
}

.vendor-item {
    min-width: 150px;
    max-width: 150px;
    border: 1px solid #eee;
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.vendor-item img {
    width: 100%;
    height: auto;
    object-fit: contain;
}
</style> -->