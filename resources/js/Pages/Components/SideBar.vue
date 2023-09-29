<template>
    <div class="h-screen bg-white mr-1">
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
                                    route().current(
                                        'internal_auditor.dashboard'
                                    )
                                "
                            >
                                <v-icon>mdi-view-dashboard</v-icon>
                                <span class="text-xs font-semibold uppercase"> Dashboard </span>
                            </my-custom-link>
                        </li>

                        <li class="menu-title my-1">Apps</li>

                        <li>
                            <my-custom-link
                                :href="route('internal_auditor.audits')"
                                :active="
                                    route().current('internal_auditor.audits')
                                "
                            >
                                <v-icon>mdi-google-analytics</v-icon>
                                <span class="text-xs font-semibold uppercase"> Audits</span>
                            </my-custom-link>

                            <div class="ml-5 pl-5" v-show="route().current('internal_auditor.audits')">
                                <div>
                                    <a
                                        href="#"
                                        class="border-0 pt-0 text-xs font-semibold uppercase"
                                        @click="setTab('allSchools')"
                                        :class="[
                                            getCurrentTab == 'allSchools' && route().current('internal_auditor.audits')
                                                ? 'text-warning'
                                                : 'text-gray-600',
                                        ]"
                                        ><i
                                            class="mdi mdi-school font-18 align-middle me-2 pb-1"
                                        ></i
                                        >schools</a
                                    >

                                    <a
                                        v-show="getSchoolView"
                                        @click="setSchoolView"
                                        href="#"
                                        class="border-0 pt-0 text-xs font-semibold uppercase ml-6 pl-3 text-gray-600"
                                    >
                                        Back
                                    </a>
                                </div>

                                <div v-show="getSchoolView" class="ml-3 pl-3">
                                    <div>
                                        <a
                                            href="#"
                                            class="border-0 py-1 uppercase text-xs"
                                            @click="
                                                setSchoolDetailTab('allStaffs')
                                            "
                                            :class="[
                                                getCurrentSchoolDetailTab ==
                                                'allStaffs' && getCurrentTab == 'allSchools' 
                                                    ? 'text-warning'
                                                    : 'text-gray-600',
                                            ]"
                                            ><i
                                                class="mdi mdi-account-group font-15 align-middle me-2"
                                            ></i
                                            >Staffs</a
                                        >
                                    </div>

                                    <div>
                                        <a
                                            href="#"
                                            class="border-0 py-1 uppercase text-xs"
                                            @click="
                                                setSchoolDetailTab(
                                                    'allStudents'
                                                )
                                            "
                                            :class="[
                                                getCurrentSchoolDetailTab ==
                                                'allStudents' && getCurrentTab == 'allSchools'
                                                    ? 'text-warning'
                                                    : 'text-gray-600',
                                            ]"
                                            ><i
                                                class="mdi mdi-school font-15 align-middle me-2 pb-1"
                                            ></i
                                            >Students
                                        </a>
                                    </div>

                                    <div>
                                        <a
                                            href="#"
                                            class="border-0 py-1 uppercase text-xs"
                                            @click="setSchoolDetailTab('tools')"
                                            :class="[
                                                getCurrentSchoolDetailTab ==
                                                'tools' && getCurrentTab == 'allSchools'
                                                    ? 'text-warning'
                                                    : 'text-gray-600',
                                            ]"
                                            ><i
                                                class="mdi mdi-tools font-15 align-middle me-2 pb-1"
                                            ></i
                                            >Tool Details
                                        </a>
                                    </div>

                                    <div>
                                        <a
                                            href="#"
                                            class="border-0 py-1 uppercase text-xs"
                                            @click="
                                                setSchoolDetailTab('invoices')
                                            "
                                            :class="[
                                                getCurrentSchoolDetailTab ==
                                                'invoices' && getCurrentTab == 'allSchools'
                                                    ? 'text-warning'
                                                    : 'text-gray-600',
                                            ]"
                                            ><i
                                                class="mdi mdi-cash-multiple font-15 align-middle me-2 pb-1"
                                            ></i
                                            >Invoice Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-3 pl-3" v-show="route().current('internal_auditor.audits')">

                                <div>
                                    <a
                                        href="#"
                                        class="list-group-item border-0 pt-1 text-xs font-semibold uppercase"
                                        @click="
                                            setTab('diocese');
                                            setTab('diocese-invoices');
                                        "
                                        :class="[
                                            getCurrentTab == 'diocese' ||
                                            getCurrentTab == 'diocese-invoices' && route().current('internal_auditor.audits')
                                                ? 'text-warning'
                                                : 'text-gray-600',
                                        ]"
                                        ><i
                                            class="mdi mdi-church font-18 align-middle me-2 pb-1"
                                        ></i
                                        >Diocese
                                    </a>
                                </div>
                                <div>
                                    <a
                                        href="#"
                                        class="list-group-item border-0 pt-0 text-xs font-semibold uppercase"
                                        @click="setTab('permissions')"
                                        :class="[
                                            getCurrentTab == 'permissions' && route().current('internal_auditor.audits')
                                                ? 'text-warning'
                                                : 'text-gray-600',
                                        ]"
                                        ><i
                                            class="mdi mdi-hospital-box font-18 align-middle me-2 pb-1"
                                        ></i
                                        >Health Institutes</a
                                    >
                                </div>
                            </div>
                            
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
                                <span class="text-xs font-semibold uppercase"> Reports </span>
                            </my-custom-link>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Accountant -->
            <div
                v-if="$page.props.role == 'accountant'"
                class="max-w-2xl mx-auto"
            >
                <div id="sidebar-menu">
                    <ul id="side-menu">
                        <li class="menu-title">Navigation</li>

                        <li>
                            <my-custom-link
                                :href="route('accountant.dashboard')"
                                :active="
                                    route().current('accountant.dashboard')
                                "
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
                                        route().current(
                                            'accountant.invoice_school'
                                        )
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    >mdi-school</v-icon
                                >
                                <span class="mx-1"> Schools </span>
                            </my-custom-link>
                        </li>

                        <!-- <li>
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
                        </li> -->

                        <li>
                            <my-custom-link
                                :href="route('accountant.invoice_incoming')"
                                :active="
                                    route().current(
                                        'accountant.invoice_incoming'
                                    )
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
                                    route().current(
                                        'accountant.invoice_reports'
                                    )
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
                                    route().current(
                                        'accountant.charts_of_accounts'
                                    )
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
            <div
                v-if="$page.props.role == 'secretary'"
                class="max-w-2xl mx-auto"
            >
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

                        <!-- <li>
                            <my-custom-link
                                :href="route('secretary.uploads')"
                                :active="route().current('secretary.uploads')"
                            >
                                <v-icon>mdi-file-document</v-icon>
                                <span> Documents </span>
                            </my-custom-link>
                        </li> -->

                        <li class="flex items-center">
                            <my-custom-link
                                :href="route('secretary.schools')"
                                :active="route().current('secretary.schools')"
                                class="flex items-center"
                            >
                                <v-icon size="20">mdi-school</v-icon>
                                <span>My Office</span>
                            </my-custom-link>
                            <span class="me-4">
                                <i
                                    v-if="permissionCount > 0"
                                    class="mdi mdi-bell inline-block animate-shake shake text-red-500 font-15 align-middle me-2 pb-1"
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

                        <li class="border-0 pt-0 uppercase text-gray-600">
                            <my-custom-link
                                :href="route('bishop.dashboard')"
                                :active="route().current('bishop.dashboard')"
                            >
                                <v-icon size="18">mdi-view-dashboard</v-icon>
                                <span class="text-sm"> Dashboard </span>
                            </my-custom-link>
                        </li>

                        <li class="menu-title mt-2">Apps</li>

                        <li @click="setTabFromBishopApproved" class="border-0 pt-0 uppercase text-gray-600">
                            <my-custom-link :href="route('bishop.approves')"
                                :active="
                                    route().current('bishop.approves')
                                ">
                                <v-icon size="22">mdi-account-tie</v-icon>
                                <span class="text-sm"> Approves </span>
                            </my-custom-link>
                        </li>

                        <li class="border-0 pt-0 uppercase text-gray-600">
                            <my-custom-link
                                :href="route('bishop.internal_auditor')"
                                :active="
                                    route().current('bishop.internal_auditor')
                                "
                            >
                                <v-icon size="22">mdi-account-tie</v-icon>
                                <span class="text-sm"> Internal Auditor </span>
                            </my-custom-link>

                            <div class="ml-5 pl-5" v-show="route().current('bishop.internal_auditor')">
                                <div>
                                    <a
                                        href="#"
                                        class="border-0 pt-0 text-xs font-semibold uppercase"
                                        @click="setTab('allSchools')"
                                        :class="[
                                            getCurrentTab == 'allSchools' && route().current('bishop.internal_auditor')
                                                ? 'text-warning'
                                                : 'text-gray-600',
                                        ]"
                                        ><i
                                            class="mdi mdi-school font-18 align-middle me-2 pb-1"
                                        ></i
                                        >schools</a
                                    >

                                    <a
                                        v-show="getSchoolView"
                                        @click="setSchoolView"
                                        href="#"
                                        class="border-0 pt-0 text-xs font-semibold uppercase ml-6 pl-3 text-gray-600"
                                    >
                                        Back
                                    </a>
                                </div>

                                <div v-show="getSchoolView" class="ml-3 pl-3">
                                    <div class="my-1">
                                        <a
                                            href="#"
                                            class="border-0 my-2 uppercase font-semibold text-xs"
                                            @click="
                                                setSchoolDetailTab('allStaffs')
                                            "
                                            :class="[
                                                getCurrentSchoolDetailTab ==
                                                'allStaffs' && getCurrentTab == 'allSchools' 
                                                    ? 'text-warning'
                                                    : 'text-gray-600',
                                            ]"
                                            ><i
                                                class="mdi mdi-account-group font-18 align-middle me-2"
                                            ></i
                                            >Staffs</a
                                        >
                                    </div>

                                    <div>
                                        <a
                                            href="#"
                                            class="border-0 my-2 uppercase font-semibold text-xs"
                                            @click="
                                                setSchoolDetailTab(
                                                    'allStudents'
                                                )
                                            "
                                            :class="[
                                                getCurrentSchoolDetailTab ==
                                                'allStudents' && getCurrentTab == 'allSchools'
                                                    ? 'text-warning'
                                                    : 'text-gray-600',
                                            ]"
                                            ><i
                                                class="mdi mdi-school font-18 align-middle me-2 pb-1"
                                            ></i
                                            >Students
                                        </a>
                                    </div>

                                    <div class="my-1">
                                        <a
                                            href="#"
                                            class="border-0 uppercase font-semibold text-xs"
                                            @click="setSchoolDetailTab('tools')"
                                            :class="[
                                                getCurrentSchoolDetailTab ==
                                                'tools' && getCurrentTab == 'allSchools'
                                                    ? 'text-warning'
                                                    : 'text-gray-600',
                                            ]"
                                            ><i
                                                class="mdi mdi-tools font-18 align-middle me-2 pb-1"
                                            ></i
                                            >Tool Details
                                        </a>
                                    </div>

                                    <div>
                                        <a
                                            href="#"
                                            class="border-0 py-1 uppercase font-semibold text-xs"
                                            @click="
                                                setSchoolDetailTab('invoices')
                                            "
                                            :class="[
                                                getCurrentSchoolDetailTab ==
                                                'invoices' && getCurrentTab == 'allSchools'
                                                    ? 'text-warning'
                                                    : 'text-gray-600',
                                            ]"
                                            ><i
                                                class="mdi mdi-cash-multiple font-18 align-middle me-2 pb-1"
                                            ></i
                                            >Invoice Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-3 pl-3" v-show="route().current('bishop.internal_auditor')">

                                <div class="my-1">
                                    <a
                                        href="#"
                                        class="list-group-item border-0 pt-1 text-xs font-semibold uppercase"
                                        @click="
                                            setTab('diocese');
                                            setTab('diocese-invoices');
                                        "
                                        :class="[
                                            getCurrentTab == 'diocese' ||
                                            getCurrentTab == 'diocese-invoices' && route().current('bishop.internal_auditor')
                                                ? 'text-warning'
                                                : 'text-gray-600',
                                        ]"
                                        ><i
                                            class="mdi mdi-church font-18 align-middle me-2 pb-1"
                                        ></i
                                        >Diocese
                                    </a>
                                </div>
                                <div>
                                    <a
                                        href="#"
                                        class="list-group-item border-0 pt-0 text-xs font-semibold uppercase"
                                        @click="setTab('permissions')"
                                        :class="[
                                            getCurrentTab == 'permissions' && route().current('bishop.internal_auditor')
                                                ? 'text-warning'
                                                : 'text-gray-600',
                                        ]"
                                        ><i
                                            class="mdi mdi-hospital-box font-18 align-middle me-2 pb-1"
                                        ></i
                                        >Health Institutes</a
                                    >
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Procurement -->
            <div
                v-if="$page.props.role == 'procurement'"
                class="max-w-2xl mx-auto"
            >
                <div id="sidebar-menu">
                    <ul id="side-menu">
                        <li class="menu-title">Navigation</li>

                        <li>
                            <my-custom-link
                                :href="route('procurement.dashboard')"
                                :active="
                                    route().current('procurement.dashboard')
                                "
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

        setTab(tab) {
            this.getPaymentView ? this.setInvoiceView() : null;
            this.$store.dispatch("InternalAuditorSchoolModule/setTab", tab);
        },

        setTabFromBishopApproved() {
            if(this.getCurrentTab != 'invoices' || this.getCurrentTab != 'home'){
                this.$store.dispatch("AccountantInvoiceModule/setTab", 'invoices');
            }
            return
        },
        
        setSchoolView() {
            this.$store.dispatch(
                "InternalAuditorSchoolModule/setSchoolView",
                null
            );
        },

        setInvoiceView() {
            this.$store.dispatch(
                "AccountantInvoiceModule/setPaymentView",
                null
            );
        },

        setSchoolDetailTab(tab) {
            this.getPaymentView ? this.setInvoiceView() : null;
            this.getCurrentTab == 'allSchools' ? null : this.setTab('allSchools')
            this.$store.dispatch(
                "InternalAuditorSchoolDetailsModule/setTab",
                tab
            );
        },

        getSchoolPermissionsNotifications() {
            axios
                .get(
                    this.getMainUrl +
                        "secretary/getSchoolPermissionsNotifications"
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

    computed: {
        getMainUrl() {
            return this.$store.getters["SystemConfigurationsModule/getMainUrl"];
        },

        getCurrentTab() {
            return this.$store.getters["InternalAuditorSchoolModule/getTab"];
        },

        getCurrentTabForBishopApproved() {
            return this.$store.getters["AccountantInvoiceModule/getTab"];
        },

        getSchoolView() {
            return this.$store.getters[
                "InternalAuditorSchoolModule/getSchoolView"
            ];
        },

        getCurrentSchoolDetailTab() {
            return this.$store.getters[
                "InternalAuditorSchoolDetailsModule/getTab"
            ];
        },

        getSchoolView() {
            return this.$store.getters[
                "InternalAuditorSchoolModule/getSchoolView"
            ];
        },

        getPaymentView() {
            return this.$store.getters[
                "AccountantInvoiceModule/getPaymentView"
            ];
        },
    },
};
</script>
