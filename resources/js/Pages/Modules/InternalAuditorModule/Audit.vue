<template>
    <div data-app>
        <div class="row bg-white">
            <!-- Right Sidebar -->
            <div class="col-12">
                <div class="h-screen">
                    <div class="mt-2">
                        <!-- Left sidebar -->
                        <div class="inbox-leftbar bg-white h-screen">
                            <!-- <div class="btn-group dropend d-block mb-2 mx-2">
                                <button
                                    type="button"
                                    class="bg-gray-200 py-1 w-100 waves-effect waves-light dropdown-toggle"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    Select Entry Type
                                </button>

                                <div class="dropdown-menu">
                                    <a
                                        class="dropdown-item"
                                        href="#"
                                        @click="
                                            (dialog = true),
                                                (dialogForm = 'Sales')
                                        "
                                    >
                                        <v-icon size="18" class="me-1"
                                            >mdi-cart</v-icon
                                        >
                                        Sales</a
                                    >
                                    <a
                                        class="dropdown-item"
                                        href="#"
                                        @click="
                                            getSpecificLegerEntries();
                                            setLegerEntry(
                                                'Income Entry Selected'
                                            );
                                        "
                                        ><v-icon size="16" class="me-1"
                                            >mdi-cash-multiple</v-icon
                                        >
                                        Income</a
                                    >
                                    <a
                                        class="dropdown-item"
                                        href="#"
                                        @click="
                                            (dialog = true),
                                                (dialogForm = 'Loans')
                                        "
                                    >
                                        <v-icon size="18" class="me-1"
                                            >mdi-scale-balance</v-icon
                                        >
                                        Loans</a
                                    >
                                </div>
                            </div> -->

                            <!-- <div class="btn-group d-block mb-0 mx-2">
                                <button
                                    type="button"
                                    class="bg-gray-200 py-1 w-100 waves-effect waves-light dropdown-toggle"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    {{ setLegerEntryListener }}
                                </button>

                                <div class="dropdown-menu">
                                    <a
                                        v-for="item in legerEntriesListener"
                                        :key="item.id"
                                        class="dropdown-item"
                                        href="#"
                                        @click="
                                            (dialog = true),
                                                (dialogForm = item.name)
                                        "
                                        ><i class="mdi mdi-cart me-1"></i>
                                        {{ item.name }}</a
                                    >
                                    <a
                                        v-if="legerEntriesListener == null"
                                        class="dropdown-item"
                                        href="#"
                                    >
                                        Please Select Entry</a
                                    >
                                     <a
                                        class="dropdown-item"
                                        href="#"
                                        @click="
                                            (dialog = true),
                                                (dialogForm = 'Loans')
                                        "
                                    >
                                        <v-icon size="14" class="me-1"
                                            >mdi-scale-balance</v-icon
                                        >
                                        Loans</a
                                    >
                                </div>
                            </div> -->

                            <!-- <hr class="bg-gray-100 mb-1" /> -->

                            <!-- <div class="mail-list">
                                <span class="text-center pl-3 mx-auto"
                                    >From Leger Entry</span
                                >

                                <a
                                    @click="setTab('entries')"
                                    href="#"
                                    class="list-group-item border-0 mt-1"
                                    :class="[
                                        getCurrentTab == 'entries'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-form-select font-18 align-middle me-2 pb-1"
                                    ></i
                                    >All Entries
                                </a>
                            </div>

                            <hr class="bg-gray-100 mb-1 mt-0" /> -->

                            <div class="mail-list">
                                <!-- <div
                                    class="d-flex justify-content-between align-items-center"
                                >
                                    <div class="ml-3 font-15">My Office</div>

                                    <v-icon
                                    v-if="!getAddStudent"
                                        class="ml-4 px-1 mt-1 mr-0 py-1"
                                        size="22"
                                        @click="setAddStudent()"
                                    >
                                        mdi-pen-plus
                                    </v-icon>

                                    <v-icon
                                    v-else
                                        class="ml-4 px-1 mt-1 mr-0 py-1"
                                        size="22"
                                        @click="setAddStudent()"
                                    >
                                        mdi-check
                                    </v-icon>
                                </div> -->

                                <div
                                    class="list-group-item border-0 d-flex justify-content-between align-items-center"
                                >
                                    <button
                                        v-show="getSchoolView"
                                        @click="setSchoolView"
                                        class="btn btn-secondary text-white btn-sm waves-effect waves-light ml-0 pl-0"
                                    >
                                        Back
                                    </button>

                                    <div class="ml-3 font-15 text-gray-600">
                                        My Office
                                    </div>
                                </div>

                                <hr class="bg-gray-200 mb-1 mt-0 mx-2" />

                                <div v-show="getSchoolView">
                                    <a
                                        href="#"
                                        class="list-group-item border-0"
                                        @click="setSchoolDetailTab('allStaffs')"
                                        :class="[
                                            getCurrentSchoolDetailTab ==
                                            'allStaffs'
                                                ? 'text-warning'
                                                : '',
                                        ]"
                                        ><i
                                            class="mdi mdi-account-group font-20 align-middle me-2"
                                        ></i
                                        >Staffs</a
                                    >

                                    <a
                                        href="#"
                                        class="list-group-item border-0"
                                        @click="
                                            setSchoolDetailTab('allStudents')
                                        "
                                        :class="[
                                            getCurrentSchoolDetailTab ==
                                            'allStudents'
                                                ? 'text-warning'
                                                : '',
                                        ]"
                                        ><i
                                            class="mdi mdi-school font-20 align-middle me-2 pb-1"
                                        ></i
                                        >Students
                                    </a>

                                    <a
                                        href="#"
                                        class="list-group-item border-0"
                                        @click="setSchoolDetailTab('tools')"
                                        :class="[
                                            getCurrentSchoolDetailTab == 'tools'
                                                ? 'text-warning'
                                                : '',
                                        ]"
                                        ><i
                                            class="mdi mdi-tools font-20 align-middle me-2 pb-1"
                                        ></i
                                        >Tool Details
                                    </a>

                                    <a
                                        href="#"
                                        class="list-group-item border-0"
                                        @click="setSchoolDetailTab('invoices')"
                                        :class="[
                                            getCurrentSchoolDetailTab ==
                                            'invoices'
                                                ? 'text-warning'
                                                : '',
                                        ]"
                                        ><i
                                            class="mdi mdi-cash-multiple font-20 align-middle me-2 pb-1"
                                        ></i
                                        >Invoice Details
                                    </a>
                                </div>

                                <div v-show="!getSchoolView">
                                    <a
                                        href="#"
                                        class="list-group-item border-0 pt-0"
                                        @click="setTab('allSchools')"
                                        :class="[
                                            getCurrentTab == 'allSchools'
                                                ? 'text-warning'
                                                : '',
                                        ]"
                                        ><i
                                            class="mdi mdi-school font-20 align-middle me-2 pb-1"
                                        ></i
                                        >schools</a
                                    >

                                    <a
                                        href="#"
                                        class="list-group-item border-0 pt-1"
                                        @click="
                                            setTab('diocese');
                                            setTab('diocese-invoices');
                                        "
                                        :class="[
                                            getCurrentTab == 'diocese' ||
                                            getCurrentTab == 'diocese-invoices'
                                                ? 'text-warning'
                                                : '',
                                        ]"
                                        ><i
                                            class="mdi mdi-church font-20 align-middle me-2 pb-1"
                                        ></i
                                        >Diocese
                                    </a>

                                    <a
                                        href="#"
                                        class="list-group-item border-0 pt-1"
                                        @click="setTab('permissions')"
                                        :class="[
                                            getCurrentTab == 'permissions'
                                                ? 'text-warning'
                                                : '',
                                        ]"
                                        ><i
                                            class="mdi mdi-hospital-box font-20 align-middle me-2 pb-1"
                                        ></i
                                        >Health Institutes</a
                                    >
                                </div>
                            </div>

                            <hr class="bg-gray-200 mx-1 mb-1 mt-2" />

                            <div
                                v-show="
                                    getCurrentTab == 'diocese' ||
                                    getCurrentTab == 'diocese-invoices'
                                "
                            >
                                <a
                                    href="#"
                                    class="list-group-item border-0 pt-1"
                                    @click="setTab('diocese-invoices')"
                                    :class="[
                                        getCurrentTab == 'diocese-invoices' ||
                                        getCurrentTab == 'diocese'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-form-select font-18 pb-1 align-middle me-1"
                                    ></i
                                    >Invoices
                                </a>
                            </div>

                            <!-- <div class="mt-2 ml-3">
                                <h5>
                                    <span
                                        class="badge rounded-pill p-1 px-2 badge-soft-secondary"
                                        >PAYMENTS</span
                                    >
                                </h5>
                                <h6 class="text-uppercase mt-3">
                                    School fee payments
                                </h6>
                                <div class="progress my-2 progress-sm">
                                    <div
                                        class="progress-bar progress-lg bg-danger"
                                        role="progressbar"
                                        style="width: 46%"
                                        aria-valuenow="46"
                                        aria-valuemin="0"
                                        aria-valuemax="100"
                                    ></div>
                                </div>
                                <p class="text-muted font-12 mb-0">
                                    7 (25%) of 350
                                </p>
                            </div> -->
                        </div>
                        <!-- End Left sidebar -->

                        <div class="inbox-rightbar pt-0 px-0">
                            <div class="h-screen">
                                <!-- <h5 class="mb-3">Recent</h5> -->
                                <!-- <transition-group name="slide" mode="in-out"> -->
                                <div
                                    v-show="getAddStudent && !getSchoolView"
                                    key="1"
                                >
                                    <add-staff></add-staff>
                                </div>

                                <div v-show="getSchoolView && !getAddStudent">
                                    <open-school></open-school>
                                </div>
                                <div
                                    v-show="!getAddStudent && !getSchoolView"
                                    key="2"
                                >
                                    <all-invoices
                                        v-show="
                                            getCurrentTab ==
                                                'diocese-invoices' &&
                                            !getAddSchool
                                        "
                                    ></all-invoices>

                                    <all-schools
                                        v-show="
                                            getCurrentTab == 'allSchools' &&
                                            !getAddSchool
                                        "
                                    ></all-schools>
                                    <add-school
                                        v-show="
                                            getCurrentTab == 'allSchools' &&
                                            getAddSchool
                                        "
                                    ></add-school>
                                    <all-staffs
                                        v-show="getCurrentTab == 'allStaffs'"
                                    ></all-staffs>
                                    <all-students
                                        v-show="getCurrentTab == 'allStudents'"
                                    ></all-students>
                                    <permissions
                                        v-show="
                                            getCurrentTab == 'permissions' &&
                                            !getCommentView
                                        "
                                    ></permissions>
                                    <Comments
                                        v-show="
                                            getCommentView &&
                                            getCurrentTab == 'permissions'
                                        "
                                    ></Comments>
                                </div>
                                <!-- <requisitions
                                    v-if="getCurrentTab == 'home'"
                                ></requisitions>
                                <accepted-requisitions
                                    v-if="getCurrentTab == 'accepted'"
                                ></accepted-requisitions>
                                <deleted-requisitions
                                    v-if="getCurrentTab == 'deleted'"
                                ></deleted-requisitions>
                                <starred-requisitions
                                    v-if="getCurrentTab == 'starred'"
                                ></starred-requisitions>
                                <rejected-requisitions
                                    v-if="getCurrentTab == 'rejected'"
                                ></rejected-requisitions> -->
                                <!-- </transition-group> -->
                            </div>
                            <!-- end .mt-3-->
                        </div>
                        <!-- end inbox-rightbar-->

                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end Col -->
        </div>
        <!-- End row -->
    </div>
