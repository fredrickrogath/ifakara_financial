<template>

    <!-- Begin page -->
    <!-- <div> -->
        <app-layout>
            <div id="wrapper" class="pt-2">
                <!-- Topbar Start -->
                <!-- <top-bar></top-bar> -->
                <!-- end Topbar -->

                <!-- ========== Left Sidebar Start ========== -->
                <div class="left-side-menu pt-0">
                    <div class="h-100" data-simplebar>

                        <!--- Sidemenu -->

                        <side-bar></side-bar>

                        <!-- End Sidebar -->

                        <div class="clearfix"></div>
                    </div>
                    <!-- Sidebar -left -->
                </div>
                <!-- Left Sidebar End -->

                <!-- ============================================================== -->
                <!-- Start Page Content here -->
                <!-- ============================================================== -->

                <div class="content-page mt-0 pt-0 px-0">
                    <div class="content">
                        <!-- Start Content-->
                        <div class="container-fluid">

                            <!-- Bishop -->
                            <home-page
                                v-if="route().current('bishop.dashboard')"
                            ></home-page>
                            <schools v-if="route().current('bishop.schools')"></schools>
                            <documents v-if="route().current('bishop.documents')"></documents>
                            <uploads v-if="route().current('bishop.uploads')"></uploads>
                            <invoices v-if="route().current('bishop.invoices')"></invoices>
                            <internal-office v-if="route().current('bishop.internal_office')"></internal-office>

                            <!-- Secretary -->
                            <secretary-home-page
                                v-if="route().current('secretary.dashboard')"
                            ></secretary-home-page>
                            <secretary-schools v-if="route().current('secretary.schools')"></secretary-schools>
                            <secretary-uploads v-if="route().current('secretary.uploads')"></secretary-uploads>
                            <secretary-reports v-if="route().current('secretary.reports')"></secretary-reports>

                            <!-- Accountant -->
                            <accountant-home-page
                                v-if="route().current('accountant.dashboard')"
                            ></accountant-home-page>
                            <accountant-invoices v-if="route().current('accountant.invoices')"></accountant-invoices>
                            <accountant-invoice-school v-if="route().current('accountant.invoice_school')"></accountant-invoice-school>
                            <accountant-invoice-create v-if="route().current('accountant.invoice_create')"></accountant-invoice-create>
                            <accountant-invoice-incoming v-if="route().current('accountant.invoice_incoming')"></accountant-invoice-incoming>
                            <accountant-invoice-pending v-if="route().current('accountant.invoice_pending')"></accountant-invoice-pending>
                            <accountant-invoice-reports v-if="route().current('accountant.invoice_reports')"></accountant-invoice-reports>
                            <accountant-charts-of-accounts v-if="route().current('accountant.charts_of_accounts')"></accountant-charts-of-accounts>



                            <!-- Internal Auditor -->
                            <internal-auditor-home-page
                                v-if="route().current('internal_auditor.dashboard')"
                            ></internal-auditor-home-page>
                            <internal-auditor-schools v-if="route().current('internal_auditor.schools')"></internal-auditor-schools>
                            <internal-auditor-staffs v-if="route().current('internal_auditor.staffs')"></internal-auditor-staffs>
                            <internal-auditor-reports v-if="route().current('internal_auditor.reports')"></internal-auditor-reports>
                            <!-- <accountant-invoice-pending v-if="route().current('internal_auditor.invoice_pending')"></accountant-invoice-pending>
                            <accountant-invoice-reports v-if="route().current('internal_auditor.invoice_reports')"></accountant-invoice-reports> -->
                        </div>
                        <!-- container -->
                    </div>
                    <!-- content -->

                    <!-- Footer Start -->
                    <!-- <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    {{ new Date().getFullYear() }} &copy; UBold
                                    theme by <a href="">Coderthemes</a>
                                </div>
                                <div class="col-md-6">
                                    <div
                                        class="text-md-end footer-links d-none d-sm-block"
                                    >
                                        <a href="javascript:void(0);"
                                            >About Us</a
                                        >
                                        <a href="javascript:void(0);">Help</a>
                                        <a href="javascript:void(0);"
                                            >Contact Us</a
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer> -->
                    <!-- end Footer -->
                </div>

                <!-- ============================================================== -->
                <!-- End Page content -->
                <!-- ============================================================== -->
            </div>
            <!-- END wrapper -->

            <!-- Right bar overlay-->
            <div class="rightbar-overlay"></div>
        </app-layout>
    <!-- </div> -->
</template>

