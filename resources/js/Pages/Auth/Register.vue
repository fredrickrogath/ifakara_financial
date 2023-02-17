<template>
    <div class="account-pages mt-sm-5 mt-1 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-8 col-12">
                    <div
                        class="card bg-pattern"
                        style="
                            box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px,
                                rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
                        "
                    >
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-center w-75 m-auto">
                                        <div class="auth-logo">
                                            <a
                                                href="index.html"
                                                class="logo logo-dark text-center"
                                            >
                                                <span
                                                    class="logo-lg text-md"
                                                    style="
                                                        font-size: 20px;
                                                        font-weight: 700;
                                                    "
                                                >
                                                    <img
                                                        src=""
                                                        w-100
                                                        h-100
                                                        alt=""
                                                    />
                                                </span>
                                                <h4 style="font-weight: 700">
                                                    Login Here
                                                </h4>
                                            </a>

                                            <a
                                                href=""
                                                class="logo logo-light text-center"
                                            >
                                                <span class="logo-lg">
                                                    <img
                                                        src="site/images/favicon.ico'"
                                                        alt=""
                                                        height="22"
                                                    />
                                                </span>
                                            </a>
                                        </div>
                                    </div>

                                    <jet-authentication-card>
                                        <jet-validation-errors class="mb-4" />

                                        <form @submit.prevent="submit">
                                            <div>
                                                <jet-label
                                                    for="name"
                                                    value="Name"
                                                />
                                                <jet-input
                                                    id="name"
                                                    type="text"
                                                    class="mt-1 block w-full"
                                                    v-model="form.name"
                                                    required
                                                    autofocus
                                                    autocomplete="name"
                                                />
                                            </div>

                                            <div class="mt-2">
                                                <jet-label
                                                    for="email"
                                                    value="Email"
                                                />
                                                <jet-input
                                                    id="email"
                                                    type="email"
                                                    class="mt-1 block w-full"
                                                    v-model="form.email"
                                                    required
                                                />
                                            </div>

                                            <div class="mt-2">
                                                <jet-label
                                                    for="password"
                                                    value="Password"
                                                />
                                                <jet-input
                                                    id="password"
                                                    type="password"
                                                    class="mt-1 block w-full"
                                                    v-model="form.password"
                                                    required
                                                    autocomplete="new-password"
                                                />
                                            </div>

                                            <div class="mt-2">
                                                <jet-label
                                                    for="password_confirmation"
                                                    value="Confirm Password"
                                                />
                                                <jet-input
                                                    id="password_confirmation"
                                                    type="password"
                                                    class="mt-1 block w-full"
                                                    v-model="
                                                        form.password_confirmation
                                                    "
                                                    required
                                                    autocomplete="new-password"
                                                />
                                            </div>

                                            <div
                                                class="mt-2"
                                                v-if="
                                                    $page.props.jetstream
                                                        .hasTermsAndPrivacyPolicyFeature
                                                "
                                            >
                                                <jet-label for="terms">
                                                    <div
                                                        class="flex items-center"
                                                    >
                                                        <jet-checkbox
                                                            name="terms"
                                                            id="terms"
                                                            v-model="form.terms"
                                                        />

                                                        <div class="ml-2">
                                                            I agree to the
                                                            <a
                                                                target="_blank"
                                                                :href="
                                                                    route(
                                                                        'terms.show'
                                                                    )
                                                                "
                                                                class="underline text-sm text-gray-600 hover:text-gray-900"
                                                                >Terms of
                                                                Service</a
                                                            >
                                                            and
                                                            <a
                                                                target="_blank"
                                                                :href="
                                                                    route(
                                                                        'policy.show'
                                                                    )
                                                                "
                                                                class="underline text-sm text-gray-600 hover:text-gray-900"
                                                                >Privacy
                                                                Policy</a
                                                            >
                                                        </div>
                                                    </div>
                                                </jet-label>
                                            </div>

                                            <div
                                                class="flex items-center justify-end mt-4"
                                            >
                                                <jet-button
                                                    class="ml-4 w-full"
                                                    style="border-radius: 20px"
                                                    :class="{
                                                        'opacity-25':
                                                            form.processing,
                                                    }"
                                                    :disabled="form.processing"
                                                >
                                                    Register
                                                </jet-button>
                                            </div>
                                        </form>
                                    </jet-authentication-card>
                                    <div class="row mt-2">
                                        <div class="col-12 text-center">
                                            <inertia-link
                                                :href="route('login')"
                                                class="underline text-sm text-gray-600 hover:text-gray-900"
                                            >
                                                Already registered?
                                            </inertia-link>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div
                                        id="carouselExampleCaption"
                                        class="carousel slide"
                                        data-bs-ride="carousel"
                                    >
                                        <div
                                            class="carousel-inner"
                                            role="listbox"
                                        >
                                            <div class="carousel-item active">
                                                <img
                                                    src="site/img/bg-img/church_1.jpg"
                                                    alt="..."
                                                    class="d-block img-fluid"
                                                />
                                                <div
                                                    class="carousel-caption d-none d-md-block"
                                                ></div>
                                            </div>
                                            <div class="carousel-item">
                                                <img
                                                    src="site/img/bg-img/church_2.jpg"
                                                    alt="..."
                                                    class="d-block img-fluid"
                                                />
                                                <div
                                                    class="carousel-caption d-none d-md-block"
                                                ></div>
                                            </div>
                                            <div class="carousel-item">
                                                <img
                                                    src="site/img/bg-img/church_2.jpg"
                                                    alt="..."
                                                    class="d-block img-fluid"
                                                />
                                                <div
                                                    class="carousel-caption d-none d-md-block"
                                                ></div>
                                            </div>
                                        </div>
                                        <a
                                            class="carousel-control-prev"
                                            href="#carouselExampleCaption"
                                            role="button"
                                            data-bs-slide="prev"
                                        >
                                            <span
                                                class="carousel-control-prev-icon"
                                                aria-hidden="true"
                                            ></span>
                                            <span class="visually-hidden"
                                                >Previous</span
                                            >
                                        </a>
                                        <a
                                            class="carousel-control-next"
                                            href="#carouselExampleCaption"
                                            role="button"
                                            data-bs-slide="next"
                                        >
                                            <span
                                                class="carousel-control-next-icon"
                                                aria-hidden="true"
                                            ></span>
                                            <span class="visually-hidden"
                                                >Next</span
                                            >
                                        </a>
                                    </div>
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
        </div>
        <!-- end page -->
        <!-- <footer class="footer footer-alt text-dark-50">
            <script>
                document.write(new Date().getFullYear())
            </script> &copy; | <a href="" class="text-dark-50">Ifakara catholic diocese</a>
        </footer> -->
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

    data() {
        return {
            form: this.$inertia.form({
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
                terms: false,
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("register"), {
                onFinish: () =>
                    this.form.reset("password", "password_confirmation"),
            });
        },
    },
};
</script>
