<template>
    <div>
        <!-- Head Office -->
        <div v-if="$page.props.role == 'head'" class="max-w-2xl mx-auto"></div>

        <!-- Academic -->
        <div
            v-if="$page.props.role == 'academic'"
            class="max-w-2xl mx-auto"
        ></div>

        <!-- Secretary -->
        <div v-if="$page.props.role == 'secretary'" class="max-w-2xl mx-auto">
            <div id="sidebar-menu">
                <ul id="side-menu">
                    <li class="menu-title">Navigation</li>

                    <li>
                        <my-custom-link
                            :href="route('secretary.dashboard')"
                            :active="route().current('secretary.dashboard')"
                        >
                            <i data-feather="activity"></i>
                            <span> Dashboard </span>
                        </my-custom-link>
                    </li>

                    <li class="menu-title mt-2">Apps</li>

                    <li>
                        <a href="#sidebarCrm" data-bs-toggle="collapse">
                            <i data-feather="users"></i>
                            <span> Documents </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarCrm">
                            <ul class="nav-second-level">
                                <li>
                                    <my-custom-link
                                        :href="route('secretary.schools')"
                                        :active="
                                            route().current('secretary.schools')
                                        "
                                    >
                                        <i data-feather="activity"></i>
                                        <span> Schools </span>
                                    </my-custom-link>
                                </li>

                                <li>
                                    <my-custom-link
                                        :href="route('secretary.uploads')"
                                        :active="
                                            route().current('secretary.uploads')
                                        "
                                    >
                                        <i data-feather="activity"></i>
                                        <span> Uploads </span>
                                    </my-custom-link>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                            <i data-feather="shopping-cart"></i>
                            <span> Invoices </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEcommerce">
                            <ul class="nav-second-level">
                                <li>
                                    <my-custom-link
                                        :href="route('secretary.invoice_school')"
                                        :active="
                                            route().current('secretary.invoice_school')
                                        "
                                    >
                                        <i data-feather="activity"></i>
                                        <span> School </span>
                                    </my-custom-link>
                                </li>
                                <li></li>

                                <li>
                                    <my-custom-link
                                        :href="route('secretary.invoice_create')"
                                        :active="
                                            route().current('secretary.invoice_create')
                                        "
                                    >
                                        <i data-feather="activity"></i>
                                        <span> Create </span>
                                    </my-custom-link>
                                </li>

                                <li>
                                    <my-custom-link
                                        :href="route('secretary.invoice_incoming')"
                                        :active="
                                            route().current('secretary.invoice_incoming')
                                        "
                                    >
                                        <i data-feather="activity"></i>
                                        <span> Incoming </span>
                                    </my-custom-link>
                                </li>

                                <li>
                                    <my-custom-link
                                        :href="route('secretary.invoice_pending')"
                                        :active="
                                            route().current('secretary.invoice_pending')
                                        "
                                    >
                                        <i data-feather="activity"></i>
                                        <span> Pending </span>
                                    </my-custom-link>
                                </li>

                                <li>
                                    <my-custom-link
                                        :href="route('secretary.invoice_reports')"
                                        :active="
                                            route().current('secretary.invoice_reports')
                                        "
                                    >
                                        <i data-feather="activity"></i>
                                        <span> Reports </span>
                                    </my-custom-link>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <my-custom-link
                            :href="route('secretary.reports')"
                            :active="route().current('secretary.reports')"
                        >
                            <i data-feather="activity"></i>
                            <span> Reports </span>
                        </my-custom-link>
                    </li>

                    <li>
                        <my-custom-link
                            :href="route('secretary.account_office')"
                            :active="route().current('secretary.account_office')"
                        >
                            <i data-feather="activity"></i>
                            <span> Account Office </span>
                        </my-custom-link>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Accountant -->
        <div v-if="$page.props.role == 'bishop'" class="max-w-2xl mx-auto">
            <div id="sidebar-menu">
                <ul id="side-menu">
                    <li class="menu-title">Navigation</li>

                    <li>
                        <my-custom-link
                            :href="route('bishop.dashboard')"
                            :active="route().current('bishop.dashboard')"
                        >
                            <i data-feather="activity"></i>
                            <span> Dashboard </span>
                        </my-custom-link>
                    </li>

                    <li class="menu-title mt-2">Apps</li>

                    <li>
                        <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                            <i data-feather="shopping-cart"></i>
                            <span> Secretary </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEcommerce">
                            <ul class="nav-second-level">
                                <li>
                                    <my-custom-link
                                        :href="route('bishop.documents')"
                                        :active="
                                            route().current('bishop.documents')
                                        "
                                    >
                                        <i data-feather="activity"></i>
                                        <span> Documents </span>
                                    </my-custom-link>
                                </li>
                                <li>
                                    <my-custom-link
                                        :href="route('bishop.uploads')"
                                        :active="
                                            route().current('bishop.uploads')
                                        "
                                    >
                                        <i data-feather="activity"></i>
                                        <span> Uploads </span>
                                    </my-custom-link>
                                </li>
                                <li>
                                    <my-custom-link
                                        :href="route('bishop.invoices')"
                                        :active="
                                            route().current('bishop.invoices')
                                        "
                                    >
                                        <i data-feather="activity"></i>
                                        <span> Invoices </span>
                                    </my-custom-link>
                                </li>
                                <li></li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarCrm" data-bs-toggle="collapse">
                            <i data-feather="users"></i>
                            <span> Account </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarCrm">
                            <ul class="nav-second-level">
                                <li>
                                    <my-custom-link
                                        :href="route('bishop.schools')"
                                        :active="
                                            route().current('bishop.schools')
                                        "
                                    >
                                        <i data-feather="activity"></i>
                                        <span> Schools </span>
                                    </my-custom-link>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <my-custom-link
                            :href="route('bishop.internal_office')"
                            :active="route().current('bishop.internal_office')"
                        >
                            <i data-feather="activity"></i>
                            <span> Internal Office </span>
                        </my-custom-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import MyCustomLink from "@/Jetstream/MyCustomLink";
// import PieChart3D from "../Components/Charts/GoogleCharts/PieChart3D.vue";

export default {
    components: {
        MyCustomLink,
        // PieChart3D,
    },

    mounted() {
        this.initializeRoutes();
    },

    data() {
        return {
            routes: [],

            isDropdownOpen: false,
        };
    },

    methods: {
        initializeRoutes() {
            this.$store.getters["getRoutes"].forEach((route) => {
                this.routes.push(route);
            });
            // this.$page.props.routes.forEach((route) => {
            //     this.routes.push(route);
            // });
            // console.log(this.routes);
        },

        // select: function (path) {
        //     if (path.extension !== "") {
        //         window.location.href = path.url + path.extension;
        //     }
        //     window.location.href = path.url;
        // },
    },

    computed: {},
};
</script>
