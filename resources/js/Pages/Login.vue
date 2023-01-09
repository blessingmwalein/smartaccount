<template>
    <div class="authentication-bg pb-0">
        <div class="auth-fluid">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box">
                <div class="card-body d-flex flex-column h-100 gap-3">

                    <!-- Logo -->
                    <div class="auth-brand text-center text-lg-start">
                        <a href="index.html" class="logo-dark">
                            <span><img src="assets/images/logo-dark.png" alt="dark logo" height="22"></span>
                        </a>
                        <a href="index.html" class="logo-light">
                            <span><img src="assets/images/logo.png" alt="logo" height="22"></span>
                        </a>
                    </div>

                    <div class="my-auto">
                        <!-- title-->
                        <h4 class="mt-0">Sign In</h4>
                        <p class="text-muted mb-4">Enter your email address and password to access account.</p>
                        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                            {{ status }}
                        </div>
                        <!-- form -->
                        <form @submit.prevent="submit">
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control" type="email" id="email" v-model="form.email" required=""
                                    placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <Link :href="route('password.request')" class="text-muted float-end"
                                    v-if="canResetPassword"><small>Forgot your
                                    password?</small></Link>
                                <label for="password" class="form-label">Password</label>
                                <input class="form-control" type="password" required="" id="password"
                                    v-model="form.password" placeholder="Enter your password">
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <Checkbox v-model:checked="form.remember" name="remember" />
                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>
                            <div class="d-grid mb-0 text-center">
                                <button class="btn btn-primary" type="submit" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"><i class="mdi mdi-login"></i> Log In
                                </button>
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
                    <h2 class="mb-3">I love the color!</h2>
                    <p class="lead"><i class="mdi mdi-format-quote-open"></i> It's a elegent templete. I love it very
                        much! . <i class="mdi mdi-format-quote-close"></i>
                    </p>
                    <p>
                        - Hyper Admin User
                    </p>
                </div> <!-- end auth-user-testimonial-->
            </div>
            <!-- end Auth fluid right content -->
        </div>
    </div>
</template>
<script>
import MainLayout from '../Layouts/MainLayout.vue';
import Checkbox from '@/Components/Checkbox.vue';

export default {
    name: 'Login',
    props: ["canResetPassword", "status"],
    components: {
        MainLayout,
        Checkbox
    },
    data() {
        return {
            form: useForm({
                email: '',
                password: '',
                remember: false,
            })
        }
    },

    methods: {
        submit() {
            form.transform(data => ({
                ...data,
                remember: form.remember ? 'on' : '',
            })).post(route('login'), {
                onFinish: () => form.reset('password'),
            });
        }
    }

}
</script>