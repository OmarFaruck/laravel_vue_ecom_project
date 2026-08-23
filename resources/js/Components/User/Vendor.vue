<template>
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="vendor-wrapper" ref="slider" @mouseenter="pauseSlider" @mouseleave="startSlider">
                <div class="vendor-item" v-for="item in vendorsLoop" :key="item.id">
                    <Link :href="`/page/brand_wise_product/${item.id}`">
                      <img :src="`/storage/brands/${item.image}`" :alt="item.name">
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { ref, onMounted, onBeforeUnmount, computed } from "vue";




const page = usePage();
const brand = computed(() => page.props.brand || [])


const vendorsLoop = computed(() => [
    ...brand.value,
    ...brand.value
]);

const slider = ref(null);
let animationFrame = null;
const speed = 1; // pixels per frame

const slide = () => {
    if (!slider.value) return;
    slider.value.scrollLeft += speed;
    if (slider.value.scrollLeft >= slider.value.scrollWidth / 2) {
        slider.value.scrollLeft = 0; // loop
    }
    animationFrame = requestAnimationFrame(slide);
};

const startSlider = () => {
    if (!animationFrame) slide();
};

const pauseSlider = () => {
    cancelAnimationFrame(animationFrame);
    animationFrame = null;
};

onMounted(() => {
    startSlider();
});

onBeforeUnmount(() => {
    pauseSlider();
});
</script>

<style scoped>
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
</style>