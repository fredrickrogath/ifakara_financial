<template>
    <div>
        <!-- Head Office -->
        <div v-if="$page.props.role == 'head'" class="max-w-2xl mx-auto"></div>

        <!-- Academic -->
        <div
            v-if="$page.props.role == 'academic'"
            class="max-w-2xl mx-auto"
        ></div>

        <!-- Procurement -->
        <div
            v-if="$page.props.role == 'procurement'"
            class="max-w-2xl mx-auto"
        ></div>

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

                    <!-- <li>
        <a href="apps-calendar.html">
            <i data-feather="calendar"></i>
            <span> Calendar </span>
        </a>
    </li>

    <li>
        <a href="apps-chat.html">
            <i data-feather="message-square"></i>
            <span> Chat </span>
        </a>
    </li> -->

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
                                :active="route().current('bishop.documents')"
                            >
                            <i data-feather="activity"></i>
                            <span> Documents </span>
                            </my-custom-link>
                                   
                                </li>
                                <li>
                                    <my-custom-link
                                :href="route('bishop.uploads')"
                                :active="route().current('bishop.uploads')"
                            >
                            <i data-feather="activity"></i>
                            <span> Uploads </span>
                            </my-custom-link>
                                </li>
                                <li>
                                    <my-custom-link
                                :href="route('bishop.invoices')"
                                :active="route().current('bishop.invoices')"
                            >
                            <i data-feather="activity"></i>
                            <span> Invoices </span>
                            </my-custom-link>
                                </li>
                                <li>
                                
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                            <i data-feather="shopping-cart"></i>
                            <span> Account </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEcommerce">
                            <ul class="nav-second-level">
                                <li>
                                    <my-custom-link
                                :href="route('bishop.schools')"
                                :active="route().current('bishop.schools')"
                            >
                            <i data-feather="activity"></i>
                            <span> School </span>
                            </my-custom-link>
                                   
                                </li>
                                <li>
                                
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- <li>
                        <div class="collapse" id="sidebarCrm">
                            <ul class="nav-second-level">
                                <li>
                                    <my-custom-link
                                :href="route('bishop.account')"
                                :active="route().current('bishop.account')"
                            >
                            <i data-feather="activity"></i>
                            <span> Account </span>
                            </my-custom-link>
                                </li>
                            </ul>
                        </div>
                    </li> -->

                    <li>
                            <my-custom-link
                                :href="route('bishop.internal_office')"
                                :active="route().current('bishop.internal_office')"
                            >
                            <i data-feather="activity"></i>
                            <span> Internal Office </span>
                            </my-custom-link>
                    </li>

                    <!-- <li>
        <a href="apps-social-feed.html">
            <span class="badge bg-pink float-end">Hot</span>
            <i data-feather="rss"></i>
            <span> Social Feed </span>
        </a>
    </li> -->

                    <!-- <li>
                            <my-custom-link
                                :href="route('bishop.uploads')"
                                :active="route().current('bishop.uploads')"
                            >
                            <i data-feather="activity"></i>
                            <span> Uploads </span>
                            </my-custom-link>
                    </li>

                    <li>
                            <my-custom-link
                                :href="route('bishop.reports')"
                                :active="route().current('bishop.reports')"
                            >
                            <i data-feather="activity"></i>
                            <span> Reports </span>
                            </my-custom-link>
                    </li> -->
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
