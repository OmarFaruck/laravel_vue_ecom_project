<template>
  <!-- Products Start -->
  <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">{{ trendyproducts.heading }}</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">

            <div v-for="item in trendyproduct" class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" :src="`/storage/trendyproducts/${item.image}`" alt="item.title">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"> {{ item.title }} </h6>
                        <div class="d-flex justify-content-center">
                            <h6>${{ item.prize }}</h6><h6 class="text-muted ml-2"><del>${{ item.cancelprize }}</del></h6>
                        </div>
                        <div class="d-flex justify-content-center">
                            <h6>Product_Color : {{ item.product_color }}</h6><h6 class="text-muted ml-2">Size : {{ item.product_size }}</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a :href="`/page/trendy_shop_detail/${item.id}`" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Products End -->
</template>

<script setup>

import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';


const page=usePage();

const trendyproduct= computed(()=> page.props.trendyproduct  || [])
const trendyproducts= computed(()=> page.props.trendyproducts  || [])

</script>
