<template>
    <div>
        <!-- Internal auditor -->
        <div v-if="$page.props.role == 'internal_auditor'" class="max-w-2xl mx-auto">
            <div id="sidebar-menu">
                <ul id="side-menu">
                    <li class="menu-title">Navigation</li>

                    <li>
                        <my-custom-link
                            :href="route('internal_auditor.dashboard')"
                            :active="route().current('internal_auditor.dashboard')"
                        >
                            <v-icon>mdi-view-dashboard</v-icon>
                            <span> Dashboard </span>
                        </my-custom-link>
                    </li>

                    <li class="menu-title mt-2">Apps</li>

                    <li>
                        <my-custom-link
                            :href="route('internal_auditor.schools')"
                            :active="route().current('internal_auditor.schools')"
                        >
                           <v-icon>mdi-school</v-icon>
                            <span> Schools </span>
                        </my-custom-link>
                    </li>

                    <li>
                        <my-custom-link
                            :href="route('internal_auditor.staffs')"
                            :active="route().current('internal_auditor.staffs')"
                        >
                        <v-icon>mdi-account-group</v-icon>
                            <span> Staff </span>
                        </my-custom-link>
                    </li>

                    <li>
                        <my-custom-link
                            :href="route('internal_auditor.reports')"
                            :active="route().current('internal_auditor.reports')"
                        >
                        <v-icon>mdi-poll</v-icon>
                            <span> Reports </span>
                        </my-custom-link>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Accountant -->
        <div v-if="$page.props.role == 'accountant'" class="max-w-2xl mx-auto">
            <div id="sidebar-menu">
                <ul id="side-menu">
                    <li class="menu-title">Navigation</li>

                    <li>
                        <my-custom-link
                            :href="route('accountant.dashboard')"
                            :active="route().current('accountant.dashboard')"
                        >
                        <v-icon>mdi-view-dashboard</v-icon>
                            <span> Dashboard </span>
                        </my-custom-link>
                    </li>

                    <li class="menu-title mt-2">Apps</li>

                    <li>
                        <a href="#sidebarCrm" data-bs-toggle="collapse">
                            <v-icon size="20">mdi-cash</v-icon>
                            <span> Invoices </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarCrm">
                            <ul class="nav-second-level">
                                <li>
                                    <my-custom-link
                                        :href="route('accountant.invoice_school')"
                                        :active="
                                            route().current('accountant.invoice_school')
                                        "
                                    >
                                    <v-icon size="20">mdi-school</v-icon>
                                        <span class="mx-1"> Schools </span>
                                    </my-custom-link>
                                </li>

                                <li>
                                    <my-custom-link
                                        :href="route('accountant.invoice_create')"
                                        :active="
                                            route().current('accountant.invoice_create')
                                        "
                                    >
                                        <v-icon size="20">mdi-pencil</v-icon>
                                        <span class="mx-1"> Create </span>
                                    </my-custom-link>
                                </li>

                                <li>
                                    <my-custom-link
                                        :href="route('accountant.invoice_incoming')"
                                        :active="
                                            route().current('accountant.invoice_incoming')
                                        "
                                    >
                                        <v-icon size="20">mdi-inbox-arrow-down</v-icon>
                                        <span class="mx-1"> Incoming </span>
                                    </my-custom-link>
                                </li>

                                <li>
                                    <my-custom-link
                                        :href="route('accountant.invoice_pending')"
                                        :active="
                                            route().current('accountant.invoice_pending')
                                        "
                                    >
                                        <v-icon size="20">mdi-account-clock</v-icon>
                                        <span class="mx-1"> Pending </span>
                                    </my-custom-link>
                                </li>

                                <li>
                                    <my-custom-link
                                        :href="route('accountant.invoice_reports')"
                                        :active="
                                            route().current('accountant.invoice_reports')
                                        "
                                    >
                                    <v-icon size="20">mdi-poll</v-icon>
                                        <span class="mx-1"> Reports </span>
                                    </my-custom-link>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

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
                        <v-icon>mdi-view-dashboard</v-icon>
                            <span> Dashboard </span>
                        </my-custom-link>
                    </li>

                    <li class="menu-title mt-2">Apps</li>

                    <li>
                        <a href="#sidebarCrm" data-bs-toggle="collapse">
                            <v-icon>mdi-file-document</v-icon>
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
                                    <v-icon size="20">mdi-school</v-icon>
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
                                    <v-icon size="20">mdi-upload</v-icon>
                                        <span> Uploads </span>
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
                        <v-icon>mdi-poll</v-icon>
                            <span> Reports </span>
                        </my-custom-link>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bishop -->
        <div v-if="$page.props.role == 'bishop'" class="max-w-2xl mx-auto">
            <div id="sidebar-menu">
                <ul id="side-menu">
                    <li class="menu-title">Navigation</li>

                    <li>
                        <my-custom-link
                            :href="route('bishop.dashboard')"
                            :active="route().current('bishop.dashboard')"
                        >
                        <v-icon>mdi-view-dashboard</v-icon>
                            <span> Dashboard </span>
                        </my-custom-link>
                    </li>

                    <li class="menu-title mt-2">Apps</li>

                    <li>
                        <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                            <v-icon size="22">mdi-account-tie</v-icon>
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
                                    <v-icon size="20">mdi-file-document</v-icon>
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
                                    <v-icon size="20">mdi-upload</v-icon>
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
                                    <v-icon size="20">mdi-cash</v-icon>
                                        <span> Invoices </span>
                                    </my-custom-link>
                                </li>
                                <li></li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarCrm" data-bs-toggle="collapse">
                            <v-icon>mdi-account-box</v-icon>
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
                                    <v-icon size="20">mdi-school</v-icon>
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
                        <v-icon size="22">mdi-account-tie</v-icon>
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
