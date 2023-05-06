<template>
    <div class="h-screen bg-white">
        <div class="mt-1">
            <!-- Internal auditor -->
            <div
                v-if="$page.props.role == 'internal_auditor'"
                class="max-w-2xl mx-auto"
            >
                <div id="sidebar-menu">
                    <ul id="side-menu">
                        <li class="menu-title">Navigation</li>
    
                        <li>
                            <my-custom-link
                                :href="route('internal_auditor.dashboard')"
                                :active="
                                    route().current('internal_auditor.dashboard')
                                "
                            >
                                <v-icon>mdi-view-dashboard</v-icon>
                                <span> Dashboard </span>
                            </my-custom-link>
                        </li>
    
                        <li class="menu-title mt-2">Apps</li>
    
                        <li>
                            <my-custom-link
                                :href="route('internal_auditor.audits')"
                                :active="
                                    route().current('internal_auditor.audits')
                                "
                            >
                                <v-icon>mdi-google-analytics</v-icon>
                                <span> Audits </span>
                            </my-custom-link>
                        </li>
    
                        <!-- <li>
                            <my-custom-link
                                :href="route('internal_auditor.staffs')"
                                :active="route().current('internal_auditor.staffs')"
                            >
                                <v-icon>mdi-account-group</v-icon>
                                <span> Staff </span>
                            </my-custom-link>
                        </li> -->
    
                        <!-- <li>
                            <my-custom-link
                                :href="route('accountant.invoice_create')"
                                :active="
                                    route().current('accountant.invoice_create')
                                "
                            >
                                <v-icon size="20">mdi-pencil</v-icon>
                                <span class="mx-1"> Parish </span>
                            </my-custom-link>
                        </li> -->
    
                        <!-- <li>
                            <my-custom-link
                                :href="route('accountant.invoice_incoming')"
                                :active="
                                    route().current('accountant.invoice_incoming')
                                "
                            >
                                <v-icon size="20">mdi-inbox-arrow-down</v-icon>
                                <span class="mx-1"> Health Institute </span>
                            </my-custom-link>
                        </li> -->
    
                        <li>
                            <my-custom-link
                                :href="route('internal_auditor.reports')"
                                :active="
                                    route().current('internal_auditor.reports')
                                "
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
                                <v-icon
                                    :class="[
                                        route().current('accountant.dashboard')
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    >mdi-view-dashboard</v-icon
                                >
                                <span> Dashboard </span>
                            </my-custom-link>
                        </li>
    
                        <li class="menu-title mt-2">Apps</li>
    
                        <li>
                            <my-custom-link
                                :href="route('accountant.invoices')"
                                :active="route().current('accountant.invoices')"
                            >
                                <v-icon
                                    size="20"
                                    :class="[
                                        route().current('accountant.invoices')
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    >mdi-cash-multiple</v-icon
                                >
                                <span class="mx-1"> Invoices </span>
                            </my-custom-link>
                        </li>
    
                        <li>
                            <my-custom-link
                                :href="route('accountant.invoice_school')"
                                :active="
                                    route().current('accountant.invoice_school')
                                "
                            >
                                <v-icon
                                    size="20"
                                    :class="[
                                        route().current('accountant.invoice_school')
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    >mdi-school</v-icon
                                >
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
                                <v-icon
                                    size="20"
                                    :class="[
                                        route().current('accountant.invoice_create')
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    >mdi-pencil</v-icon
                                >
                                <span class="mx-1"> Parish </span>
                            </my-custom-link>
                        </li>
    
                        <li>
                            <my-custom-link
                                :href="route('accountant.invoice_incoming')"
                                :active="
                                    route().current('accountant.invoice_incoming')
                                "
                            >
                                <v-icon
                                    size="20"
                                    :class="[
                                        route().current(
                                            'accountant.invoice_incoming'
                                        )
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    >mdi-inbox-arrow-down</v-icon
                                >
                                <span class="mx-1"> Health Institute </span>
                            </my-custom-link>
                        </li>
    
                        <!-- <li>
                            <my-custom-link
                                :href="route('accountant.invoice_pending')"
                                :active="
                                    route().current('accountant.invoice_pending')
                                "
                            >
                                <v-icon size="20">mdi-account-clock</v-icon>
                                <span class="mx-1"> Pending </span>
                            </my-custom-link>
                        </li> -->
    
                        <li>
                            <my-custom-link
                                :href="route('accountant.invoice_reports')"
                                :active="
                                    route().current('accountant.invoice_reports')
                                "
                            >
                                <v-icon
                                    size="20"
                                    :class="[
                                        route().current(
                                            'accountant.invoice_reports'
                                        )
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    >mdi-poll</v-icon
                                >
                                <span class="mx-1"> Reports </span>
                            </my-custom-link>
                        </li>
    
                        <li>
                            <my-custom-link
                                :href="route('accountant.charts_of_accounts')"
                                :active="
                                    route().current('accountant.charts_of_accounts')
                                "
                            >
                                <v-icon
                                    size="23"
                                    :class="[
                                        route().current(
                                            'accountant.charts_of_accounts'
                                        )
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    >mdi-finance</v-icon
                                >
                                <span> Charts Of Accounts </span>
                            </my-custom-link>
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
                                    <!-- <li>
                                        <my-custom-link
                                            :href="route('secretary.schools')"
                                            :active="
                                                route().current('secretary.schools')
                                            "
                                        >
                                            <v-icon size="20">mdi-school</v-icon>
                                            <span> Schools </span>
                                        </my-custom-link>
                                    </li> -->
    
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
    
                        <li class="flex items-center">
                            <my-custom-link
                                :href="route('secretary.schools')"
                                :active="route().current('secretary.schools')"
                                class="flex items-center"
                            >
                                <v-icon size="20">mdi-school</v-icon>
                                <span>Schools</span>
                            </my-custom-link>
                            <span class="me-4">
                                <i
                                    v-if="permissionCount > 0"
                                    class="mdi mdi-bell inline-block animate-shake shake text-red-500 font-17 align-middle me-2 pb-1"
                                    >{{ permissionCount }}</i
                                >
                            </span>
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
                                            <v-icon size="20"
                                                >mdi-file-document</v-icon
                                            >
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
    
                                    <li>
                                        <my-custom-link
                                            :href="route('bishop.schools')"
                                            :active="
                                                route().current('bishop.schools')
                                            "
                                        >
                                            <v-icon size="20">mdi-school</v-icon>
                                            <span> Diocese </span>
                                        </my-custom-link>
                                    </li>
    
                                    <li>
                                        <my-custom-link
                                            :href="route('bishop.schools')"
                                            :active="
                                                route().current('bishop.schools')
                                            "
                                        >
                                            <v-icon size="20">mdi-school</v-icon>
                                            <span> Health Institute </span>
                                        </my-custom-link>
                                    </li>
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
    
                                    <li>
                                        <my-custom-link
                                            :href="route('bishop.schools')"
                                            :active="
                                                route().current('bishop.schools')
                                            "
                                        >
                                            <v-icon size="20">mdi-school</v-icon>
                                            <span> Diocese </span>
                                        </my-custom-link>
                                    </li>
    
                                    <li>
                                        <my-custom-link
                                            :href="route('bishop.schools')"
                                            :active="
                                                route().current('bishop.schools')
                                            "
                                        >
                                            <v-icon size="20">mdi-school</v-icon>
                                            <span> Health Institute </span>
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
                                <span> Internal Auditor </span>
                            </my-custom-link>
                        </li>
    
                        <li>
                            <my-custom-link
                                :href="route('bishop.internal_office')"
                                :active="route().current('bishop.internal_office')"
                            >
                                <v-icon size="22">mdi-account-tie</v-icon>
                                <span> Procurement </span>
                            </my-custom-link>
                        </li>
                    </ul>
                </div>
            </div>
    
            <!-- Procurement -->
            <div v-if="$page.props.role == 'procurement'" class="max-w-2xl mx-auto">
                <div id="sidebar-menu">
                    <ul id="side-menu">
                        <li class="menu-title">Navigation</li>
    
                        <li>
                            <my-custom-link
                                :href="route('procurement.dashboard')"
                                :active="route().current('procurement.dashboard')"
                            >
                                <v-icon>mdi-view-dashboard</v-icon>
                                <span> Dashboard </span>
                            </my-custom-link>
                        </li>
    
                        <li class="menu-title mt-2">Apps</li>
    
                        <li>
                            <my-custom-link
                                :href="route('procurement.tools')"
                                :active="route().current('procurement.tools')"
                            >
                                <v-icon size="20">mdi-tools</v-icon>
                                <span> Tools & Items </span>
                            </my-custom-link>
                        </li>
    
                        <li>
                            <my-custom-link
                                :href="route('procurement.invoice')"
                                :active="route().current('procurement.invoice')"
                            >
                            <v-icon size="22">mdi-cash-multiple</v-icon>
                                <span> Invoices </span>
                            </my-custom-link>
                        </li>
    
                        <li>
                            <my-custom-link
                                :href="route('procurement.uploads')"
                                :active="route().current('procurement.uploads')"
                            >
                                <v-icon size="22">mdi-upload</v-icon>
                                <span> Uploads </span>
                            </my-custom-link>
                        </li>
    
                        <li>
                            <my-custom-link
                                :href="route('procurement.reports')"
                                :active="route().current('procurement.reports')"
                            >
                                <v-icon size="22">mdi-poll</v-icon>
                                <span> Reports </span>
                            </my-custom-link>
                        </li>
                    </ul>
                </div>
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

        this.getSchoolPermissionsNotifications();

        // Receiving broadicasting
        window.Echo.channel("academic-trigger-student-permission").listen(
            "Api\\Secretary\\Student\\PermissionEvent",
            (e) => {
                this.getSchoolPermissionsNotifications();
            }
        );
    },

    data() {
        return {
            routes: [],
            permissionCount: 0,
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

        getSchoolPermissionsNotifications() {
            axios
                .get(
                    "http://127.0.0.1:8000/api/secretary/getSchoolPermissionsNotifications"
                )
                .then((response) => {
                    this.permissionCount = response.data.data;
                    // console.log(response.data.data);
                });
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

<style scoped>
.slide-enter-active {
    animation: slide-in 200ms ease-out forwards;
}
.slide-leave-active {
    animation: slide-out 200ms ease-out forwards;
}

@keyframes slide-in {
    from {
        transform: translateY(-30px);
        opacity: 0;
    }

    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slide-out {
    from {
        transform: translateY(0);
        opacity: 1;
    }

    to {
        transform: translateY(-30);
        opacity: 0;
    }
}

@keyframes shake {
    0% {
        transform: translateX(0);
    }
    25% {
        transform: translateX(-4px) rotate(-5deg);
    }
    50% {
        transform: translateX(4px) rotate(5deg);
    }
    75% {
        transform: translateX(-4px) rotate(-5deg);
    }
    100% {
        transform: translateX(0);
    }
}

.shake {
    animation: shake 0.5s infinite;
}
</style>
