<template>
    <div data-app>

        <div class="row px-0 pt-0">
            <!-- Right Sidebar -->
            <!-- <div class="col-12 px-1 bg-info"> -->
                <!-- <div class="h-screen"> -->
                    <div class="bg-white h-screen">
                        <!-- Left sidebar -->
                        <div class="inbox-leftbar bg-white">
                            <div class="mail-list">
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

                            <hr class="bg-gray-100 mb-1 mt-0" />

                            <div class="mail-list mt-2 mb-3">
                                <span class="text-center pl-3 mx-auto"
                                    >From Procurement</span
                                >

                                <a
                                    @click="setTab('home')"
                                    href="#"
                                    class="list-group-item border-0"
                                    :class="[
                                        getCurrentTab == 'home'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-form-select font-18 align-middle me-2"
                                    ></i
                                    >All Requisitions
                                </a>
                                <a
                                    @click="setTab('accepted')"
                                    href="#"
                                    class="list-group-item border-0"
                                    :class="[
                                        getCurrentTab == 'accepted'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-check-bold font-18 align-middle me-2"
                                    ></i
                                    >Accepted Requisitions</a
                                >
                                <a
                                    @click="setTab('rejected')"
                                    href="#"
                                    class="list-group-item border-0"
                                    :class="[
                                        getCurrentTab == 'rejected'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-alert-circle font-18 align-middle me-2"
                                    ></i
                                    >Rejected Requisitions</a
                                >
                                <a
                                    @click="setTab('starred')"
                                    href="#"
                                    class="list-group-item border-0"
                                    :class="[
                                        getCurrentTab == 'starred'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-star font-18 align-middle me-2"
                                    ></i
                                    >Starred Requisitions</a
                                >
                                <a
                                    @click="setTab('deleted')"
                                    href="#"
                                    class="list-group-item border-0"
                                    :class="[
                                        getCurrentTab == 'deleted'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-delete font-18 align-middle me-2"
                                    ></i
                                    >Deleted Requisitions</a
                                >
                            </div>

                            <div class="ml-3">
                                <h5>
                                    <span
                                        class="badge rounded-pill p-1 px-2 badge-soft-secondary"
                                        >TASKS</span
                                    >
                                </h5>
                                <h6 class="text-uppercase mt-3">Pending</h6>
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
                                    7 (25%) of 35 pending tasks
                                </p>
                            </div>
                        </div>
                        <!-- End Left sidebar -->

                        <div class="inbox-rightbar pt-1 px-0">

                            <div class="mt-0 pt-0">
                                <!-- <h5 class="mb-3">Recent</h5> -->
                                <!-- <transition name="fade"> -->
                                    <!-- <entries
                                        v-if="getCurrentTab == 'entries'"
                                    ></entries>
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
                                    ></rejected-requisitions> -->

                                    <div v-show="getInvoiceView">
                                    <view-invoice></view-invoice>
                                </div>

                                <div v-show="!getInvoiceView">
                                    <entries
                                    v-show="getCurrentTab == 'entries'"
                                ></entries>
                                <requisitions
                                    v-show="getCurrentTab == 'home'"
                                ></requisitions>
                                <accepted-requisitions
                                    v-show="getCurrentTab == 'accepted'"
                                ></accepted-requisitions>
                                <!-- <deleted-requisitions
                                    v-show="getCurrentTab == 'deleted'"
                                ></deleted-requisitions> -->
                                <starred-requisitions
                                    v-show="getCurrentTab == 'starred'"
                                ></starred-requisitions>
                                <rejected-requisitions
                                    v-show="getCurrentTab == 'rejected'"
                                ></rejected-requisitions>
                                </div>

                                <!-- </transition> -->
                            </div>
                            <!-- end .mt-3-->
                        </div>
                        <!-- end inbox-rightbar-->

                        <div class="clearfix"></div>
                    </div>
                <!-- </div> -->
                <!-- end card -->
            <!-- </div> -->
            <!-- end Col -->
        </div>
        <!-- End row -->
    </div>
</template>

<script>
import Requisitions from "./Invoices/Requisitions.vue";
import AcceptedRequisitions from "./Invoices/AcceptedRequisitions.vue";
// import DeletedRequisitions from "./Invoices/DeletedRequisitions.vue";
import StarredRequisitions from "./Invoices/StarredRequisitions.vue";
import RejectedRequisitions from "./Invoices/RejectedRequisitions.vue";
import ViewInvoice from "./Invoices/ViewInvoice.vue";

import Entries from "./Invoices/Entries.vue";

export default {
    components: {
        Requisitions,
        AcceptedRequisitions,
        // DeletedRequisitions,
        StarredRequisitions,
        RejectedRequisitions,
        ViewInvoice,
        Entries,
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
        return { echo: null, dialogm1: "", dialog: false , dialogForm: "",};
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
            return this.$store.getters["AccountantInvoiceModule/getInvoiceView"];
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
