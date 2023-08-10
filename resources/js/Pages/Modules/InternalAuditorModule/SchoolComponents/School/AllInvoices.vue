<template>
    <div data-app>
        <div class="h-screen p-0 col-12 pt-0 mt-0">
            <div class="d-flex justify-content-end mail-list mt-2 mb-1">
                <div class="d-flex justifi-content-between">
                    <a
                        @click="setTab('payments')"
                        href="#"
                        class="list-group-item border-0"
                        :class="[getCurrentTab == 'payments' ? 'text-warning' : '']"
                    >
                        <i
                            class="mdi mdi-form-select font-18 pb-1 align-middle me-1"
                        ></i
                        >Student Payments
                    </a>

                    <span class="list-group-item border-0 h-100"> | </span>

                    <a
                        @click="setTab('invoices')"
                        href="#"
                        class="list-group-item border-0"
                        :class="[getCurrentTab == 'invoices' ? 'text-warning' : '']"
                    >
                        <i
                            class="mdi mdi-form-select font-18 pb-1 align-middle me-1"
                        ></i
                        >Invoices
                    </a>


                    <a
                        @click="setTab('invoicesDeleted')"
                        href="#"
                        class="list-group-item border-0"
                        :class="[getCurrentTab == 'invoicesDeleted' ? 'text-warning' : '']"
                    >
                        <i
                            class="mdi mdi-form-select font-18 pb-1 align-middle me-1"
                        ></i
                        >Deleted
                    </a>

                    <span class="list-group-item border-0 h-100"> | </span>
                    <a
                        @click="setTab('entries')"
                        href="#"
                        class="list-group-item border-0"
                        :class="[getCurrentTab == 'entries' ? 'text-warning' : '']"
                    >
                        <i
                            class="mdi mdi-form-select font-18 pb-1 align-middle me-1"
                        ></i
                        >Entries
                    </a>

                    <span class="list-group-item border-0 h-100"> | </span>
                    <a
                        @click="setTab('home')"
                        href="#"
                        class="list-group-item border-0"
                        :class="[getCurrentTab == 'home' ? 'text-warning' : '']"
                    >
                        <i
                            class="mdi mdi-form-select font-18 pb-1 align-middle me-1"
                        ></i
                        >All
                    </a>
                    <a
                        @click="setTab('accepted')"
                        href="#"
                        class="list-group-item border-0"
                        :class="[
                            getCurrentTab == 'accepted' ? 'text-warning' : '',
                        ]"
                    >
                        <i
                            class="mdi mdi-check-bold font-18 pb-1 align-middle me-1"
                        ></i
                        >Accepted
                    </a>
                    <a
                        @click="setTab('rejected')"
                        href="#"
                        class="list-group-item border-0"
                        :class="[
                            getCurrentTab == 'rejected' ? 'text-warning' : '',
                        ]"
                    >
                        <i
                            class="mdi mdi-alert-circle font-18 pb-1 align-middle me-2"
                        ></i
                        >Rejected
                    </a>
                    <a
                        @click="setTab('starred')"
                        href="#"
                        class="list-group-item border-0"
                        :class="[
                            getCurrentTab == 'starred' ? 'text-warning' : '',
                        ]"
                    >
                        <i
                            class="mdi mdi-star font-18 pb-1 align-middle me-2"
                        ></i
                        >Starred
                    </a>
                    <a
                        @click="setTab('deleted')"
                        href="#"
                        class="list-group-item border-0"
                        :class="[
                            getCurrentTab == 'deleted' ? 'text-warning' : '',
                        ]"
                    >
                        <i
                            class="mdi mdi-delete font-18 pb-1 align-middle me-2"
                        ></i
                        >Deleted
                    </a>
                </div>
            </div>

            <hr class="bg-gray-200 py-0 my-0" />

            <div class="mt-0 pt-0">
                <div v-show="getInvoiceView">
                    <view-invoice></view-invoice>
                </div>

                <div v-show="!getInvoiceView">
                    <payment-details v-show="getCurrentTab == 'payments'"></payment-details>
                    <invoice-creation v-show="getCurrentTab == 'invoices'"></invoice-creation>
                                    <invoice-creation-deleted v-show="getCurrentTab == 'invoicesDeleted'"></invoice-creation-deleted>
                    <entries v-show="getCurrentTab == 'entries'"></entries>
                    <requisitions
                        v-show="getCurrentTab == 'home'"
                    ></requisitions>
                    <accepted-requisitions
                        v-show="getCurrentTab == 'accepted'"
                    ></accepted-requisitions>
                    <deleted-requisitions
                                    v-show="getCurrentTab == 'deleted'"
                                ></deleted-requisitions>
                    <starred-requisitions
                        v-show="getCurrentTab == 'starred'"
                    ></starred-requisitions>
                    <rejected-requisitions
                        v-show="getCurrentTab == 'rejected'"
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
import InvoiceCreation from "./Invoices/InvoiceCreation/InvoiceCreation.vue";
import InvoiceCreationDeleted from "./Invoices/InvoiceCreation/InvoiceCreationDeleted.vue";
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
