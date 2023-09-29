<template>
    <div data-app>
        <div class="row bg-gray-100">
            <!-- Right Sidebar -->
            <div class="col-12">
                <div class="h-screen">
                    <div class="card">

                        <div class="d-flex justify-content-end mail-list mt-0">
                            <div class="d-flex justifi-content-between">
                                <a
                                    v-show="getPaymentView"
                                    @click="setInvoiceView()"
                                    class="btn text-lg-700"
                                >
                                    <strong
                                        class="text-warning"
                                        style="font-size: large"
                                        ><i class="fe-arrow-left"></i>
                                    </strong>
                                </a>

                                <a
                                    @click="setTab('payments')"
                                    href="#"
                                    class="list-group-item border-0"
                                    :class="[
                                        getCurrentTab == 'payments'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                >
                                    <i
                                        class="mdi mdi-form-select font-17 pb-1 align-middle me-1"
                                    ></i
                                    ><span
                                        class="text-xs uppercase font-semibold"
                                        >Student Payments</span
                                    >
                                </a>

                                <span class="list-group-item border-0 h-100">
                                    |
                                </span>

                                <a
                                    @click="setTab('invoices')"
                                    href="#"
                                    class="list-group-item border-0"
                                    :class="[
                                        getCurrentTab == 'invoices'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                >
                                    <i
                                        class="mdi mdi-form-select font-17 pb-1 align-middle me-1"
                                    ></i
                                    ><span
                                        class="text-xs uppercase font-semibold"
                                        >Invoices</span
                                    >
                                </a>

                                <a
                                    @click="setTab('invoicesDeleted')"
                                    href="#"
                                    class="list-group-item border-0"
                                    :class="[
                                        getCurrentTab == 'invoicesDeleted'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                >
                                    <i
                                        class="mdi mdi-form-select font-17 pb-1 align-middle me-1"
                                    ></i
                                    ><span
                                        class="text-xs uppercase font-semibold"
                                        >Deleted</span
                                    >
                                </a>

                                <span class="list-group-item border-0 h-100">
                                    |
                                </span>
                                <a
                                    @click="setTab('entries')"
                                    href="#"
                                    class="list-group-item border-0"
                                    :class="[
                                        getCurrentTab == 'entries'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                >
                                    <i
                                        class="mdi mdi-form-select font-17 pb-1 align-middle me-1"
                                    ></i
                                    ><span
                                        class="text-xs uppercase font-semibold"
                                        >Entries</span
                                    >
                                </a>

                                <span class="list-group-item border-0 h-100">
                                    |
                                </span>
                                <a
                                    @click="setTab('home')"
                                    href="#"
                                    class="list-group-item border-0"
                                    :class="[
                                        getCurrentTab == 'home'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                >
                                    <i
                                        class="mdi mdi-form-select font-17 pb-1 align-middle me-1"
                                    ></i
                                    ><span
                                        class="text-xs uppercase font-semibold"
                                        >All 876869896</span
                                    >
                                </a>
                                <a
                                    @click="setTab('accepted')"
                                    href="#"
                                    class="list-group-item border-0 pt-2"
                                    :class="[
                                        getCurrentTab == 'accepted'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                >
                                    <!-- <i
                            class="mdi mdi-check-bold font-18 pb-1 align-middle me-1"
                        ></i
                        > -->
                                    <span
                                        class="text-xs uppercase font-semibold"
                                        >Accepted</span
                                    >
                                </a>
                                <a
                                    @click="setTab('rejected')"
                                    href="#"
                                    class="list-group-item border-0 pt-2"
                                    :class="[
                                        getCurrentTab == 'rejected'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                >
                                    <!-- <i
                            class="mdi mdi-alert-circle font-18 pb-1 align-middle me-2"
                        ></i
                        > -->
                                    <span
                                        class="text-xs uppercase font-semibold"
                                        >Rejected</span
                                    >
                                </a>
                                <a
                                    @click="setTab('starred')"
                                    href="#"
                                    class="list-group-item border-0 pt-2"
                                    :class="[
                                        getCurrentTab == 'starred'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                >
                                    <!-- <i
                            class="mdi mdi-star font-18 pb-1 align-middle me-2"
                        ></i
                        > -->
                                    <span
                                        class="text-xs uppercase font-semibold"
                                        >Starred</span
                                    >
                                </a>
                                <a
                                    @click="setTab('deleted')"
                                    href="#"
                                    class="list-group-item border-0 pt-2"
                                    :class="[
                                        getCurrentTab == 'deleted'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                >
                                    <span
                                        class="text-xs uppercase font-semibold"
                                        >Deleted</span
                                    >
                                </a>
                            </div>
                        </div>

                        <hr class="py-0 my-0" />

                        <div class="h-screen p-0">
                            <div class="">
                                <!-- <h5 class="mb-3">Recent</h5> -->
                                <!-- <transition name="fade"> -->
                                <div v-if="getInvoiceView">
                                    <view-invoice></view-invoice>
                                </div>

                                <div v-if="!getInvoiceView">
                                    <entries
                                        v-if="getCurrentTab == 'entries'"
                                    ></entries>
                                    <payment-details
                                        v-if="getCurrentTab == 'payments'"
                                    ></payment-details>
                                    <invoice-creation
                                        v-if="getCurrentTab == 'invoices'"
                                    ></invoice-creation>
                                    <invoice-creation-deleted
                                        v-if="
                                            getCurrentTab == 'invoicesDeleted'
                                        "
                                    ></invoice-creation-deleted>
                                    <requisitions
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
                                    ></rejected-requisitions>
                                    <report
                                        v-if="getCurrentTab == 'report'"
                                    ></report>
                                </div>
                                <!-- </transition> -->
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
import Requisitions from "./Requisitions.vue";
import AcceptedRequisitions from "./AcceptedRequisitions.vue";
import DeletedRequisitions from "./DeletedRequisitions.vue";
import StarredRequisitions from "./StarredRequisitions.vue";
import RejectedRequisitions from "./RejectedRequisitions.vue";
import ViewInvoice from "./ViewInvoice.vue";
import InvoiceCreation from "./InvoiceCreation/InvoiceCreation.vue";
import InvoiceCreationView from "./InvoiceCreation/InvoiceCreationView.vue";
import InvoiceCreationDeleted from "./InvoiceCreation/InvoiceCreationDeleted.vue";

