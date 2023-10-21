<template>
    <div data-app>
        <!-- Right modal content -->
        <div class="row bg-gray-100">
            <!-- Right Sidebar -->
            <div class="col-12">
                <div class="h-screen card -mt-7">
                    <!-- <hr class="bg-gray-200 pt-0 mt-0" /> -->
                    <div>
                        <div class="mail-list">
                            <div
                                class="list-group-item border-0 d-flex justify-content-between align-items-center"
                            >
                                <button
                                    v-show="getSchoolView"
                                    @click="setSchoolView"
                                    class="btn btn-secondary text-white btn-sm waves-effect waves-light ml-0 pl-0 mt-3"
                                >
                                    Back
                                </button>

                                <!-- <div class="ml-3 font-15 text-gray-600">
                                    My Office
                                </div> -->
                            </div>

                            <hr class="bg-gray-200 my-0 py-0" />

                            <div v-if="getSchoolView" class="d-flex align-items-center">
                                <a
                                    href="#"
                                    class="list-group-item border-0"
                                    @click="setSchoolDetailTab('allStaffs')"
                                    :class="[
                                        getCurrentSchoolDetailTab == 'allStaffs'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-school font-19 align-middle me-2"
                                    ></i
                                    >All Staffs</a
                                >

                                <a
                                    href="#"
                                    class="list-group-item border-0"
                                    @click="setSchoolDetailTab('allStudents')"
                                    :class="[
                                        getCurrentSchoolDetailTab ==
                                        'allStudents'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-school font-19 align-middle me-2 pb-1"
                                    ></i
                                    >All Students
                                </a>

                                <a
                                    href="#"
                                    class="list-group-item border-0"
                                    @click="setSchoolDetailTab('allInvoices')"
                                    :class="[
                                        getCurrentSchoolDetailTab ==
                                        'allInvoices'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-school font-19 align-middle me-2 pb-1"
                                    ></i
                                    >School Invoices
                                </a>

                                <a
                                    href="#"
                                    class="list-group-item border-0"
                                    @click="setSchoolDetailTab('allReport')"
                                    :class="[
                                        getCurrentSchoolDetailTab == 'allReport'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-school font-19 align-middle me-2 pb-1"
                                    ></i
                                    >School Report
                                </a>
                            </div>

                            <div v-if="!getSchoolView" class="d-flex">
                                <a
                                    href="#"
                                    class="list-group-item border-0 pt-1"
                                    @click="setTab('allStaffs')"
                                    :class="[
                                        getCurrentTab == 'allStaffs'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-school font-19 align-middle me-2 pb-1"
                                    ></i
                                    >Finance Staffs
                                </a>

                                <a
                                    href="#"
                                    class="list-group-item border-0 pt-1"
                                    @click="setTab('portalstaffs')"
                                    :class="[
                                        getCurrentTab == 'portalstaffs'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-school font-19 align-middle me-2 pb-1"
                                    ></i
                                    >Portal Staffs
                                </a>

                                <a
                                    href="#"
                                    class="list-group-item border-0 pt-1"
                                    @click="setTab('portalapplicants')"
                                    :class="[
                                        getCurrentTab == 'portalapplicants'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-school font-19 align-middle me-2 pb-1"
                                    ></i
                                    >Portal Applicants
                                </a>

                                <a
                                    href="#"
                                    class="list-group-item border-0 pt-1"
                                    @click="setTab('portalposts')"
                                    :class="[
                                        getCurrentTab == 'portalposts'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-school font-19 align-middle me-2 pb-1"
                                    ></i
                                    >Portal Posts
                                </a>
                                <a
                                    href="#"
                                    class="list-group-item border-0 pt-1"
                                    @click="setTab('allSchools')"
                                    :class="[
                                        getCurrentTab == 'allSchools'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-school font-19 align-middle me-2 pb-1"
                                    ></i
                                    >All schools</a
                                >

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
                                        class="mdi mdi-lock font-19 align-middle me-2 pb-1"
                                    ></i
                                    >Permissions
                                    <i
                                        v-if="permissionCount > 0"
                                        class="mdi mdi-bell inline-block animate-shake shake text-red-500 font-15 align-middle me-2 pb-1 px-2"
                                    >
                                        {{ permissionCount }}
                                    </i></a
                                >

                                <a
                                    href="#"
                                    class="list-group-item border-0 pt-1"
                                    @click="setTab('invoices')"
                                    :class="[
                                        getCurrentTab == 'invoices'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-school font-19 align-middle me-2 pb-1"
                                    ></i
                                    >Invoices
                                </a>
                            </div>

                            <hr class="bg-gray-200 mb-1 mt-0 mx-2" />
                        </div>
                        
                    </div>
                    <div class="">
                        <div class="px-0">
                            <div class="h-screen">
                                <!-- <h5 class="mb-3">Recent</h5> -->
                                <!-- <transition-group name="slide" mode="in-out"> -->
                                <div
                                    v-if="
                                        getAddStudent &&
                                        !getApplicantView &&
                                        !getSchoolView &&
                                        !getInvoiceView
                                    "
                                    key="1"
                                >
                                    <add-staff></add-staff>
                                </div>

                                <div
                                    v-if="
                                        getApplicantView &&
                                        !getSchoolView &&
                                        !getAddStudent &&
                                        !getInvoiceView
                                    "
                                >
                                    <view-portal-applicant></view-portal-applicant>
                                </div>

                                <div
                                    v-if="
                                        getSchoolView &&
                                        !getApplicantView &&
                                        !getAddStudent &&
                                        !getInvoiceView
                                    "
                                >
                                    <open-school></open-school>
                                </div>

                                <div v-if="getInvoiceView && !getAddStudent &&
                                        !getSchoolView &&
                                        !getApplicantView">
                                    <view-invoice></view-invoice>
                                </div>
                                <div
                                    v-if="
                                        !getAddStudent &&
                                        !getSchoolView &&
                                        !getApplicantView &&
                                        !getInvoiceView
                                    "
                                    key="2"
                                >
                                    <all-invoices-vue
                                        v-if="
                                            getCurrentTab == 'invoices' &&
                                            !getAddSchool
                                        "
                                    ></all-invoices-vue>
                                    <all-schools
                                        v-if="
                                            getCurrentTab == 'allSchools' &&
                                            !getAddSchool
                                        "
                                    ></all-schools>
                                    <add-school
                                        v-if="
                                            getCurrentTab == 'allSchools' &&
                                            getAddSchool
                                        "
                                    ></add-school>
                                    <all-staffs
                                        v-if="getCurrentTab == 'allStaffs'"
                                    ></all-staffs>
                                    <portal-applicants
                                        v-if="
                                            getCurrentTab == 'portalapplicants'
                                        "
                                    ></portal-applicants>
                                    <portal-posts
                                        v-if="getCurrentTab == 'portalposts'"
                                    ></portal-posts>
                                    <all-students
                                        v-if="getCurrentTab == 'allStudents'"
                                    ></all-students>
                                    <permissions
                                        v-if="
                                            getCurrentTab == 'permissions' &&
                                            !getCommentView
                                        "
                                    ></permissions>
                                    <Comments
                                        v-if="
                                            getCommentView &&
                                            getCurrentTab == 'permissions'
                                        "
                                    ></Comments>
                                    <portal-staffs
                                        v-if="
                                            !getCommentView &&
                                            getCurrentTab == 'portalstaffs'
                                        "
                                    ></portal-staffs>
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
import JetApplicationMark from "@/Jetstream/ApplicationMark";
import AllStaffs from "./SchoolComponents/AllStaffs.vue";
import NewStaffs from "./SchoolComponents/NewStaffs.vue";
import AddStaff from "./SchoolComponents/AddStaff.vue";
import ViewStaff from "./SchoolComponents/ViewStaff.vue";
import AllStudents from "./SchoolComponents/AllStudents.vue";
import AllSchools from "./SchoolComponents/School/AllSchools.vue";
import OpenSchool from "./SchoolComponents/School/OpenSchool.vue";
import AddSchool from "./SchoolComponents/School/AllSchools/AddSchool.vue";
import Permissions from "./SchoolComponents/School/School/Permissions.vue";
import PortalStaffs from "./SchoolComponents/PortalStaff.vue";
import Comments from "./SchoolComponents/Comments.vue";
import PortalApplicants from "./SchoolComponents/PortalApplicants.vue";
import PortalPosts from "./SchoolComponents/PortalPosts.vue";
import ViewPortalApplicant from "./SchoolComponents/View/PortalApplicant.vue";
import Select2 from "v-select2-component";
import AllInvoicesVue from "../AccountantMainModule/Invoices/Requisitions.vue";
import ViewInvoice from "./../AccountantMainModule/InvoicesSchool/ViewInvoice.vue";

