<template>
    <FrontendLayout>
        <!-- Page Header Start -->
        <div class="container-fluid bg-secondary mb-5">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
                <h1 class="font-weight-semi-bold text-uppercase mb-3" v-if="product.length">Our {{ product[0].title }}</h1>
                <div class="d-inline-flex">
                    <p class="m-0"><a href="">Home</a></p>
                    <p class="m-0 px-2">-</p>
                    <p class="m-0">{{ product[0].title }}</p>
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

                            <tr v-if="cartProducts.length === 0">
                                <td colspan="6" class="text-center">
                                    No products found
                                </td>
                            </tr>

                            <tr v-for="product in cartProducts" :key="`${product.type}_${product.id}`">

                                <!-- Image -->
                                <td class="align-middle">

                                    <img :src="getImageUrl(product)" :alt="product.title" style="width: 50px;">

                                </td>

                                <!-- Product Name -->
                                <td class="align-middle">
                                    {{ product.title }}
                                </td>

                                <!-- Price -->
                                <td class="align-middle">
                                    ${{ Number(product.prize ?? 0).toFixed(2) }}
                                </td>

                                <!-- Quantity -->
                                <td class="align-middle">

                                    <div class="input-group quantity mx-auto" style="width: 100px;">

                                        <div class="input-group-btn">

                                            <button type="button" class="btn btn-sm btn-primary"
                                                @click="decreaseQty(product)">
                                                <i class="fa fa-minus"></i>
                                            </button>

                                        </div>

                                        <input type="text" class="form-control form-control-sm bg-secondary text-center"
                                            :value="product.qty" readonly>

                                        <div class="input-group-btn">

                                            <button type="button" class="btn btn-sm btn-primary"
                                                @click="increaseQty(product)">
                                                <i class="fa fa-plus"></i>
                                            </button>

                                        </div>

                                    </div>

                                </td>

                                <!-- Sub Total -->
                                <td class="align-middle">

                                    ${{
                                        (
                                            Number(product.prize ?? 0) *
                                            Number(product.qty ?? 1)
                                    ).toFixed(2)
                                    }}

                                </td>

                                <!-- Remove -->
                                <td class="align-middle">

                                    <button class="btn btn-sm btn-primary"
                                        @click="removeItem(product.id, product.type)">
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
                            <Link :href="`/check_out`" alt="">
                                <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                            </Link>
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
    product: Array,
    pages: {
        type: Array,
        default: () => []
    },

    category: {
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
    }
})


const cartProducts = computed(() => {

    return Object.values(props.cart).map(item => ({
        ...item,
        qty: Number(item.qty ?? 1)
    }))

})


const getImageUrl = (product) => {

    if (product.type === 'trendy') {
        return `/storage/trendyproducts/${product.image}`
    }

    if (product.type === 'justarrived') {
        return `/storage/justarrived/${product.image}`
    }

    return `/storage/${product.image}`
}

const increaseQty = (product) => {

    product.qty = Number(product.qty ?? 1) + 1

    router.post('/update-cart-quantity', {
        item_id: `${product.type}_${product.id}`,
        qty: product.qty
    }, {
        preserveScroll: true,
        preserveState: true
    })
}


const decreaseQty = (product) => {

    if (Number(product.qty) <= 1) {
        return
    }

    product.qty = Number(product.qty) - 1

    router.post('/update-cart-quantity', {
        item_id: `${product.type}_${product.id}`,
        qty: product.qty
    }, {
        preserveScroll: true,
        preserveState: true
    })
}


const totalPrice = computed(() => {

    return cartProducts.value.reduce((total, product) => {

        const price = Number(product.prize ?? 0)
        const qty = Number(product.qty ?? 1)

        return total + (price * qty)

    }, 0)

})

const finalTotal = computed(() => {

    const subtotal = Number(totalPrice.value || 0)
    const shipping = 10
    const discount = Number(couponAmount.value || 0)

    return Math.max(
        0,
        subtotal + shipping - discount
    )

})

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
</script>