<script>
//end of inertiajs progress
import { InertiaProgress } from "@inertiajs/progress";
InertiaProgress.init({
    // The delay after which the progress bar will
    // appear during navigation, in milliseconds.
    delay: 250,

    // The color of the progress bar.
    color: "#6366F1",

    // Whether to include the default NProgress styles.
    includeCSS: true,

    // Whether the NProgress spinner will be shown.
    showSpinner: true,
});
//end of inertiajs progress

// import gsap from "gsap";
import AppLayout from "@/Layouts/AppLayout";
import Welcome from "@/Jetstream/Welcome";
import SideBar from "./Components/SideBar.vue";
import TopBar from "./Components/TopBar.vue";

// import PostCard from "./Components/PostCard.vue";
// import Tables from './Components/Tables.vue';

//PAGES

import HomePage from "./Modules/BishopModule/HomePage.vue";
import Documents from "./Modules/BishopModule/Documents.vue";
import InternalOffice from "./Modules/BishopModule/InternalOffice.vue";
import Invoices from "./Modules/BishopModule/Invoices.vue";
import Schools from "./Modules/BishopModule/Schools.vue";
import Uploads from "./Modules/BishopModule/Uploads.vue";


import SecretaryHomePage from "./Modules/SecretaryModule/HomePage.vue";
import SecretarySchools from "./Modules/SecretaryModule/Schools.vue";
import SecretaryUploads from "./Modules/SecretaryModule/Uploads.vue";
import SecretaryReports from "./Modules/SecretaryModule/Reports.vue";


import AccountantHomePage from "./Modules/AccountantMainModule/HomePage.vue";
import AccountantInvoiceCreate from "./Modules/AccountantMainModule/InvoiceCreate.vue";
import AccountantInvoiceIncoming from "./Modules/AccountantMainModule/InvoiceIncoming.vue";
import AccountantInvoicePending from "./Modules/AccountantMainModule/InvoicePending.vue";
import AccountantInvoiceReports from "./Modules/AccountantMainModule/InvoiceReports.vue";
import AccountantInvoiceSchool from "./Modules/AccountantMainModule/InvoiceSchool.vue";
import AccountantInvoices from "./Modules/AccountantMainModule/Invoices.vue";
import AccountantChartsOfAccounts from "./Modules/AccountantMainModule/ChartsOfAccounts.vue";


import InternalAuditorHomePage from "./Modules/InternalAuditorModule/HomePage.vue";
import InternalAuditorSchools from "./Modules/InternalAuditorModule/Schools.vue";
import InternalAuditorStaffs from "./Modules/InternalAuditorModule/Staffs.vue";
import InternalAuditorReports from "./Modules/InternalAuditorModule/Reports.vue";

export default {
    components: {
        AppLayout,
        Welcome,
        SideBar,
        TopBar,

        // MY PAGES
        HomePage,
        Documents,
        InternalOffice,
        Invoices,
        Schools,
        Uploads,


        SecretaryHomePage,
        SecretarySchools,
        SecretaryUploads,
        SecretaryReports,


        AccountantHomePage,
        AccountantInvoiceCreate,
        AccountantInvoiceIncoming,
        AccountantInvoicePending,
        AccountantInvoiceReports,
        AccountantInvoiceSchool,
        AccountantChartsOfAccounts,
        AccountantInvoices,


        InternalAuditorHomePage,
        InternalAuditorSchools,
        InternalAuditorStaffs,
        InternalAuditorReports,


    },

    mounted() {
        // console.log(this.$page.props.routes);
    },

    data() {
        return {
            page: "dashboard",

            contentForCardsWhenSideBarHides: 4,
            showSideBarBeforeSrollDown: true,
            dynamicColForSideBar: 2,
        };
    },

    methods: {},

    computed: {
        counter() {
            return this.$store.getters["numbers/finalCounter2"];
        },

        dynamicColForSideBarComputed() {
            return this.dynamicColForSideBar;
        },
    },

    // watch: {
    //     showSideBarBeforeSrollDown(val) {
    //         if (val) {
    //             this.contentForCardsWhenSideBarHides = 4;
    //             this.dynamicColForSideBar = 2;
    //             this.contentFullWidthWhenSideBarHides = 10;
    //             this.contentNoPaddingWhenSideBarHides = "max-w-7xl";
    //         } else {
    //             this.contentForCardsWhenSideBarHides = 3;
    //             this.dynamicColForSideBar = 0;
    //             this.contentFullWidthWhenSideBarHides = 12;
    //             this.contentNoPaddingWhenSideBarHides = "";
    //         }
    //     },
    //     number(n) {
    //         gsap.to(this, { duration: 5, tweened: Number(n) || 0 });
    //     },
    // },
};
</script>
