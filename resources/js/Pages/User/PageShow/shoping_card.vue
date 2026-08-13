<template>
    <FrontendLayout>
        <!-- Page Header Start -->
        <div class="container-fluid bg-secondary mb-5">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
                <h1 class="font-weight-semi-bold text-uppercase mb-3">Our {{ trendyproduct.heading }}</h1>
                <div class="d-inline-flex">
                    <p class="m-0"><a href="">Home</a></p>
                    <p class="m-0 px-2">-</p>
                    <p class="m-0">{{ trendyproduct.heading }}</p>
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
                        <tbody class="align-middle">
                            <tr>
                                <td class="align-middle">
                                    <img :src="`/storage/trendyproducts/${trendyproduct.image}`"
                                        :alt="trendyproduct.title" style="width: 50px;">
                                </td>

                                <td class="align-middle">
                                    {{ trendyproduct.title }}
                                </td>

                                <td class="align-middle">
                                    ${{ Number(trendyproduct.prize).toFixed(2) }}
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
                                    <button class="btn btn-sm btn-primary" @click="removeItem(trendyproduct.id)">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
                                <h6 class="font-weight-medium">${{ (trendyproduct.prize * 1).toFixed(2) }}</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">$50.00</h6>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Total</h5>
                                <h5 class="font-weight-bold">${{ (trendyproduct.prize * 1 + 10).toFixed(2) }}</h5>
                            </div>
                            <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                        </div>
                    </div>
                </div>
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
    pages: Array,
    category: Array,
    trendyproduct: Object,
    coupon: Array,
});

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
    return Number(props.trendyproduct?.prize ?? 0) * qty.value;
});


// coupon_code
const coupon_code = ref('');

const applyCoupon = () => {
    const code = coupon_code.value.trim();

    if (!code) {
        Swal.fire('Warning!', 'Please enter a coupon code.', 'warning');
        return;
    }

    router.post('/apply-coupon',
        { coupon_code: code },
        {
            onSuccess: (page) => {
                // Laravel session-এর success/error বার্তার উপর ভিত্তি করে alert দেখানো
                if (page.props.flash?.success) {
                    Swal.fire('Success!', page.props.flash.success, 'success');
                    coupon_code.value = ''; // Input clear করুন
                } else if (page.props.flash?.error) {
                    Swal.fire('Error!', page.props.flash.error, 'error');
                }
            },
            onError: (errors) => {
                Swal.fire('Error!', 'Something went wrong!', 'error');
            }
        }
    );
};



const removeItem = (id) => {
    router.post(
        '/remove-from-cart',
        {
            item_id: id
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