export default {
    components: {
        JetApplicationMark,
        AllStaffs,
        NewStaffs,
        AddStaff,
        ViewStaff,
        AllStudents,
        AllSchools,
        OpenSchool,
        AddSchool,
        Permissions,
        Comments,
        ViewInvoice,
        AllInvoicesVue,
        PortalStaffs,
        PortalPosts,
        PortalApplicants,
        ViewPortalApplicant,

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
            return this.$store.getters["SecratarySchoolModule/getTab"];
        },

        getCurrentSchoolDetailTab() {
            return this.$store.getters["SecretarySchoolDetailModule/getTab"];
        },

        getSchoolView() {
            return this.$store.getters["SecratarySchoolModule/getSchoolView"];
        },

        legerEntriesListener() {
            return this.legerEntries !== null ? this.legerEntries.data : null;
        },

        setLegerEntryListener() {
            return this.selectedLegerEntry;
        },

        getAddStudent() {
            return this.$store.getters["SecratarySchoolModule/getAddStudent"];
        },

        getAddSchool() {
            return this.$store.getters[
                "SecretarySchoolDetailModule/getAddSchool"
            ];
        },

        getCommentView() {
            return this.$store.getters["SecratarySchoolModule/getCommentView"];
        },

        getPostView() {
            return this.$store.getters["SecretaryPortalModule/getPostView"];
        },

        getPostView() {
            return this.$store.getters["SecretaryPortalModule/getApplicant"];
        },

        getApplicantView() {
            return this.$store.getters[
                "SecretaryPortalModule/getApplicantView"
            ];
        },

        getInvoiceView() {
            return this.$store.getters[
                "AccountantInvoiceModule/getInvoiceView"
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
            this.$store.dispatch("SecratarySchoolModule/setTab", tab);
        },

        setSchoolDetailTab(tab) {
            this.$store.dispatch("SecretarySchoolDetailModule/setTab", tab);
        },

        setAddStudent() {
            this.$store.dispatch("SecratarySchoolModule/setAddStudent");
        },

        setSchoolView() {
            this.$store.dispatch("SecratarySchoolModule/setSchoolView", null);
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

<!-- <style scoped>
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
</style> -->
