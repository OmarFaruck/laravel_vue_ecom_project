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
        <!-- Page Header End -->


        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <!-- Shop Sidebar Start -->
                <div class="col-lg-3 col-md-12">
                    <!-- Price Start -->
                    <div class="border-bottom mb-4 pb-4">
                        <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>
                        <form>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" checked id="price-all" value="all" v-model="selectedPrice">
                                <label class="custom-control-label" for="price-all">All Price</label>
                                <span class="border font-weight-normal">1000</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" id="price-1" value="0-100" v-model="selectedPrice">
                                <label class="custom-control-label" for="price-1">$0 - $100</label>
                                <span class="border font-weight-normal">150</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" id="price-2" value="100-200" v-model="selectedPrice">
                                <label class="custom-control-label" for="price-2">$100 - $200</label>
                                <span class="border font-weight-normal">295</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" id="price-3" value="200-300" v-model="selectedPrice">
                                <label class="custom-control-label" for="price-3">$200 - $300</label>
                                <span class="border font-weight-normal">246</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" id="price-4" value="300-400" v-model="selectedPrice">
                                <label class="custom-control-label" for="price-4">$300 - $400</label>
                                <span class="border font-weight-normal">145</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                <input type="radio" class="custom-control-input" id="price-5" value="400-500" v-model="selectedPrice">
                                <label class="custom-control-label" for="price-5">$400 - $500</label>
                                <span class="border font-weight-normal">168</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                <input type="radio" class="custom-control-input" id="price-6" value="500-600" v-model="selectedPrice">
                                <label class="custom-control-label" for="price-6">$500 - $600</label>
                                <span class="border font-weight-normal">168</span>
                            </div>
                        </form>
                    </div>
                    <!-- Price End -->

                    <!-- Color Start -->
                    <div class="border-bottom mb-4 pb-4">
                        <h5 class="font-weight-semi-bold mb-4">Filter by color</h5>
                        <form>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" checked id="color-all">
                                <label class="custom-control-label" for="price-all">All Color</label>
                                <span class="badge border font-weight-normal">1000</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" id="color-1">
                                <label class="custom-control-label" for="color-1">Black</label>
                                <span class="badge border font-weight-normal">150</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" id="color-2">
                                <label class="custom-control-label" for="color-2">White</label>
                                <span class="badge border font-weight-normal">295</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" id="color-3">
                                <label class="custom-control-label" for="color-3">Red</label>
                                <span class="badge border font-weight-normal">246</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" id="color-4">
                                <label class="custom-control-label" for="color-4">Blue</label>
                                <span class="badge border font-weight-normal">145</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                <input type="checkbox" class="custom-control-input" id="color-5">
                                <label class="custom-control-label" for="color-5">Green</label>
                                <span class="badge border font-weight-normal">168</span>
                            </div>
                        </form>
                    </div>
                    <!-- Color End -->

                    <!-- Size Start -->
                    <div class="mb-5">
                        <h5 class="font-weight-semi-bold mb-4">Filter by size</h5>
                        <form>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" checked id="size-all">
                                <label class="custom-control-label" for="size-all">All Size</label>
                                <span class="badge border font-weight-normal">1000</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" id="size-1">
                                <label class="custom-control-label" for="size-1">XS</label>
                                <span class="badge border font-weight-normal">150</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" id="size-2">
                                <label class="custom-control-label" for="size-2">S</label>
                                <span class="badge border font-weight-normal">295</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" id="size-3">
                                <label class="custom-control-label" for="size-3">M</label>
                                <span class="badge border font-weight-normal">246</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" id="size-4">
                                <label class="custom-control-label" for="size-4">L</label>
                                <span class="badge border font-weight-normal">145</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                <input type="checkbox" class="custom-control-input" id="size-5">
                                <label class="custom-control-label" for="size-5">XL</label>
                                <span class="badge border font-weight-normal">168</span>
                            </div>
                        </form>
                    </div>
                    <!-- Size End -->
                </div>
                <!-- Shop Sidebar End -->


                <!-- Shop Product Start -->
                <div class="col-lg-9 col-md-12">
                    <div class="row pb-3">
                        <div class="col-12 pb-1">
                            <div class="d-flex align-items-center justify-content-between mb-4"> 
                                <!-- search by name -->
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search by product name"
                                            v-model="search">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-transparent text-primary">
                                                <i class="fa fa-search"></i>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                                 <!-- search by name -->
                                <div class="dropdown ml-4">
                                    <button class="btn border dropdown-toggle" type="button" id="triggerId"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sort by
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                        <Link class="dropdown-item" href="#">Latest</Link>
                                        <Link class="dropdown-item" href="#">Popularity</Link>
                                        <Link class="dropdown-item" href="#">Best Rating</Link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- trendy Product -->
                        <div v-for="item in filteredTrendyProduct" class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div
                                    class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid w-100" :src="`/storage/trendyproducts/${item.image}`"
                                        alt="item.title">
                                    <!-- <img class="img-fluid w-100" src="img/product-1.jpg" alt=""> -->
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">{{ item.title }} </h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>${{ item.prize }}</h6>
                                        <h6 class="text-muted ml-2"><del>${{ item.cancelprize }}</del></h6>
                                    </div>
                                    
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="" class="btn btn-sm text-dark p-0"><i
                                            class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                    <a href="" class="btn btn-sm text-dark p-0"><i
                                            class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                </div>
                            </div>
                        </div>

                        <!-- justarrived page -->
                        <div v-for="items in filteredJustArrived" class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div
                                    class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid w-100" :src="`/storage/justarrived/${items.image}`"
                                        alt="justarrived.title">
                                    <!-- <img class="img-fluid w-100" src="img/product-1.jpg" alt=""> -->
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">{{ items.title }}</h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>${{ items.prize }}</h6>
                                        <h6 class="text-muted ml-2"><del>${{ items.cancelprize }}</del></h6>
                                    </div>
                                    
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="" class="btn btn-sm text-dark p-0"><i
                                            class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                    <a href="" class="btn btn-sm text-dark p-0"><i
                                            class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 pb-1">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center mb-3">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Shop Product End -->
            </div>
        </div>
        <!-- Shop End -->


    </FrontendLayout>


