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
                                <input type="checkbox" class="custom-control-input" checked id="price-all" value="all"
                                    v-model="selectedPrice" name="price">
                                <label class="custom-control-label" for="price-all">All Price</label>
                                <span class="border font-weight-bold">{{ priceCount["100-200"] }}</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" id="price-1" value="0-100"
                                    v-model="selectedPrice">
                                <label class="custom-control-label" for="price-1">$0 - $100</label>
                                <span class="border font-weight-bold">{{ priceCount["0-100"] }}</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" id="price-2" value="100-200"
                                    v-model="selectedPrice">
                                <label class="custom-control-label" for="price-2">$100 - $200</label>
                                <span class="border font-weight-bold">{{ priceCount["100-200"] }}</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" id="price-3" value="200-300"
                                    v-model="selectedPrice">
                                <label class="custom-control-label" for="price-3">$200 - $300</label>
                                <span class="border font-weight-bold">{{ priceCount["200-300"] }}</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" id="price-4" value="300-400"
                                    v-model="selectedPrice">
                                <label class="custom-control-label" for="price-4">$300 - $400</label>
                                <span class="border font-weight-bold">{{ priceCount["300-400"] }}</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                <input type="radio" class="custom-control-input" id="price-5" value="400-500"
                                    v-model="selectedPrice">
                                <label class="custom-control-label" for="price-5">$400 - $500</label>
                                <span class="border font-weight-bold">{{ priceCount["400-500"] }}</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mt-3">
                                <input type="radio" class="custom-control-input" id="price-6" value="500-600"
                                    v-model="selectedPrice">
                                <label class="custom-control-label" for="price-6">$500 - $600</label>
                                <span class="border font-weight-bold">{{ priceCount["500-600"] }}</span>
                            </div>
                        </form>
                    </div>
                    <!-- Price End -->

                    <!-- Color Start -->
                    <div class="border-bottom mb-4 pb-4">
                        <h5 class="font-weight-semi-bold mb-4">Filter by color</h5>
                        <form>
                            <!-- <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" checked id="color-all" value="allcolor" v-model="selectColor" name="color">
                                <label class="custom-control-label" for="price-all">All Color</label>
                                <span class="border font-weight-bold">1000</span>
                            </div> -->
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" id="color-1" value="black"
                                    v-model="selectColor">
                                <label class="custom-control-label" for="color-1">Black</label>
                                <span class="border font-weight-bold">{{ colorCount.black }}</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" id="color-2" v-model="selectColor"
                                    value="white">
                                <label class="custom-control-label" for="color-2">White</label>
                                <span class="border font-weight-bold">{{ colorCount.white }}</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" id="color-3" v-model="selectColor"
                                    value="red">
                                <label class="custom-control-label" for="color-3">Red</label>
                                <span class="border font-weight-bold">{{ colorCount.red }}</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" id="color-4" v-model="selectColor"
                                    value="blue">
                                <label class="custom-control-label" for="color-4">Blue</label>
                                <span class="border font-weight-bold">{{ colorCount.blue }}</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                <input type="radio" class="custom-control-input" id="color-5" v-model="selectColor"
                                    value="green">
                                <label class="custom-control-label" for="color-5">Green</label>
                                <span class="border font-weight-bold">{{ colorCount.green }}</span>
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
                                <input type="radio" class="custom-control-input" checked id="size-all"
                                    v-model="selectSize" value="allsize">
                                <label class="custom-control-label" for="size-all">All Size</label>
                                <span class="border font-weight-bold">{{ sizeCount.allsize }}</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" id="size-1" v-model="selectSize"
                                    value="small">
                                <label class="custom-control-label" for="size-1">small</label>
                                <span class="border font-weight-bold">{{ sizeCount.small }}</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" id="size-2" v-model="selectSize"
                                    value="medium">
                                <label class="custom-control-label" for="size-2">medium</label>
                                <span class="border font-weight-bold">{{ sizeCount.medium }}</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" id="size-3" v-model="selectSize"
                                    value="large">
                                <label class="custom-control-label" for="size-3">large</label>
                                <span class="border font-weight-bold">{{ sizeCount.large }}</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" id="size-4" v-model="selectSize"
                                    value="xxl">
                                <label class="custom-control-label" for="size-4">xxL</label>
                                <span class="border font-weight-bold">{{ sizeCount.xxl }}</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                                <input type="radio" class="custom-control-input" id="size-5" v-model="selectSize"
                                    value="xs">
                                <label class="custom-control-label" for="size-5">Xs</label>
                                <span class="border font-weight-bold">{{ sizeCount.xs }}</span>
                            </div>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mt-3">
                                <input type="radio" class="custom-control-input" id="size-6" v-model="selectSize"
                                    value="xl">
                                <label class="custom-control-label" for="size-6">XL</label>
                                <span class="border font-weight-bold">{{ sizeCount.xl }}</span>
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
                        <div v-for="item in filteredTrendyProduct" :key="item.id"
                            class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div
                                    class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid w-100" :src="`/storage/trendyproducts/${item.image}`"
                                        :alt="item.title">
                                    <!-- <img class="img-fluid w-100" src="img/product-1.jpg" alt=""> -->
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">{{ item.title }} </h6>
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
                                    <a href="" class="btn btn-sm text-dark p-0"><i
                                            class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                    <a href="" class="btn btn-sm text-dark p-0"><i
                                            class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                </div>
                            </div>
                        </div>

                        <!-- justarrived page -->
                        <div v-for="items in filteredJustArrived" :key="items.id"
                            class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div
                                    class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid w-100" :src="`/storage/justarrived/${items.image}`"
                                        :alt="items.title">
                                    <!-- <img class="img-fluid w-100" src="img/product-1.jpg" alt=""> -->
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">{{ items.title }}</h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>${{ items.prize }}</h6>
                                        <h6 class="text-muted ml-2"><del>${{ items.cancelprize }}</del></h6>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <h6>Product_Color : {{ items.product_color }}</h6>
                                        <h6 class="text-muted ml-2">Size : {{ items.product_size }}</h6>
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
const selectColor = ref("allcolor")
const selectSize = ref("allsize")

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

        // Color Filter
        const matchColor =
            selectColor.value === "allcolor" ||
            item.product_color?.toLowerCase() === selectColor.value

        // Size Filter
        const matchSize =
            selectSize.value === "allsize" ||
            item.product_size?.toLowerCase() === selectSize.value.toLowerCase();

        return matchSearch && matchPrice && matchColor && matchSize

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

        // Color Filter
        const matchColor =
            selectColor.value === "allcolor" ||
            item.product_color?.toLowerCase() === selectColor.value

        // Size Filter
        const matchSize =
            selectSize.value === "allsize" ||
            item.product_size?.toLowerCase() === selectSize.value.toLowerCase();

        return matchSearch && matchPrice && matchColor && matchSize
    })
})


