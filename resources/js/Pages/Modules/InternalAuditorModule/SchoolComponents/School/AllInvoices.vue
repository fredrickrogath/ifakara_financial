<template>
    <div data-app>
        <div class="h-screen p-0 col-12 pt-0 mt-0">
            <div class="d-flex justify-content-end mail-list mt-0">
                <div class="d-flex justifi-content-between">
                    <a v-show="getPaymentView" @click="setInvoiceView()" class="btn text-lg-700">
                        <strong class="text-warning" style="font-size: large"
                            ><i class="fe-arrow-left"></i>
                        </strong>
                    </a>

                    <a
                        @click="setTab('payments')"
                        href="#"
                        class="list-group-item border-0"
                        :class="[
                            getCurrentTab == 'payments' ? 'text-warning' : '',
                        ]"
                    >
                        <i
                            class="mdi mdi-form-select font-17 pb-1 align-middle me-1"
                        ></i
                        ><span class="text-xs uppercase font-semibold"
                            >Student Payments</span
                        >
                    </a>

                    <span class="list-group-item border-0 h-100"> | </span>

                    <a
                        @click="setTab('invoices')"
                        href="#"
                        class="list-group-item border-0"
                        :class="[
                            getCurrentTab == 'invoices' ? 'text-warning' : '',
                        ]"
                    >
                        <i
                            class="mdi mdi-form-select font-17 pb-1 align-middle me-1"
                        ></i
                        ><span class="text-xs uppercase font-semibold"
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
                        ><span class="text-xs uppercase font-semibold"
                            >Deleted</span
                        >
                    </a>

                    <span class="list-group-item border-0 h-100"> | </span>
                    <a
                        @click="setTab('entries')"
                        href="#"
                        class="list-group-item border-0"
                        :class="[
                            getCurrentTab == 'entries' ? 'text-warning' : '',
                        ]"
                    >
                        <i
                            class="mdi mdi-form-select font-17 pb-1 align-middle me-1"
                        ></i
                        ><span class="text-xs uppercase font-semibold"
                            >Entries</span
                        >
                    </a>

                    <span class="list-group-item border-0 h-100"> | </span>
                    <a
                        @click="setTab('home')"
                        href="#"
                        class="list-group-item border-0"
                        :class="[getCurrentTab == 'home' ? 'text-warning' : '']"
                    >
                        <i
                            class="mdi mdi-form-select font-17 pb-1 align-middle me-1"
                        ></i
                        ><span class="text-xs uppercase font-semibold"
                            >All</span
                        >
                    </a>
                    <a
                        @click="setTab('accepted')"
                        href="#"
                        class="list-group-item border-0 pt-2"
                        :class="[
                            getCurrentTab == 'accepted' ? 'text-warning' : '',
                        ]"
                    >
                        <!-- <i
                            class="mdi mdi-check-bold font-18 pb-1 align-middle me-1"
                        ></i
                        > -->
                        <span class="text-xs uppercase font-semibold"
                            >Accepted</span
                        >
                    </a>
                    <a
                        @click="setTab('rejected')"
                        href="#"
                        class="list-group-item border-0 pt-2"
                        :class="[
                            getCurrentTab == 'rejected' ? 'text-warning' : '',
                        ]"
                    >
                        <!-- <i
                            class="mdi mdi-alert-circle font-18 pb-1 align-middle me-2"
                        ></i
                        > -->
                        <span class="text-xs uppercase font-semibold"
                            >Rejected</span
                        >
                    </a>
                    <a
                        @click="setTab('starred')"
                        href="#"
                        class="list-group-item border-0 pt-2"
                        :class="[
                            getCurrentTab == 'starred' ? 'text-warning' : '',
                        ]"
                    >
                        <!-- <i
                            class="mdi mdi-star font-18 pb-1 align-middle me-2"
                        ></i
                        > -->
                        <span class="text-xs uppercase font-semibold"
                            >Starred</span
                        >
                    </a>
                    <a
                        @click="setTab('deleted')"
                        href="#"
                        class="list-group-item border-0 pt-2"
                        :class="[
                            getCurrentTab == 'deleted' ? 'text-warning' : '',
                        ]"
                    >
                        <!-- <i
                            class="mdi mdi-delete font-18 pb-1 align-middle me-2"
                        ></i
                        > -->
                        <span class="text-xs uppercase font-semibold"
                            >Deleted</span
                        >
                    </a>
                </div>
            </div>

            <hr class="bg-gray-200 py-0 my-0" />

            <div class="mt-0 pt-0">
                <div v-if="getInvoiceView && !getInvoiceCreationView">
                    <view-invoice></view-invoice>
                </div>

                <div v-if="getInvoiceCreationView && !getInvoiceView">
                    <invoice-creation-view></invoice-creation-view>
                </div>

                <div v-if="!getInvoiceView && !getInvoiceCreationView">
                    <payment-details
                        v-if="getCurrentTab == 'payments'"
                    ></payment-details>
                    <invoice-creation
                        v-if="getCurrentTab == 'invoices'"
                    ></invoice-creation>
                    <invoice-creation-deleted
                        v-if="getCurrentTab == 'invoicesDeleted'"
                    ></invoice-creation-deleted>
                    <entries v-if="getCurrentTab == 'entries'"></entries>
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
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end Col -->
    </div>
