<template>
 
<FrontendLayout>
   <HomeProductPage/>
   <Categories :category="category" :pages="pages" />
   <Offer/>
   <Products/>
   <Subscribe/>
   <Productpage/>
   <Vendor/>
</FrontendLayout>

                
</template>
<script setup> 
import FrontendLayout from '@/Layout/FrontendLayout.vue';
import HomeProductPage from '@/Components/User/HomeProductPage.vue';
import Categories from '@/Components/User/Categories.vue';
import Offer from '@/Components/User/Offer.vue';
import Products from '@/Components/User/Products.vue';
import Subscribe from '@/Components/User/Subscribe.vue';
import Productpage from '@/Components/User/Productpage.vue';
import Vendor from '@/Components/User/Vendor.vue';


 defineProps({
    category: Array,
    pages: Array
})

</script>