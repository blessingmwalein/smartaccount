<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

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
                        <p class="text-muted mb-4">Enter your email address and password to access account.</p>
                        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                            {{ status }}
                        </div>

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
