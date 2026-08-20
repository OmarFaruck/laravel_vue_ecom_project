<template>
    <FrontendLayout>
        <!-- Page Header Start -->
        <div class="container-fluid bg-secondary mb-5">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
                <h1 class="font-weight-semi-bold text-uppercase mb-3">Our {{ product.title }}</h1>
                <div class="d-inline-flex">
                    <p class="m-0"><a href="">Home</a></p>
                    <p class="m-0 px-2">-</p>
                    <p class="m-0">{{ product.title }}</p>
                </div>
            </div>
        </div>

        <!-- Cart Start -->
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <div class="col-lg-8 table-responsive mb-5">
                    <table class="table table-bordered text-center mb-0">
                        <thead class="bg-secondary text-dark">
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Sub_Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <!-- <tbody class="align-middle" v-for="item in product" :key="`${item.product_type}-${item.id}`"> -->
                        <tbody class="align-middle">
                            <tr>
                                <td class="align-middle">
                                    <img :src="type === 'trendy'
                                        ? `/storage/trendyproducts/${product.image}`
                                        : type === 'justarrived'
                                            ? `/storage/justarrived/${product.image}`
                                            : `/storage/${product.product_thumbnail}`" :alt="product.title"
                                        style="width: 50px;">
                                    <!-- <img :src="product.image_url" :alt="product.name" style="width: 50px;"> -->
                                    <!-- <img :src="`/storage/trendyproducts/${trendyproduct.image}`"
                                        :alt="trendyproduct.title" style="width: 50px;"> -->
                                </td>

                                <td class="align-middle">
                                    {{ product.title }}
                                </td>

                                <td class="align-middle">
                                    ${{ Number(product.prize).toFixed(2) }}
                                </td>

                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">

                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-sm btn-primary btn-minus"
                                                @click="decreaseQty">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>

                                        <input type="text" class="form-control form-control-sm bg-secondary text-center"
                                            v-model.number="qty" readonly>

                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-sm btn-primary btn-plus"
                                                @click="increaseQty">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>

                                    </div>
                                </td>

                                <td class="align-middle">
                                    ${{ totalPrice.toFixed(2) }}
                                </td>

                                <td class="align-middle">
                                    <button class="btn btn-sm btn-primary" @click="removeItem(product.id, type)">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- applyCoupon -->
                <div class="col-lg-4">
                    <form class="mb-5" @submit.prevent="applyCoupon">
                        <div class="input-group">
                            <input type="text" v-model="coupon_code" class="form-control p-4" placeholder="Coupon Code">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Apply Coupon</button>
                            </div>
                        </div>
                    </form>
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">SubTotal</h6>
                                <h6 class="font-weight-medium">${{ totalPrice.toFixed(2) }}</h6>
                                <!-- <h6 class="font-weight-medium">${{ (product.prize * 1).toFixed(2) }}</h6> -->
                            </div>
                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">$10.00</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Coupon Amount</h6>

                                <h6 class="font-weight-medium">
                                    ${{ Number(couponAmount).toFixed(2) }}
                                </h6>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Total</h5>

                                <h5 class="font-weight-bold">
                                    ${{ finalTotal.toFixed(2) }}
                                </h5>
                            </div>
                            <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                        </div>

                    </div>
                </div>
                <!-- applyCoupon -->
            </div>
        </div>
        <!-- Cart End -->
    </FrontendLayout>
</template>


<script setup>
import FrontendLayout from '@/Layout/FrontendLayout.vue'
import { Link } from '@inertiajs/vue3'
// import { arrow } from '@popperjs/core';
import { ref, computed } from 'vue'
import { usePage, router } from '@inertiajs/vue3'
import Swal from 'sweetalert2';

const page = usePage()


const props = defineProps({
    type: String,
    review: Array,
    product: Object,
    pages: Array,
    trendyproduct: Object,
    reviewCount: Number,
    category: Array,
    coupon: Array,

    coupon:
    {
        type: Object,
        default: null
    },

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
    },

    cart: {
        type: Object,
        default: () => ({})
    },

    coupon: {
        type: Object,
        default: null
    },



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

const qty = ref(1);

const increaseQty = () => {
    qty.value++;
};

const decreaseQty = () => {
    if (qty.value > 1) {
        qty.value--;
    }
};

const totalPrice = computed(() => {
    return Number(props.product?.prize ?? 0) * qty.value;
});


// coupon_code

const coupon_code = ref('');
const couponAmount = ref(0);

const applyCoupon = () => {

    const code = coupon_code.value.trim();

    if (!code) {
        Swal.fire(
            'Warning!',
            'Please enter a coupon code.',
            'warning'
        );
        return;
    }

    router.post(
        '/apply-coupon',
        {
            coupon_code: code
        },
        {
            onSuccess: (page) => {

                console.log('Flash:', page.props.flash);

                if (page.props.flash?.success) {

                    couponAmount.value = Number(
                        page.props.flash.coupon_amount ?? 0
                    );

                    Swal.fire(
                        'Success!',
                        page.props.flash.success,
                        'success'
                    );
                }

                if (page.props.flash?.error) {
                    couponAmount.value = 0;

                    Swal.fire(
                        'Error!',
                        page.props.flash.error,
                        'error'
                    );
                }
            }
        }
    );
};



const removeItem = (id, type) => {

    router.post(
        '/remove_from_cart',
        {
            item_id: `${type}_${id}`
        },
        {
            onSuccess: (page) => {

                if (page.props.flash?.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Removed!',
                        text: page.props.flash.success,
                        timer: 1500,
                        showConfirmButton: false
                    });
                }

                if (page.props.flash?.error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: page.props.flash.error
                    });
                }
            },

            onError: () => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Something went wrong!'
                });
            }
        }
    );
};

const finalTotal = computed(() => {
    const subtotal = Number(totalPrice.value || 0);
    const shipping = 10;
    const discount = Number(couponAmount.value || 0);

    return Math.max(0, subtotal + shipping - discount);
});
</script>