</template>

<script>
import Requisitions from "./Invoices/Requisitions.vue";
import AcceptedRequisitions from "./Invoices/AcceptedRequisitions.vue";
import DeletedRequisitions from "./Invoices/DeletedRequisitions.vue";
import StarredRequisitions from "./Invoices/StarredRequisitions.vue";
import RejectedRequisitions from "./Invoices/RejectedRequisitions.vue";
import ViewInvoice from "./Invoices/ViewInvoice.vue";
import InvoiceCreation from "../../../AccountantMainModule/InvoicesSchool/InvoiceCreation/InvoiceCreation.vue";
import InvoiceCreationDeleted from "./Invoices/InvoiceCreation/InvoiceCreationDeleted.vue";
import InvoiceCreationView from "../../../AccountantMainModule/InvoicesSchool/InvoiceCreation/InvoiceCreationView.vue";
import PaymentDetails from "../../../AccountantMainModule/InvoicesSchool/PaymentDetails.vue";

import Entries from "./Invoices/Entries.vue";

export default {
    components: {
        Requisitions,
        AcceptedRequisitions,
        DeletedRequisitions,
        StarredRequisitions,
        RejectedRequisitions,
        ViewInvoice,
        Entries,
        InvoiceCreation,
        InvoiceCreationView,
        InvoiceCreationDeleted,

        PaymentDetails,
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
        return { echo: null, dialogm1: "", dialog: false, dialogForm: "" };
    },
    computed: {
        //Add computed properties
        // getCurrentTab() {
        //     return this.$store.getters["invoice/getTab"];
        // },

        getCurrentTab() {
            return this.$store.getters["AccountantInvoiceModule/getTab"];
        },

        getInvoiceView() {
            return this.$store.getters[
                "AccountantInvoiceModule/getInvoiceView"
            ];
        },

        getPaymentView() {
            return this.$store.getters[
                "AccountantInvoiceModule/getPaymentView"
            ];
        },

        getInvoiceCreationView() {
            return this.$store.getters[
                "AccountantInvoiceModule/getInvoiceCreationView"
            ];
        },
    },
    watch: {
        //Add watchers...
    },
    methods: {
        //Add methods...
        // setTab(tab) {
        //     this.$store.dispatch("invoice/setTab", tab);
        // },

        setTab(tab) {
            this.$store.dispatch("AccountantInvoiceModule/setTab", tab);
        },

        setInvoiceView() {
            this.$store.dispatch(
                "AccountantInvoiceModule/setPaymentView",
                null
            );
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
</style>
