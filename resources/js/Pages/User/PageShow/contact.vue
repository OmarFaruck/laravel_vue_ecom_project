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
        <!-- Contact Start -->
        <div class="container-fluid pt-5">
            <div class="text-center mb-4">
                <h2 class="section-title px-5"><span class="px-2">Contact For Any Queries</span></h2>
            </div>
            <div class="row px-xl-5">
                <div class="col-lg-7 mb-5">
                    <div class="contact-form"> 
                        <form @submit.prevent="submitForm">
                            <div class="control-group">
                                <input type="text" class="form-control" id="name" placeholder="Your Name"
                                    required="required" data-validation-required-message="Please enter your name"
                                    v-model="form.name" /> 
                                <div class="text-danger" v-if="form.errors.name">
                                    {{ form.errors.name }}
                                </div>
                            </div>
                            <div class="control-group mt-3">
                                <input type="email" class="form-control" id="email" placeholder="Your Email"
                                    required="required" data-validation-required-message="Please enter your email"
                                    v-model="form.email" />
                                <div class="text-danger" v-if="form.errors.email">
                                    {{ form.errors.email }}
                                </div>
                            </div>
                            <div class="control-group mt-3">
                                <input type="text" class="form-control" id="subject" placeholder="Subject"
                                    required="required" data-validation-required-message="Please enter a subject"
                                    v-model="form.subject" />
                                <div class="text-danger" v-if="form.errors.subject">
                                    {{ form.errors.subject }}
                                </div>
                            </div>
                            <div class="control-group mt-3">
                                <textarea class="form-control" rows="6" id="message" placeholder="Message"
                                    required="required" data-validation-required-message="Please enter your message"
                                    v-model="form.message"></textarea>
                                <div class="text-danger" v-if="form.errors.message">
                                    {{ form.errors.message }}
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary py-2 px-4" id="sendMessageButton">Send
                                    Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 mb-5">
                    <h5 class="font-weight-semi-bold mb-3">{{ contactaddress.heading }}</h5>
                    <p>{{ contactaddress.message }}.</p>
                    <div class="d-flex flex-column mb-3">
                        <h5 class="font-weight-semi-bold mb-3">Store 1</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>{{
                            contactaddress.address_1 }}
                        </p>
                        <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>{{ contactaddress.ouremail_1 }}
                        </p>
                        <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>{{ contactaddress.phone_1 }}
                        </p>
                    </div>
                    <div class="d-flex flex-column">
                        <h5 class="font-weight-semi-bold mb-3">Store 2</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>{{
                            contactaddress.address_2 }}
                        </p>
                        <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>{{ contactaddress.ouremail_2 }}
                        </p>
                        <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>{{ contactaddress.phone_2 }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
    </FrontendLayout>
</template>

<script setup>
import FrontendLayout from '@/Layout/FrontendLayout.vue'
import { Link,usePage,useForm,router } from '@inertiajs/vue3'
import { arrow } from '@popperjs/core';
import { ref, computed } from 'vue'

const page = usePage()

const form = useForm({
    name: '',
    email: '',
    subject: '',
    message: ''
})

const submitForm = () => {
      form.post('/user_contact', {
        preserveScroll: true,

        onSuccess: () => {
            form.reset();

            swal(
                "Success!",
                "Contact message sent successfully.",
                "success"
            );
        },

        onError: () => {
            swal(
                "Error!",
                "Please check the form fields.",
                "error"
            );
        },
    });
}


defineProps({
    pagename: Array,
    contactaddress: Object,
    contactus: Object,

})


</script>