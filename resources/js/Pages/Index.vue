
import { Link } from '@inertiajs/inertia-vue3';

<template>
    <div class="authentication-bg pb-0">
        <div class="auth-fluid">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box">
                <div class="card-body d-flex flex-column h-100 gap-3">
                    <!-- Logo -->
                    <div class="auth-brand text-center text-lg-start">
                        <a href="#" class="logo-dark">
                            <span><img src="/images/logo/smart accounting_logos_transparent.png" height="150"
                                    alt="dark logo"></span>
                        </a>
                        <a href="#" class="logo-light">
                            <span><img src="/images/logo/smart accounting_logos_transparent.png" alt="logo"
                                    height="150"></span>
                        </a>
                    </div>

                    <div class="my-auto">
                        <!-- title-->
                        <h4 class="mt-0">Sign In</h4>

                        <form>


                            <div class="d-grid mb-0 text-center">
                                <Link class="btn btn-primary" href="/login"><i class="mdi mdi-login"></i> Log In
                                </Link>
                            </div>
                        </form>
                        <!-- end form-->
                    </div>

                    <!-- Footer-->
                    <footer class="footer footer-alt">

                    </footer>

                </div> <!-- end .card-body -->
            </div>
            <!-- end auth-fluid-form-box-->

            <!-- Auth fluid right content -->
            <div class="auth-fluid-right text-center">
                <div class="auth-user-testimonial">
                    <h2 class="mb-3">Making Business Transactions Easy!</h2>
                    <p class="lead"><i class="mdi mdi-format-quote-open"></i> Making everthing faster and easier. <i
                            class="mdi mdi-format-quote-close"></i>
                    </p>
                    <p>
                        - Smart Accounting Dashboard
                    </p>
                </div> <!-- end auth-user-testimonial-->
            </div>
            <!-- end Auth fluid right content -->
        </div>
    </div>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {

    components: {
        Link
    }
}
</script>