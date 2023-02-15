<template>
    <div class="wrapper">
        <!-- ========== Topbar Start ========== -->
        <div class="navbar-custom">
            <div class="topbar container-fluid">
                <div class="d-flex align-items-center gap-lg-2 gap-1">

                    <!-- Topbar Brand Logo -->
                    <div class="logo-topbar">
                        <!-- Logo light -->
                        <Link href="/admin/" class="logo-light">
                        <span class="logo-lg">
                            <img src="/images/logo/smart accounting-logos_black.png" alt="logo">
                        </span>
                        <span class="logo-sm">
                            <img src="/images/logo/smart accounting-logos_black.png" alt="small logo">
                        </span>
                        </Link>

                        <!-- Logo Dark -->
                        <Link href="/admin/" class="logo-dark">
                        <span class="logo-lg">
                            <img src="/images/logo/smart accounting-logos_white.png" alt="dark logo">
                        </span>
                        <span class="logo-sm">
                            <img src="/images/logo/smart accounting-logos_white.png" alt="small logo">
                        </span>
                        </Link>
                    </div>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="button-toggle-menu">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>

                    <!-- Topbar Search Form -->

                </div>

                <ul class="topbar-menu d-flex align-items-center gap-3">
                    <li class="dropdown d-lg-none">
                        <Link class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ri-search-line font-22"></i>
                        </Link>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                            <form class="p-3">
                                <input type="search" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                            </form>
                        </div>
                    </li>


                    <li class="d-none d-md-inline-block">
                        <Link class="nav-link" href="#" data-toggle="fullscreen">
                        <i class="ri-fullscreen-line font-22"></i>
                        </Link>
                    </li>

                    <li class="dropdown">
                        <Link class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="account-user-avatar">
                            <img src="/images/user.jpg" alt="user-image" width="32" class="rounded-circle">
                        </span>
                        <span class="d-lg-flex flex-column gap-1 d-none">
                            <h5 class="my-0">{{ $page.props.user.name }}</h5>
                            <h6 class="my-0 fw-normal">{{ $page.props.user.role }}</h6>
                        </span>
                        </Link>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <Link href="javascript:void(0);" class="dropdown-item">
                            <i class="mdi mdi-account-circle me-1"></i>
                            <span>My Account</span>
                            </Link>


                            <!-- item-->
                            <Link href="#" @click.prevent="logout()" class="dropdown-item">
                            <i class="mdi mdi-logout me-1"></i>
                            <span>Logout</span>
                            </Link>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ========== Topbar End ========== -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <!-- Brand Logo Light -->
            <Link href="/admin/dashboard" class="logo logo-light">
            <span class="">
                <img src="/images/logo/smart accounting_logos_transparent.png" height="80" width="250" alt="logo">
            </span>
            <span class="logo-sm">
                <img src="/images/logo/smart accounting_logos_transparent.png" height="100" alt="small logo">
            </span>
            </Link>

            <!-- Brand Logo Dark -->
            <Link href="/admin/" class="logo logo-dark">
            <span class="">
                <img src="/images/logo/smart accounting_logos_transparent.png" height="80" width="250" alt="dark logo">
            </span>
            <span class="logo-sm">
                <img src="/images/logo/smart accounting_logos_transparent.png" height="100" alt="small logo">
            </span>
            </Link>

            <!-- Sidebar Hover Menu Toggle Button -->
            <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
                <i class="ri-checkbox-blank-circle-line align-middle"></i>
            </div>

            <!-- Full Sidebar Menu Close Button -->
            <div class="button-close-fullsidebar">
                <i class="ri-close-fill align-middle"></i>
            </div>

            <!-- Sidebar -left -->
            <div class="h-100" id="leftside-menu-container" data-simplebar>
                <!-- Leftbar User -->
                <div class="leftbar-user">
                    <Link href="pages-profile.html">
                    <img src="/images/user.jpg" alt="user-image" height="42" class="rounded-circle shadow-sm">
                    <span class="leftbar-user-name mt-2">Smart Accounting</span>
                    </Link>
                </div>

                <!--- Sidemenu -->
                <ul class="side-nav">

                    <li class="side-nav-title">Navigation</li>

                    <li class="side-nav-item">
                        <Link href="/admin/dashboard" aria-expanded="false" aria-controls="sidebarDashboards"
                            class="side-nav-link">
                        <i class="uil-home-alt"></i>
                        <span> Dashboard </span>
                        </Link>

                    </li>

                    <li class="side-nav-title">Apps</li>

                    <li class="side-nav-item">
                        <Link href="/admin/stores" class="side-nav-link">
                        <i class="uil-store"></i>
                        <span> Stores </span>
                        </Link>
                    </li>
                    <li class="side-nav-item">
                        <Link href="/admin/suppliers" class="side-nav-link">
                        <i class="uil-chat-bubble-user"></i>
                        <span> Suppliers </span>
                        </Link>
                    </li>
                    <li class="side-nav-item">
                        <Link href="/admin/stock/category" class="side-nav-link">
                        <i class="uil-chart-pie"></i>
                        <span> Stock Category </span>
                        </Link>
                    </li>
                    <li class="side-nav-item">
                        <Link href="/admin/stock/products" class="side-nav-link">
                        <i class="uil-receipt"></i>
                        <span> Stock Products </span>
                        </Link>
                    </li>


                    <li class="side-nav-item">
                        <Link href="/admin/customers" class="side-nav-link">
                        <i class="uil-chat-bubble-user"></i>
                        <span> Customers </span>
                        </Link>
                    </li>
                    <li class="side-nav-item">
                        <Link href="/admin/users" class="side-nav-link">
                        <i class="uil-chat-bubble-user"></i>
                        <span> Users </span>
                        </Link>
                    </li>
                </ul>
                <!--- End Sidemenu -->

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- ========== Left Sidebar End ========== -->


        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <slot />
        </div>
    </div>
    <vue3-snackbar bottom right :duration="4000"></vue3-snackbar>

</template>
<script>
import { Link, Inertia } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    },
    methods: {
        logout() {
            this.$inertia.post(route("logout"));
        },
        fireSnackbar(message, title, color, type = "infor") {
            this.$snackbar.add({
                type: type,
                info: type,
                background: color,
                text: message,
                title: title,
            });
        },
    },
    watch: {
        //watch to flash messages
        $page(newProps, oldProps) {
            if (newProps.props.flash.success) {
                this.fireSnackbar(newProps.props.flash.success, "Success", "#31CF80", "info");
            }
            if (newProps.props.flash.error) {
                this.fireSnackbar(newProps.props.flash.error, "Error", "#D82C5B", "info");
            }
            if (newProps.props.flash.message) {
                this.fireSnackbar(newProps.props.flash.message, "Message", "#2DADCF", "info");
            }
        },
    },
};
</script>