</template>

<script setup>
import FrontendLayout from '@/Layout/FrontendLayout.vue'
import { Link } from '@inertiajs/vue3'
import { arrow } from '@popperjs/core';
import { ref, computed } from 'vue'
import { usePage } from '@inertiajs/vue3' 
const page = usePage() 
 
defineProps({
    pagename: Array,
    justarrived: Array,
    trendyproduct: Array,

})

// search by name
const search = ref("")   // search by name
const selectedPrice = ref("all")

const trendyproduct = computed(() => page.props.trendyproduct || [])
const justarrived = computed(() => page.props.justarrived || [])

const filteredTrendyProduct = computed(() => {
    return trendyproduct.value.filter(item => {

        const matchSearch = (item.title ?? "")
            .toLowerCase()
            .includes(search.value.toLowerCase())

        let matchPrice = true

        switch (selectedPrice.value) {
            case "0-100":
                matchPrice = item.prize >= 0 && item.prize <= 100
                break

            case "100-200":
                matchPrice = item.prize > 100 && item.prize <= 200
                break

            case "200-300":
                matchPrice = item.prize > 200 && item.prize <= 300
                break
            case "300-400":
                matchPrice = item.prize > 300 && item.prize <= 400
                break
            case "400-500":
                matchPrice = item.prize > 400 && item.prize <= 500
                break
            case "500-600":
                matchPrice = item.prize > 500 && item.prize <= 600
                break
        }

        return matchSearch && matchPrice
    })
})

const filteredJustArrived = computed(() => {
    return justarrived.value.filter(item => {

        const matchSearch = (item.title ?? "")
            .toLowerCase()
            .includes(search.value.toLowerCase())

        let matchPrice = true

        switch (selectedPrice.value) {
            case "0-100":
                matchPrice = item.prize >= 0 && item.prize <= 100
                break

            case "100-200":
                matchPrice = item.prize > 100 && item.prize <= 200
                break

            case "200-300":
                matchPrice = item.prize > 200 && item.prize <= 300
                break
            case "300-400":
                matchPrice = item.prize > 300 && item.prize <= 400
                break
            case "400-500":
                matchPrice = item.prize > 400 && item.prize <= 500
                break    
            case "500-600":
                matchPrice = item.prize > 500 && item.prize <= 600
                break    
        }

        return matchSearch && matchPrice
    })
})

</script>
