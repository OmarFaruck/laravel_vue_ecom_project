<template>
    <!-- Subscribe Start -->
    <div class="container-fluid bg-secondary my-5">
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>
                    <p>Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod
                        duo labore labore.</p>
                </div>
                <form @submit.prevent="submitcreate">
                    <div class="input-group">
                        <input v-model="form.email" type="email" class="form-control border-white p-4"
                            placeholder="Email Goes Here">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary px-4">Subscribe</button>
                        </div>
                    </div>
                    <div class="text-danger" v-if="form.errors.email">
                        {{ form.errors.email }}
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->
</template>

<script setup>
import { computed } from 'vue'
import { Link, usePage, useForm, router } from '@inertiajs/vue3'


const page = usePage()

const category = computed(() => page.props.category || [])
const pages = computed(() => page.props.pages || [])
const homeslider = computed(() => page.props.homeslider || [])

const form = useForm({
    id: null,
    email: "",
});

const submitcreate = () => {
    form.post('/user_subscribe', {
        preserveScroll: true,

        onSuccess: () => {
            form.reset();

            swal(
                "Success!",
                "Thanks subscribed successfully.",
                "success"
            );
        },

        onError: () => {
            swal(
                "Error!",
                "This email is already subscribed.Please another email form subscribed",
                "error"
            );
        },
    });
};
</script>
