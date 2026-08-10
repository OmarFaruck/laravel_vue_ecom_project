<template>
    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4"> 
            <h2 class="section-title px-5"><span class="px-2">{{ justarriveds.heading }}</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">

            <div v-for="item in justarrived" class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" :src="`/storage/justarrived/${item.image}`" alt="justarrived.title">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{ item.title }}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>${{ item.prize }}</h6><h6 class="text-muted ml-2"><del>${{ item.cancelprize }}</del></h6>
                        </div>
                        <div class="d-flex justify-content-center">
                            <h6>Product_Color : {{ item.product_color }}</h6><h6 class="text-muted ml-2">Size : {{ item.product_size }}</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
 
                         <Link :href="`/page/just_arrived_shop_detail/${item.id}`" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</Link>
  
 
                        <Link href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</Link>
                    </div>
                </div>
            </div>

             
        </div>
    </div>
    <!-- Products End -->
</template>



<script setup>

import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';



const page=usePage();
const justarrived = computed( () => page.props.justarrived || [])
const justarriveds = computed( () => page.props.justarriveds || [])

 
defineProps({
    justArrived: Object,
})

</script>