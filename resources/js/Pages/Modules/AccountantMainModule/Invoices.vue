<template>
    <div data-app>
        <v-row justify="center">
            <v-dialog v-model="dialog" scrollable width="auto">
                <v-card>
                    <h5 class="text-center">{{ dialogForm }} Form Fill</h5>
                    <!-- <v-divider></v-divider> -->
                    <div class="px-2">
                        <form>
                        <div class="mb-1">
                            <label for="simpleinput" class="form-label"
                                >Identity</label
                            >
                            <input
                                type="text"
                                id="simpleinput"
                                class="form-control form-control-sm"
                                placeholder="Identity"
                            />
                        </div>

                        <div class="mb-1">
                            <label for="example-email" class="form-label"
                                >Amount</label
                            >
                            <input
                                type="email"
                                id="example-email"
                                name="amount"
                                class="form-control form-control-sm"
                                placeholder="Amount"
                            />
                        </div>

                        <div class="mb-1">
                            <label for="example-email" class="form-label"
                                >Amount</label
                            >
                            <input
                                type="email"
                                id="example-email"
                                name="amount"
                                class="form-control form-control-sm"
                                placeholder="Amount"
                            />
                        </div>

                        <div class="mb-1">
                            <label for="example-email" class="form-label"
                                >Amount</label
                            >
                            <input
                                type="email"
                                id="example-email"
                                name="amount"
                                class="form-control form-control-sm"
                                placeholder="Amount"
                            />
                        </div>

                        <!-- <div class="mb-1">
                            <label for="example-palaceholder" class="form-label"
                                >Placeholder</label
                            >
                            <input
                                type="text"
                                id="example-palaceholder"
                                class="form-control form-control-sm"
                                placeholder="placeholder"
                            />
                        </div> -->

                        <div class="mb-1">
                            <label for="example-textarea" class="form-label"
                                >Naration</label
                            >
                            <textarea
                                class="form-control form-control-sm"
                                id="example-textarea"
                                rows="5"
                            ></textarea>
                        </div>

                        <!-- <div class="mb-1">
                            <label for="example-readonly" class="form-label"
                                >Readonly</label
                            >
                            <input
                                type="text"
                                id="example-readonly"
                                class="form-control form-control-sm"
                                readonly=""
                                value="Readonly value"
                            />
                        </div> -->

                        <div class="d-flex justify-content-between my-1 mt-2">
                            <button type="button" class="btn btn-success waves-effect waves-light">Submit</button>
                            <button @click="dialog = false" type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
                        </div>
                    </form>
                    </div>
                </v-card>
            </v-dialog>
        </v-row>

        <!-- End of Right modal content -->

        <div class="row pt-0">
            <!-- Right Sidebar -->
            <div class="col-12 pt-0">
                <div class="h-screen mt-3">
                    <div class="bg-white h-screen">
                        <!-- Left sidebar -->
                        <div class="inbox-leftbar bg-white mt-1">
                            <div class="btn-group dropend d-block mb-2">
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
                                    <!-- <a
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
                                    > -->
                                </div>
                            </div>

                            <div class="btn-group d-block mb-0 mx-2">
                                <button
                                    type="button"
                                    class="bg-gray-200 py-1 w-100 waves-effect waves-light dropdown-toggle"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    Entry Not Selected
                                </button>

                                <div class="dropdown-menu">
                                    <!-- <a
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
                                    > -->
                                    <!-- <a
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
                                    > -->
                                </div>
                            </div>

                            <hr class="bg-gray-200 mb-1" />

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

                            <hr class="bg-gray-200 mb-1 mt-0" />

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

                        <div class="inbox-rightbar pt-0 px-0">

                            <div class="">
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
                </div>
                <!-- end card -->
            </div>
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
import Invoices from "./Invoices/Invoices.vue";
import Schools from "./Invoices/Schools.vue";

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
        Invoices,
        Schools,
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
