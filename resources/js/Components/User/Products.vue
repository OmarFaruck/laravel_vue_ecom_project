<template>
    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">{{ trendyproducts.heading }}</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">

            <div v-for="item in trendyproduct" :key="item.id" class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" :src="`/storage/trendyproducts/${item.image}`" alt="item.title">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"> {{ item.title }} </h6>
                        <div class="d-flex justify-content-center">
                            <h6>${{ item.prize }}</h6>
                            <h6 class="text-muted ml-2"><del>${{ item.cancelprize }}</del></h6>
                        </div>
                        <div class="d-flex justify-content-center">
                            <h6>Product_Color : {{ item.product_color }}</h6>
                            <h6 class="text-muted ml-2">Size : {{ item.product_size }}</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">


                        <Link :href="`/page/product_detail/trendy/${item.id}`" class="btn btn-sm text-dark p-0">
                            <i class="fas fa-eye text-primary mr-1"></i>
                            View Detail
                        </Link>
                        <Link :href="`/page/add_to_cart/${item.product_type}/${item.id}`" class="btn btn-sm text-dark p-0"><i
                                class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</Link>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Products End -->
</template>

<script setup>

import { router, usePage, Link } from '@inertiajs/vue3';
import { Type } from '@lucide/vue';
import { computed } from 'vue';

const page = usePage();
const trendyproduct = computed(() => page.props.trendyproduct || [])
const trendyproducts = computed(() => page.props.trendyproducts || [])

const props = defineProps({
    type: String,
    review: Array,
    product: Object,
    type: String,
    pages: Object, 
    trendyproduct: Object,
    reviewCount: Number,


    trendyProducts: {
        type: Array,
        default: () => []
    },

    justArrivedProducts: {
        type: Array,
        default: () => []
    },

    products: {
        type: Array,
        default: () => []
    }


});

const trendy = props.trendyProducts.map(item => ({
    ...item,
    product_type: 'trendy',
    image_path: 'trendyproducts',
    image: item.image,
    name: item.title,
    purchase_price: item.product_purchase_price,
    selling_price: item.product_selling_price
}));

const justArrived = props.justArrivedProducts.map(item => ({
    ...item,
    product_type: 'justarrived',
    image_path: 'justarrived',
    image: item.image,
    name: item.title,
    purchase_price: item.product_purchase_price,
    selling_price: item.product_selling_price
}));

const normalProducts = props.products.map(item => ({
    ...item,
    product_type: 'product',
    image_path: 'products/product_thumbnail',
    image: item.product_thumbnail,
    name: item.product_name,
    purchase_price: item.product_purchase_price,
    selling_price: item.product_selling_price
}));

const allProducts = computed(() => [
    ...trendy,
    ...justArrived,
    ...normalProducts
]);



</script>
