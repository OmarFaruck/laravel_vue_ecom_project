<template>
    <FrontendLayout>

        <div class="container-fluid bg-secondary mb-5">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height:300px">
                <h1 class="font-weight-semi-bold text-uppercase mb-3">
                    {{ categories.name }} page
                </h1>

                <div class="d-inline-flex">
                    <p class="m-0">Home</p>
                    <p class="m-0 px-2">-</p>
                    <p class="m-0">{{ categories.name }}</p>
                </div>
            </div>
        </div>

        <!-- categories wise product page -->
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <div v-for="item in ProductPages" :key="item.id" class="col-lg-4 col-md-6 col-sm-12 pb-1">
                    <!-- <div class="col-lg-4 col-md-6 col-sm-12 pb-1">  -->
                    <div class="card product-item border-0 mb-4">
                        <div
                            class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">

                            <img class="img-fluid w-100" :src="`/storage/${item.product_thumbnail}`"
                                :alt="item.product_name">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{ item.title }} </h6>
                            <div class="d-flex justify-content-center">
                                <h6>${{ item.product_selling_price }}</h6>

                            </div>

                            <div class="d-flex justify-content-center">
                                <h6>Product_Color : {{ item.product_color }}</h6>
                                <h6 class="text-muted ml-2">Size : {{ item.product_size }}</h6>
                            </div>

                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
 
                            <Link :href="`/page/product_detail/product/${item.id}`" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                                Detail</Link>
                            <!-- <Link :href="`/page/product_shop_detail/${item.id}`" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                                Detail</Link> -->
                            <a href="" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
  
 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end -->

    </FrontendLayout>
</template>

<script setup>
import FrontendLayout from '@/Layout/FrontendLayout.vue'
import { Link } from '@inertiajs/vue3'
import { arrow } from '@popperjs/core';
import { ref, computed } from 'vue'
import { usePage } from '@inertiajs/vue3'


const page = usePage()

const props = defineProps({
    pages: Array,
    subcategory: Array,
    // category: Array,
    category: Object,
    // categories: Object,
    categories: Array,
    trendyproduct: Array,
    ProductPages: Array,
    // ProductPages: Object,
    pagename: Array,
    justarrived: Array,

})
 
 

</script>