// price count 
const allProducts = computed(() => [
    ...trendyproduct.value,
    ...justarrived.value,
]);

const priceCount = computed(() => ({
    all: allProducts.value.length,
    "0-100": allProducts.value.filter(p => p.prize >= 0 && p.prize <= 100).length,
    "100-200": allProducts.value.filter(p => p.prize > 100 && p.prize <= 200).length,
    "200-300": allProducts.value.filter(p => p.prize > 200 && p.prize <= 300).length,
    "300-400": allProducts.value.filter(p => p.prize > 300 && p.prize <= 400).length,
    "400-500": allProducts.value.filter(p => p.prize > 400 && p.prize <= 500).length,
    "500-600": allProducts.value.filter(p => p.prize > 500 && p.prize <= 600).length,
}));


// color count
const AllColor = computed(() => [
    ...trendyproduct.value,
    ...justarrived.value,
]);
const colorCount = computed(() => ({
    all: AllColor.value.length,
    black: AllColor.value.filter(p => p.product_color?.toLowerCase() === "black").length,
    white: AllColor.value.filter(p => p.product_color?.toLowerCase() === "white").length,
    red: AllColor.value.filter(p => p.product_color?.toLowerCase() === "red").length,
    blue: AllColor.value.filter(p => p.product_color?.toLowerCase() === "blue").length,
    green: AllColor.value.filter(p => p.product_color?.toLowerCase() === "green").length,
}));


// Size count
const allSize = computed(() => [
    ...trendyproduct.value,
    ...justarrived.value,
]);

const sizeCount = computed(() => ({
    all: allSize.value.length,
    small: allSize.value.filter(p => p.product_size === "small").length,
    medium: allSize.value.filter(p => p.product_size === "medium").length,
    large: allSize.value.filter(p => p.product_size === "large").length,
    xxl: allSize.value.filter(p => p.product_size === "xxl").length,
    xs: allSize.value.filter(p => p.product_size === "xs").length,
    xl: allSize.value.filter(p => p.product_size === "xl").length,
}));
</script>
