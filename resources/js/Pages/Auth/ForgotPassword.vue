<!-- <template>
    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <div class="mb-4 text-sm text-gray-600">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Email Password Reset Link
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetLabel,
            JetValidationErrors
        },

        props: {
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: ''
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('password.email'))
            }
        }
    }
</script> -->

<template>
    <div class="account-pages mt-sm-5 mt-1 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-8 col-12">
                    <div class="card bg-pattern" style="
                           box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
                        ">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-center w-75 m-auto">
                                        <div class="auth-logo">
                                            <a href="/" class="logo logo-dark text-center">
                                                <span class="logo-lg text-md" style="
                                                        font-size: 20px;
                                                        font-weight: 700;
                                                    ">
                                                    <img src="" w-100 h-100 alt="" />
                                                </span>
                                                <h4 style="font-weight: 700">
                                                    Login Here
                                                </h4>
                                            </a>

                                            <a href="" class="logo logo-light text-center">
                                                <span class="logo-lg">
                                                    <img src="site/images/favicon.ico'" alt="" height="22" />
                                                </span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="flex  justify-center align-center mt-12">
                                        
                                        <div>
                                            Please contact the adminstrator
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 text-center">
                                            <p>
                                                <inertia-link v-if="canResetPassword" :href="route(
                                                    'password.request'
                                                )
                                                    " class="underline text-sm text-gray-600 hover:text-gray-900">
                                                    Forgot your password?
                                                </inertia-link>
                                            </p>

                                            <!-- <p class="text-dark-50">
                                                Don't have an account?

                                                <inertia-link
                                                    :href="route('register')"
                                                    class="ml-4 text-dark text-sm text-gray-700"
                                                >
                                                    Sign Up
                                                </inertia-link>
                                            </p> -->
                                        </div>
                                        <!-- end col -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class=" text-center fw-bold">IFAKARA CATHOLIC DIOCESE</h4>


                                    <img src="site/img/bg-img/church_1.jpeg" alt="..." class="d-block img-fluid" />
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- end row -->
                    </div>

                    <!-- end col -->
                </div>

                <!-- end row -->
            </div>
            <!-- end container -->
            <!-- <small class="text-center text-sm text-black fixed-bottom mb-3">&copy; 2023 Ifakara Catholic Diosece. All Rights
                Reserved.</small> -->
        </div>
        <!-- end page -->
        <footer class="footer footer-alt text-dark-50">
            2023 &copy; | <a href="" class="text-dark-50">Ifakara catholic diocese</a>
        </footer>
    </div>
</template>

<script>
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetCheckbox from "@/Jetstream/Checkbox";
import JetLabel from "@/Jetstream/Label";
import JetValidationErrors from "@/Jetstream/ValidationErrors";

export default {
    components: {
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetCheckbox,
        JetLabel,
        JetValidationErrors,
    },

    props: {
        canResetPassword: Boolean,
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: "",
                password: "",
                remember: false,
            }),
        };
    },

    methods: {
        submit() {
            this.form
                .transform((data) => ({
                    ...data,
                    remember: this.form.remember ? "on" : "",
                }))
                .post(this.route("login"), {
                    onFinish: () => this.form.reset("password"),
                });
        },
    },
};
</script>