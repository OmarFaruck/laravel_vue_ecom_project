<template>
    <form @submit.prevent="submitReview" class="mt-3">

        <div class="form-group">
            <label for="message">Your Review *</label>

            <textarea id="message" class="form-control" v-model="form.message"></textarea>

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


        <div class="form-group">
            <label for="rating">Your Rating *</label>

            <select id="rating" class="form-control" v-model="form.rating">
                <option :value="0">Select Rating</option>
                <option :value="1">1 Star</option>
                <option :value="2">2 Stars</option>
                <option :value="3">3 Stars</option>
                <option :value="4">4 Stars</option>
                <option :value="5">5 Stars</option>
            </select>

            <div class="text-danger" v-if="form.errors.rating">
                {{ form.errors.rating }}
            </div>
        </div>


        <div class="form-group mb-0">
            <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
        </div>

    </form>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { usePage, useForm, router } from "@inertiajs/vue3";
import { Modal } from "bootstrap";


const page = usePage()

const props = defineProps({
    review: Array,
    product: Object,
    trendyproduct: Object,
    reviewCount: Number,
     
 
});




// review form
const form = useForm({
    message: '',
    name: '',
    email: '',
    rating: 0, 
})

const submitReview = () => {
    form.post('/review', {
        preserveScroll: true,
        onSuccess: () => {
            form.reset('message', 'name', 'email', 'rating')
        }
    })
}

</script>