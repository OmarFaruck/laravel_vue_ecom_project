<template>

 <div class="col-md-6">
        <h4 class="mb-4">{{ trendyproduct.id }}.{{ trendyproduct.title }}</h4>
        <div class="media mb-4">
            <img :src="`/storage/trendyproducts/${trendyproduct.image}`" :alt="trendyproduct.title" class="img-fluid mr-3 mt-1" style="width: 45px;">
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
                <i v-for="star in 5" :key="star" @click="form.rating = star" class="fa-star mr-1"
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
 
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { arrow } from '@popperjs/core';
import { usePage, useForm, router } from "@inertiajs/vue3";
import { Modal } from "bootstrap";
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