</template>

<script>
// import JetApplicationMark from "@/Jetstream/ApplicationMark";

import AllStaffs from "./SchoolComponents/AllStaffs.vue";
import NewStaffs from "./SchoolComponents/NewStaffs.vue";
import AddStaff from "./SchoolComponents/AddStaff.vue";
import ViewStaff from "./SchoolComponents/ViewStaff.vue";
import AllStudents from "./SchoolComponents/AllStudents.vue";

import AllSchools from "./SchoolComponents/School/AllSchools.vue";
// import AllSchoolStudents from "./SchoolComponents/School/AllStudents.vue";
// import AllSchoolStaffs from "./SchoolComponents/School/AllStaffs.vue";
import OpenSchool from "./SchoolComponents/School/OpenSchool.vue";
import AddSchool from "./SchoolComponents/School/AllSchools/AddSchool.vue";
import Permissions from "./SchoolComponents/School/School/Permissions.vue";
import Comments from "./SchoolComponents/Comments.vue";

// import Entries from "./Invoices/Entries.vue";

import AllInvoices from "./AllInvoices.vue";
import Select2 from "v-select2-component";

export default {
    components: {
        // JetApplicationMark,

        AllStaffs,
        NewStaffs,
        AddStaff,
        ViewStaff,
        AllStudents,

        AllSchools,
        // AllSchoolStudents,
        // AllSchoolStaffs,
        OpenSchool,
        AddSchool,
        Permissions,
        Comments,
        // Entries,

        AllInvoices,

        Select2,
    },

    mounted() {
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
            echo: null,
            dialogm1: "",
            dialog: false,
            dialogForm: "",
            legerEntries: null,
            legerEntries1: null,
            selectedLegerEntry: "Nothing Selected",
            student: null,
            students: null,

            name: "",
            price: "",
            count: "",
            permissionCount: 0,
            narration: "",

            myValue: "",
            myOptions: ["op1", "op2", "op3"],

            InvoiceGenerate: false,
        };
    },
    computed: {
        //Add computed properties
        pageTitle() {
            return document.title || "No Title";
        },

        getCurrentTab() {
            return this.$store.getters["InternalAuditorSchoolModule/getTab"];
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

        legerEntriesListener() {
            return this.legerEntries !== null ? this.legerEntries.data : null;
        },

        setLegerEntryListener() {
            return this.selectedLegerEntry;
        },

        getAddStudent() {
            return this.$store.getters[
                "InternalAuditorSchoolModule/getAddStudent"
            ];
        },

        getAddSchool() {
            return this.$store.getters[
                "InternalAuditorSchoolDetailsModule/getAddSchool"
            ];
        },

        getCommentView() {
            return this.$store.getters[
                "InternalAuditorSchoolModule/getCommentView"
            ];
        },

        getMainUrl() {
            return this.$store.getters["SystemConfigurationsModule/getMainUrl"];
        },
    },
    watch: {
        //Add watchers...
        // student() {
        //     this.getStudents();
        // },
    },
    methods: {
        //Add methods...
        // async submitForm() {
        //     axios
        //         .post("/procurement/add_tool", {
        //             name: this.name,
        //             price: this.price,
        //             count: this.count,
        //             narration: this.narration,
        //         })
        //         .then((response) => {
        //             // this.students = response.data.data;
        //             // this.submitFormToMain();
        //             this.name = "";
        //             this.price = "";
        //             this.count = "";
        //             this.narration = "";
        //             // console.log(response.data);
        //         });
        //     // handle response here
        // },
        setTab(tab) {
            this.$store.dispatch("InternalAuditorSchoolModule/setTab", tab);
        },

        setSchoolDetailTab(tab) {
            this.$store.dispatch(
                "InternalAuditorSchoolDetailsModule/setTab",
                tab
            );
        },

        setAddStudent() {
            this.$store.dispatch("InternalAuditorSchoolModule/setAddStudent");
        },

        setSchoolView() {
            this.$store.dispatch(
                "InternalAuditorSchoolModule/setSchoolView",
                null
            );
        },

        // getSpecificLegerEntries() {
        //     // console.log("Loading next page");
        //     axios
        //         .get("/accountant/getSpecificLegerEntries")
        //         .then((response) => {
        //             this.legerEntries = response.data;
        //             // console.log(response.data)
        //         });
        // },

        // setLegerEntry(entry) {
        //     this.selectedLegerEntry = entry;
        // },

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

        // async submitForm() {
        //     axios
        //         .post("/accountant/submitTuitionFee", {
        //             amount: this.amount,
        //             narration: this.narration,
        //         })
        //         .then((response) => {
        //             // this.students = response.data.data;
        //             this.submitFormToMain();
        //             this.amount = "";
        //             this.narration = "";
        //             console.log(response.data);
        //         });
        //     // handle response here
        // },

        // async submitFormToMain() {
        //     axios
        //         .post("http://127.0.0.1:8001/api/accountant/getLegerEntries", {
        //             amount: this.amount,
        //             narration: this.narration,
        //         })
        //         .then((response) => {
        //             // this.students = response.data.data;
        //             // this.amount = "";
        //             // this.narration = "";
        //             console.log(response.data.data);
        //         });
        //     // handle response here
        // },

        // myChangeEvent(val) {
        //     console.log(val);
        // },
        // mySelectEvent({ id, text }) {
        //     console.log({ id, text });
        // },
    },
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
