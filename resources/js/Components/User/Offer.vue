<template>
    <!-- Offer Start -->
    <div class="container-fluid offer pt-5"> 
        <div class="row px-xl-5">
            <div v-for="item in collections" class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img :src="`/storage/collection/${item.image}`" alt="collection.title">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">{{ item.heading }}</h5>
                        <h1 class="mb-4 font-weight-semi-bold">{{ item.title }}</h1>
                        <Link href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</Link>
                    </div>
                </div>
            </div>
        
        </div>
    </div>  
    <!-- Offer End -->
</template>
<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue'
 

const page=usePage();

const collections = computed(() => page.props.collections || [])

// import offer1 from '@/Assets/css/fontend/img/offer-1.png'; 
// import offer2 from '@/Assets/css/fontend/img/offer-2.png'; 
</script>