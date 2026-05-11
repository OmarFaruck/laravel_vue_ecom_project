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
                            <Link
                                href="/category"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/category'),
                                }"
                            >
                                <i class="nav-icon fas fa-th"></i>
                                <p>Category</p>
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link
                                href="/subcategory"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/subcategory'),
                                }"
                            >
                                <i class="nav-icon fas fa-th"></i>
                                <p>SubCategory</p>
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link
                                href="/page_create"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/page_create'),
                                }"
                            >
                                <i class="nav-icon fas fa-book"></i>
                                <p>PageCreate</p>
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link
                                href="/homeslider"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/homeslider'),
                                }"
                            >
                                <i class="nav-icon fas fa-home"></i>
                                <p>HomeSlider</p>
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link
                                href="/brandpage"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith('/brandpage'),
                                }"
                            >
                                <i class="nav-icon fas fa-tag"></i>
                                <p>BrandPage</p>
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
import { Link, usePage } from "@inertiajs/vue3";
import NavberLayout from "./NavberLayout.vue";
import myimgs from "@/Assets/css/backend/img/myimg.jpg";
import AdminLTELogo from "@/Assets/css/backend/img/AdminLTELogo.png";
</script>

<style scoped>
.content-wrapper {
    min-height: calc(100vh - 56px);
    background: #f4f6f9;
}
</style>
