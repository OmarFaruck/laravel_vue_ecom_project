<template>
    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">

            <div v-for="item in product" class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">{{ item.product_quantity }}</p>
                    <Link href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" :src="'/storage/' + item.product_thumbnail"
                            alt="item.title">
                    </Link> 
                    <h5 class="font-weight-semi-bold m-0">{{ item.product_color }}</h5>
                </div>
            </div>
 
        </div>
    </div>
    <!-- Categories End -->
</template>
<script setup>

import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';


const page = usePage();

const product = computed(() => page.props.product || [])


</script>