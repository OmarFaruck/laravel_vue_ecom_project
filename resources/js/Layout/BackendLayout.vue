<template>
    <div class="wrapper">
        <!-- Navbar -->
        <NavberLayout />

        <!-- Main Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img
                    :src="AdminLTELogo"
                    alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3"
                    style="opacity: 0.8"
                />
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img
                            :src="myimgs"
                            class="img-circle elevation-2"
                            alt="User Image"
                        />
                    </div>
                    <div class="info">
                        <Link href="/admin/dashboard" class="d-block"
                            >Alexander Pierce</Link
                        >
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul
                        class="nav nav-pills nav-sidebar flex-column"
                        data-widget="treeview"
                        role="menu"
                        data-accordion="false"
                    >
                        <li class="nav-item">
                            <Link
                                href="/admin/dashboard"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith(
                                        '/admin/dashboard'
                                    ),
                                }"
                            >
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link v-if="isAdmin"
                                href="/admin/category"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/admin/category'),
                                }"
                            >
                                <i class="nav-icon fas fa-th"></i>
                                <p>Category</p>
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link v-if="isAdmin"
                                href="/admin/subcategory"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/admin/subcategory'),
                                }"
                            >
                                <i class="nav-icon fas fa-th"></i>
                                <p>SubCategory</p>
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link v-if="isAdmin"
                                href="/admin/page_create"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/admin/page_create'),
                                }"
                            >
                                <i class="nav-icon fas fa-book"></i>
                                <p>PageCreate</p>
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link v-if="isAdmin"
                                href="/admin/homeslider"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/admin/homeslider'),
                                }"
                            >
                                <i class="nav-icon fas fa-home"></i>
                                <p>HomeSlider</p>
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link v-if="isAdmin"
                                href="/admin/brandpage"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/admin/brandpage'),
                                }"
                            >
                                <i class="nav-icon fas fa-tag"></i>
                                <p>BrandPage</p>
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link v-if="isAdmin"
                                href="/admin/trendyproducts"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/admin/trendyproducts'),
                                }"
                            >
                                <i class="nav-icon fas fa-fire"></i>
                                <p>TrendyProduct</p>
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link v-if="isAdmin"
                                href="/admin/collection"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/admin/collection'),
                                }"
                            >
                                <i class="nav-icon fas fa-book"></i>
                                <p>Collection_Page</p>
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link v-if="isAdmin"
                                href="/stayupdate"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/stayupdate'),
                                }"
                            >
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>StayUpdate</p>
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link v-if="isAdmin"
                                href="/admin/justarrived"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/admin/justarrived'),
                                }"
                            >
                                <i class="nav-icon fas fa-fire"></i>
                                <p>JustArrived</p>
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link v-if="isAdmin"
                                href="/newsletter"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/newsletter'),
                                }"
                            >
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>Newsletter</p>
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link
                                href="/contactus"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/contactus'),
                                }"
                            >
                                <i class="nav-icon fas fa-phone"></i>
                                <p>ContactUs</p>
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link
                                href="/contactaddress"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/contactaddress'),
                                }"
                            >
                                <i class="nav-icon fas fa-map-marker-alt"></i>
                                <p>ContactAddress</p>
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link v-if="isAdmin"
                                href="/admin/CouponCode"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/admin/CouponCode'),
                                }"
                            >
                              <i class="nav-icon fas fa-ticket-alt"></i>
                                <p>CouponCode</p>
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link v-if="isAdmin"
                                href="/admin/PageSetting"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/admin/PageSetting'),
                                }"
                            >
                              <i class="nav-icon fas fa-cog"></i>
                                <p>Page Setting</p>
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link v-if="isAdmin"
                                href="/admin/PickupPoint"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/admin/PickupPoint'),
                                }"
                            >
                              <i class="nav-icon fas fa-car"></i>
                                <p>Pickup Point</p>
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link v-if="isAdmin"
                                href="/admin/SeoPage"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/admin/SeoPage'),
                                }"
                            >
                              <i class="nav-icon fas fa-globe"></i>
                                <p>Seo Page</p>
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link v-if="isAdmin"
                                href="/admin/TicketPage"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/admin/TicketPage'),
                                }"
                            >
                              <i class="nav-icon fas fa-ticket"></i>
                                <p>Ticket Page</p>
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link v-if="isAdmin"
                                href="/admin/WareHousePage"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/admin/WareHousePage'),
                                }"
                            >
                              <i class="nav-icon fas fa-warehouse"></i>
                                <p>WareHouse Page</p>
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link v-if="isAdmin"
                                href="/admin/ProductPage"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/admin/ProductPage'),
                                }"
                            >
                              <i class="nav-icon fas fa-product-hunt"></i>
                                <p>Product Page</p>
                            </Link>
                        </li>

                          <li class="nav-item">
                            <Link v-if="isAdmin"
                                href="/admin/ProductVariant"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/admin/ProductVariant'),
                                }"
                            >
                              <i class="nav-icon fas fa-box"></i>
                                <p>Product Variant Page</p>
                            </Link>
                        </li>

                         <li class="nav-item">
                            <Link
                                href="/review"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/review'),
                                }"
                            >
                                <i class="nav-icon fas fa-star"></i>
                                <p>User Reviews</p>
                            </Link>
                        </li>
 

                        <li class="nav-item">
                            <Link
                                href="/logout"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/logout'),
                                }"
                            >
                                <i class="nav-icon fas fa-th"></i>
                                <p>Logout</p>
                            </Link>
                        </li>


                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper p-3">
            <slot />
        </div>
    </div>
</template>

<script setup>
import { Link, usePage} from "@inertiajs/vue3";
import { computed } from 'vue';
import NavberLayout from "./NavberLayout.vue";
import myimgs from "@/Assets/css/backend/img/myimg.jpg";
import AdminLTELogo from "@/Assets/css/backend/img/AdminLTELogo.png";

  
const page = usePage();
 
const isAdmin = computed(() => {
    return page.props.auth.user?.usertype == 1
})

</script>

<style scoped>
.content-wrapper {
    min-height: calc(100vh - 56px);
    background: #f4f6f9;
}
</style>