import PaymentDetails from "./PaymentDetails.vue";

import Entries from "./Entries.vue";

import Report from "../../SecretaryModule/SchoolComponents/School/Report.vue";

// import Select2 from "v-select2-component";

export default {
    components: {
        Requisitions,
        AcceptedRequisitions,
        DeletedRequisitions,
        StarredRequisitions,
        RejectedRequisitions,
        ViewInvoice,
        InvoiceCreation,
        InvoiceCreationView,
        InvoiceCreationDeleted,

        PaymentDetails,

        Entries,

        Report,

        //  ,
    },

    mounted() {
        // Receiving broadicasting
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                console.log(e);
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
            amount: "",
            narration: "",

            myValue: "",
            myOptions: ["op1", "op2", "op3"],
        };
    },
    computed: {
        //Add computed properties

        getCurrentTab() {
            return this.$store.getters["AccountantInvoiceModule/getTab"];
        },

        getCurrentTabInvoices() {
            return this.$store.getters[
                "AccountantInvoiceModule/getCurrentTabInvoices"
            ];
        },

        getInvoiceView() {
            return this.$store.getters[
                "AccountantInvoiceModule/getInvoiceView"
            ];
        },
    
        legerEntriesListener() {
            return this.legerEntries !== null ? this.legerEntries.data : null;
        },

        setLegerEntryListener() {
            return this.selectedLegerEntry;
        },
    },
    watch: {
        //Add watchers...
        student() {
            this.getStudents();
        },
    },
    methods: {
        //Add methods...
        setTab(tab) {
            this.$store.dispatch("AccountantInvoiceModule/setTab", tab);
        },

        getSpecificLegerEntries() {
            // console.log("Loading next page");
            axios
                .get("/accountant/getSpecificLegerEntries")
                .then((response) => {
                    this.legerEntries = response.data;
                    // console.log(response.data)
                });
        },

        setLegerEntry(entry) {
            this.selectedLegerEntry = entry;
        },

        getStudents() {
            axios.get("/accountant/searchStudent").then((response) => {
                this.students = response.data.data;
                // console.log(response.data);
            });
        },

        async submitForm() {
            axios
                .post("/accountant/submitTuitionFee", {
                    amount: this.amount,
                    narration: this.narration,
                })
                .then((response) => {
                    // this.students = response.data.data;
                    this.submitFormToMain();
                    this.amount = "";
                    this.narration = "";
                    console.log(response.data);
                });
            // handle response here
        },

        async submitFormToMain() {
            axios
                .post("http://127.0.0.1:8001/api/accountant/getLegerEntries", {
                    amount: this.amount,
                    narration: this.narration,
                })
                .then((response) => {
                    // this.students = response.data.data;
                    // this.amount = "";
                    // this.narration = "";
                    // console.log(response.data.data);
                });
            // handle response here
        },

        setInvoiceView(id) {
            this.$store.dispatch("AccountantInvoiceModule/setInvoiceView", id);
        },

        myChangeEvent(val) {
            console.log(val);
        },
        mySelectEvent({ id, text }) {
            console.log({ id, text });
        },
    },
};
</script>

<style scoped>
/* .fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter,
.fade-leave-to {
    opacity: 0;
}

.slide-enter-active,
.slide-leave-active {
    transition: transform 0.5s;
}
.slide-enter,
.slide-leave-to {
    transform: translateX(-100%);
} */

/* .fade-enter-active, .fade-leave-active {
  transition: opacity 0.5s;
}

.fade-enter, .fade-leave-to {
  opacity: 0;
} */
</style>
