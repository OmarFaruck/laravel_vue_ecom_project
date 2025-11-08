<template>
  <div class="container-fluid py-5">
    <div class="row px-xl-5">
      <div class="col">
        <div
          class="vendor-wrapper"
          ref="slider"
          @mouseenter="pauseSlider"
          @mouseleave="startSlider"
        >
          <div
            class="vendor-item"
            v-for="(vendor, index) in vendorsLoop"
            :key="index"
          >
            <img :src="vendor" alt="" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from "vue";

import vendor1 from "@/Assets/css/fontend/img/vendor-1.jpg";
import vendor2 from "@/Assets/css/fontend/img/vendor-2.jpg";
import vendor3 from "@/Assets/css/fontend/img/vendor-3.jpg";
import vendor4 from "@/Assets/css/fontend/img/vendor-4.jpg";
import vendor5 from "@/Assets/css/fontend/img/vendor-5.jpg";
import vendor6 from "@/Assets/css/fontend/img/vendor-6.jpg";
import vendor7 from "@/Assets/css/fontend/img/vendor-7.jpg";
import vendor8 from "@/Assets/css/fontend/img/vendor-8.jpg";

const vendors = [
  vendor1,
  vendor2,
  vendor3,
  vendor4,
  vendor5,
  vendor6,
  vendor7,
  vendor8,
];

// Duplicate vendors array for infinite loop
const vendorsLoop = [...vendors, ...vendors];

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