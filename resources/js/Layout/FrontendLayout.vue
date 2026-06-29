<template>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
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
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <Link href="/homeproduct/pages" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold">
                        <span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper
                    </h1>
                </Link>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products" v-model="search"/>
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">0</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                    data-toggle="collapse" href="#navbar-vertical"
                    style="height: 65px; margin-top: -1px; padding: 0 30px">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>

                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                    id="navbar-vertical">
                    <div class="navbar-nav w-100">

                        <template v-for="cat in category" :key="cat.id">

                            <div v-if="cat.subcategory && cat.subcategory.length" class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    {{ cat.name }}
                                </a>

                                <ul class="dropdown-menu">
                                    <li v-for="sub in cat.subcategory" :key="sub.id">
                                        <Link href="#" class="dropdown-item">
                                            {{ sub.name }}
                                        </Link>
                                    </li>
                                </ul>
                            </div>

                            <Link v-else href="#" class="nav-item nav-link">
                                {{ cat.name }}
                            </Link>

                        </template>

                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold">
                            <span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper
                        </h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <Link class="nav-item nav-link" href="/">Home</Link>
                            <template v-for="item in pages" :key="item?.id"> 
                                <Link :href="`/page/${item.slug}`" class="nav-item nav-link">
                                    {{ item?.name }}
                                </Link>
                            </template>
                        </div>

                        <!-- user login  -->
                        <div class="navbar-nav ml-auto py-0">

                            <!-- ❌ User NOT logged in -->
                            <template v-if="!page.props.auth.user">
                                <Link href="/login" class="nav-item nav-link">
                                    Login
                                </Link>
                            </template>

                            <!-- ✅ User logged in -->
                            <template v-else>
                                <Link href="/logout" method="post" as="button" class="nav-item nav-link">
                                    Logout
                                </Link>
                            </template>

                        </div>


                    </div>

                </nav>

                <!-- home page slider -->
                <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        <div v-for="(slider, index) in homeslider" :key="slider.id" class="carousel-item"
                            :class="{ active: index === 0 }" style="height: 410px;">
                            <img class="img-fluid w-100 h-100" :src="`/storage/homeslider/${slider.image}`"
                                :alt="slider.title" style="object-fit: cover;">

                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width:700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">
                                        {{ slider.offer }}
                                    </h4>

                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">
                                        {{ slider.heading }}
                                    </h3>

                                    <!-- <a :href="slider.button_link" class="btn btn-light py-2 px-3">
                                        {{ slider.button_text }}
                                    </a> -->
                                    <Link href="" class="btn btn-light py-2 px-3">Shop Now</Link>
                                </div>
                            </div>
                        </div>

                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <main>
        <slot />
    </main>

    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold">
                        <span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Shopper
                    </h1>
                </a>
                <p>
                    Dolore erat dolor sit lorem vero amet. Sed sit lorem magna,
                    ipsum no sit erat lorem et magna ipsum dolore amet erat.
                </p>
                <p class="mb-2">
                    <i class="fa fa-map-marker-alt text-primary mr-3"></i>123
                    Street, New York, USA
                </p>
                <p class="mb-2">
                    <i class="fa fa-envelope text-primary mr-3"></i>info@example.com
                </p>
                <p class="mb-0">
                    <i class="fa fa-phone-alt text-primary mr-3"></i>+012 345
                    67890
                </p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">
                            Quick Links
                        </h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our
                                Shop</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop
                                Detail</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping
                                Cart</a>
                            <a class="text-dark mb-2" href="checkout.html"><i
                                    class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact
                                Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">
                            Quick Links
                        </h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our
                                Shop</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop
                                Detail</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping
                                Cart</a>
                            <a class="text-dark mb-2" href="checkout.html"><i
                                    class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact
                                Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">
                            Newsletter
                        </h5>
                        <form @submit.prevent="submitcreate">
                            <div class="form-group">
                                <!-- <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" /> -->
                                <input v-model="form.name" type="text" class="form-control border-0 py-4"
                                    placeholder="Your Name" />
                            </div>
                            <div class="text-danger" v-if="form.errors.name">
                                {{ form.errors.name }}
                            </div>
                            <div class="form-group">
                                <!-- <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                    required="required" /> -->
                                <input v-model="form.email" type="email" class="form-control border-0 py-4"
                                    placeholder="Your Email" />
                            </div>
                            <div class="text-danger" v-if="form.errors.email">
                                {{ form.errors.email }}
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">
                                    Subscribe Now
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Footer End -->
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
    name: "",
    email: "",
});

const submitcreate = () => {
    form.post('/user_newsletter', {
        preserveScroll: true,

        onSuccess: () => {
            form.reset();

            swal(
                "Success!",
                "Newsletter subscribed successfully.",
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
};
</script>


 
