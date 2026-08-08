<template>
    <FrontendLayout>
        <!-- Page Header Start -->
        <div class="container-fluid bg-secondary mb-5">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
                <h1 class="font-weight-semi-bold text-uppercase mb-3">Our {{ trendyproduct.heading }}</h1>
                <div class="d-inline-flex">
                    <p class="m-0"><a href="">Shop</a></p>
                    <p class="m-0 px-2">-</p>
                    <p class="m-0">{{ trendyproduct.heading }}</p>
                </div>
            </div>
        </div>




        <!-- Shop Detail Start -->
        <div class="container-fluid py-5">
            <div class="row px-xl-5">
                <div class="col-lg-5 pb-5">
                    <div id="product-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner border">

                            <div class="carousel-item active">
                                <img class="w-100 h-100" :src="`/storage/trendyproducts/${trendyproduct.image}`"
                                    :alt="trendyproduct.title">
                            </div>
                            <div class="carousel-item">
                                <img class="w-100 h-100" :src="`/storage/trendyproducts/${trendyproduct.image}`"
                                    :alt="trendyproduct.title">
                            </div>
                            <div class="carousel-item">
                                <img class="w-100 h-100" :src="`/storage/trendyproducts/${trendyproduct.image}`"
                                    :alt="trendyproduct.title">
                            </div>

                        </div>

                        <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                            <i class="fa fa-2x fa-angle-left text-dark"></i>
                        </a>

                        <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                            <i class="fa fa-2x fa-angle-right text-dark"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-7 pb-5">
                    <h3 class="font-weight-semi-bold">{{ trendyproduct.title }}</h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">(50 Reviews)</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">${{ trendyproduct.prize }}</h3>

                    <div class="d-flex mb-3">
                        <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                        <form>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="size-1" {{
                                    trendyproduct.product_size }}>
                                <label class="custom-control-label" for="size-1">{{ trendyproduct.product_size
                                }}</label>
                            </div>

                        </form>
                    </div>
                    <div class="d-flex mb-4">
                        <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                        <form>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="color-1" name="color">
                                <label class="custom-control-label" for="color-1">{{ trendyproduct.product_color
                                }}</label>
                            </div>

                        </form>
                    </div>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control bg-secondary text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To
                            Cart</button>
                    </div>
                    <div class="d-flex pt-2">
                        <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row px-xl-5">
                <div class="col">
                    <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                        <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Product Description</h4>
                            <p>{{ trendyproduct.description }}
                            </p>

                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3">Additional Information</h4>
                            <p>{{ trendyproduct.description }}
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4">{{ trendyproduct.id }}.{{ trendyproduct.title }}</h4>
                                    <div class="media mb-4">
                                        <img :src="`/storage/trendyproducts/${trendyproduct.image}`"
                                            :alt="trendyproduct.title" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body" v-if="review">
                                            <h6>{{ review.name }}<small> - <i>01 Jan 2045</i></small></h6>
                                            <div class="text-primary mb-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <p>{{ review.message }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <h4 class="mb-4">Leave a review</h4>
                                    <small>Your email address will not be published. Required fields are marked
                                        *</small>
                                    <div class="d-flex my-3 align-items-center">
                                        <p class="mb-0 mr-2">Your Rating * :</p>

                                        <div>
                                            <i v-for="star in 5" :key="star" @click="form.rating = star"
                                                class="fa-star mr-1"
                                                :class="star <= form.rating ? 'fas text-warning' : 'far text-secondary'"
                                                style="cursor:pointer; font-size:24px;"></i>

                                            <span class="ml-2">
                                                {{ form.rating }}/5
                                            </span>
                                        </div>
                                    </div>

                                    <div class="text-danger" v-if="form.errors.rating">
                                        {{ form.errors.rating }}
                                    </div>
                                    <form @submit.prevent="submitReview" class="mt-3">
                                        <div class="form-group">
                                            <label for="message">Your Review *</label>
                                            <textarea class="form-control" v-model="form.message"></textarea>
                                            <div class="text-danger" v-if="form.errors.message">
                                                {{ form.errors.message }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Your Name *</label>
                                            <input type="text" class="form-control" id="name" v-model="form.name">
                                            <div class="text-danger" v-if="form.errors.name">
                                                {{ form.errors.name }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Your Email *</label>
                                            <input type="email" class="form-control" id="email" v-model="form.email">
                                            <div class="text-danger" v-if="form.errors.email">
                                                {{ form.errors.email }}
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Shop Detail End -->


    </FrontendLayout>
</template>

<script setup>
import FrontendLayout from '@/Layout/FrontendLayout.vue'
import { Link, usePage, useForm, router } from '@inertiajs/vue3'
import { arrow } from '@popperjs/core';
import { ref, computed } from "vue";

const page = usePage()

defineProps({
    trendyproduct: Object,
    review: Object,

})


const form = useForm({
    message: '',
    name: '',
    email: '',
    rating: 0,
})

const submitReview = () => {
    form.post('/review', {
        onSuccess: () => {
            form.reset();
        }
    });
}



</script>
