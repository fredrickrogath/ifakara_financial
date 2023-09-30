<template>
    <div class="">
        <a @click="setInvoiceView()" class="ml-4 my-0 py-0 cursor-pointer">
            <strong class="text-gray-600" style="font-size: large"
                ><i class="fe-arrow-left"></i>
            </strong>
        </a>

        <hr class="bg-gray-200 mb-1 mt-0" />

        <div class="col-12 mt-0 pt-0">
            <div class="px-1">
                <div class="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-0">
                                <span
                                    v-for="(seller, index) in invoice.sellers"
                                    :key="seller.id"
                                    class="d-block"
                                >
                                    <div class="">
                                        <v-menu transition="fab-transition">
                                            <template
                                                v-slot:activator="{ on, attrs }"
                                            >
                                                <strong
                                                    >Supplier {{ index + 1 }} :
                                                </strong>
                                                <span
                                                    class="seller-name uppercase"
                                                    v-bind="attrs"
                                                    v-on="on"
                                                    @click="
                                                        getSellerProfile(seller)
                                                    "
                                                >
                                                    {{ seller.name }}
                                                </span>
                                            </template>

                                            <seller-profile
                                                :seller="sellerInfo"
                                            ></seller-profile>
                                        </v-menu>
                                    </div>
                                </span>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-4 offset-md-2">
                            <div class="mt-0 float-end d-flex flex-col">
                                <span>
                                    <strong> Invoice id : </strong
                                    ><span>{{ getInvoiceId }}</span>
                                </span>
                                
                                <span
                                class="d-flex justify-content-between mb-1"
                                >
                                <strong>Invoice Status : </strong>
                                <div>
                                    <span
                                            class="btn btn-sm btn-success text-white btn-sm waves-effect waves-light px-1 py-0"
                                            :class="[
                                                this.$page.props.role ==
                                                'bishop'
                                                    ? 'disabled'
                                                    : '',
                                            ]"
                                            v-if="
                                                !this.invoice
                                                    .status_from_financial_accountant
                                            "
                                        >
                                        Verify
                                    </span>

                                        <span
                                        class="btn btn-sm btn-danger text-white btn-sm waves-effect waves-light px-1 py-0"
                                        :class="[
                                                this.$page.props.role ==
                                                'bishop'
                                                ? 'disabled'
                                                    : '',
                                                ]"
                                            v-else
                                            >
                                            Unverify
                                        </span>
                                    </div>
                                </span>
                                
                                <span class="d-flex justify-content-between">
                                    <strong>Approve Status : </strong>
                                    <div>
                                        <span
                                        class="btn btn-sm btn-success text-white btn-sm waves-effect waves-light px-1 py-0"
                                        v-if="
                                                !this.invoice
                                                    .status_from_financial_bishop
                                            "
                                            @click="verifyInvoiceBishop"
                                            >
                                            Approve
                                        </span>
                                        
                                        <span
                                        class="btn btn-sm btn-danger text-white btn-sm waves-effect waves-light px-1 py-0"
                                        v-if="
                                                this.invoice
                                                    .status_from_financial_bishop
                                            "
                                            @click="verifyInvoiceBishop"
                                            >
                                            Unapprove
                                        </span>
                                        
                                        <span
                                            class="disabled btn btn-sm btn-success text-white btn-sm waves-effect waves-light px-1 py-0"
                                            v-else-if="
                                                this.invoice
                                                    .status_from_financial_bishop &&
                                                this.$page.props.role !==
                                                    'bishop'
                                            "
                                        >
                                        Unapproved
                                    </span>
                                    
                                    <span
                                    class="disabled btn btn-sm btn-success text-white btn-sm waves-effect waves-light px-1 py-0"
                                    v-else-if="
                                                this.invoice
                                                    .status_from_financial_bishop &&
                                                this.$page.props.role !==
                                                    'bishop'
                                            "
                                        >
                                        Unapproved
                                    </span>
                                </div>
                            </span>
                            <span class="mt-1">
                                <strong>Invoice Date:</strong>
                                <span class="float-end">
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ formattedDate(invoice.created_at) }}
                                </span>
                            </span>
                        </div>
                    </div>
                    <!-- end col -->
                    </div>
                    <!-- end row -->

                    <hr class="bg-gray-200 mb-0 mt-1" />

                    <!-- <div class="mt-0 bg-info py-0"> -->
                    <div class="">
                        <strong class="text-gray-500 font-bold"
                            >Invoice Address</strong
                        >
                        <address>
                            Procumerement<br />
                            Diocese of Ifakara Cathedral<br />
                            Ifakara Morogoro <br />
                            Tanzania<br />
                            <abbr title="Phone">P:</abbr> (123) 456-7890
                        </address>
                    </div>
                    <!-- end col -->
                    <!-- end col -->
                    <!-- </div> -->

                    <hr class="bg-gray-200 mb-1 mt-0" />

                    <!-- end row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table
                                    class="table table-centered teble-sm table-condensed text-xs uppercase"
                                >
                                    <thead class="table-condensed">
                                        <tr>
                                            <!-- <th>#</th> -->
                                            <th>Tool&Item</th>
                                            <th style="width: 10%">Quantity</th>
                                            <th style="width: 10%">Amount</th>
                                            <th
                                                style="width: 10%"
                                                class="text-end"
                                            >
                                                Total
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="data in invoice.invoice_tool"
                                            :key="data.id"
                                        >
                                            <!-- <td>1</td> -->
                                            <td
                                                class="text-gray-600 font-semibold uppercase text-xs"
                                            >
                                                {{ data.tool.name }}
                                                <br />
                                                <!-- 2 Pages static website - my
                                                website -->
                                            </td>
                                            <td
                                                class="text-gray-600 font-semibold uppercase text-xs"
                                            >
                                                {{ data.count }}
                                            </td>
                                            <td>
                                                {{
                                                    formattedPrice(
                                                        data.tool.price
                                                    )
                                                }}
                                            </td>
                                            <td
                                                class="text-end text-gray-600 font-semibold uppercase text-xs"
                                            >
                                                {{
                                                    formattedPrice(
                                                        data.count *
                                                            data.tool.price
                                                    )
                                                }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="row text-xs mt-0">
                            <div class="col-sm-6"></div>
                            <!-- end col -->
                            <div class="col-sm-6">
                                <div class="float-end mr-2">
                                    <p>
                                        <b>Sub-total:</b>
                                        <span class="float-end">{{
                                            formattedPrice(total)
                                        }}</span>
                                    </p>
                                    <p>
                                        <b>Discount (18%):</b>
                                        <span class="float-end">
                                            &nbsp;&nbsp;&nbsp;
                                            {{
                                                formattedPrice(
                                                    total * (18 / 100)
                                                )
                                            }}</span
                                        >
                                    </p>
                                    <b class="float-end">
                                        <span>TOTAL</span>
                                        {{
                                            formattedPrice(
                                                total - total * (18 / 100)
                                            )
                                        }}
                                    </b>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end col -->

                        <hr class="bg-gray-200 mb-2 mt-1" />
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
</template>

<script>
import moment from "moment";
import SellerProfile from "../../.././Components/SellerProfile.vue";
export default {
    components: {
        SellerProfile,
    },

    mounted() {
        this.showLoader = true;
        this.getInvoiceView();

        // Receiving broadicasting
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                this.getInvoiceView();
                // console.log(e);
            }
        );
    },

    data() {
        return {
            showLoader: false,
            objectData: [],
            seller: "",
            supplier: [],
            invoice: [],
            total: 0,
            count: 0,
            id: null,
            sellerInfo: [],
            // currentDate: new Date(),
        };
    },

    filters: {
        formatDate(date) {
            return moment(date).format("MMM DD, YYYY");
        },
    },

    methods: {
        setInvoiceView() {
            this.$store.dispatch(
                "AccountantInvoiceModule/setInvoiceView",
                null
            );
        },

        formattedDate(date) {
            return moment(date).format("MMMM Do YYYY");
            // return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        },

        formattedPrice(amount) {
            return amount.toLocaleString("sw-TZ", {
                style: "currency",
                currency: "Tsh",
            });
        },

        totalPrice(invoice) {
            this.total = invoice.invoice_tool.reduce((total, item) => {
                return total + item.tool.price * item.count;
            }, 0);
            this.objectData.splice(0, this.objectData.length);
        },

        // async sellerName(invoice) {
        //     if (typeof invoice !== "undefined" && invoice !== null) {
        //         this.seller = invoice.seller.name;
        //         // this.supplier = invoice.seller;
        //     }
        // },

        getSellerProfile(seller) {
            this.sellerInfo = seller;
        },

        async getInvoiceView() {
            if(this.getCurrentTab === 'diocese-home'){
                axios
                .post("/accountant/getInvoiceView", {
                    id: this.getInvoiceId,
                })
                .then((response) => {
                    if (response.data.data != null) {
                        this.showLoader = false;
                        this.totalPrice(response.data.data);
                        this.invoice = response.data.data;
                        // console.log(response.data.data);
                        // this.sellerName(this.invoice);
                    }
                });
            }

            if(this.getCurrentTab === 'home'){
                axios
                .post(this.getMainUrl + "accountant/getInvoiceView", {
                    id: this.getInvoiceId,
                })
                .then((response) => {
                    if (response.data.data != null) {
                        this.showLoader = false;
                        this.totalPrice(response.data.data);
                        this.invoice = response.data.data;
                        // console.log(response.data.data);
                        // this.sellerName(this.invoice);
                    }
                });
            }
        },

        async verifyInvoiceBishop() {
            if(this.getCurrentTab === 'diocese-home'){
                axios
                .post(
                    // "http://127.0.0.1:8001/api/accountant/invoiceFromSchool",
                    "/accountant/verifyInvoiceBishop",
                    {
                        id: this.invoice.id,
                        status_from_financial_bishop:
                            this.invoice.status_from_financial_bishop,
                        // invoice: this.objectData,
                    }
                )
                .then((response) => {
                    // this.showLoader = false;
                    // Clear objectData
                    // console.log(response.data.data);
                    // console.log(this.objectData);
                });
            }

            if(this.getCurrentTab === 'home'){
                axios
                .post(
                    // "http://127.0.0.1:8001/api/accountant/invoiceFromSchool",
                    this.getMainUrl + "accountant/verifyInvoiceBishop",
                    {
                        id: this.invoice.id,
                        status_from_financial_bishop:
                            this.invoice.status_from_financial_bishop,
                        // invoice: this.objectData,
                    }
                )
                .then((response) => {
                    // this.showLoader = false;
                    // Clear objectData
                    // console.log(response.data.data);
                    // console.log(this.objectData);
                });
            }
        },

        // async invoiceFormation(data) {
        //     this.objectData.push({
        //         toolName: data.tool.name,
        //         toolPrice: data.tool.price,
        //         toolCount: data.count,
        //     });
        //     // console.log(this.objectData);
        // },

        // async acceptInvoice() {
        //     axios
        //         .post(
        //             // "http://127.0.0.1:8001/api/accountant/invoiceFromSchool",
        //             this.getMainUrl + "accountant/acceptInvoice",
        //             {
        //                 id: this.invoice.id,
        //                 status_from_financial_accountant:
        //                     this.invoice.status_from_financial_accountant,
        //                 // invoice: this.objectData,
        //             }
        //         )
        //         .then((response) => {
        //             this.showLoader = false;
        //             // Clear objectData
        //             // console.log(response.data.data);
        //             // console.log(this.objectData);
        //         });
        // },
    },

    // watch: {
    //     id(newVal, oldVal) {
    //         if (newVal !== null) {
    //             this.getInvoiceView();
    //         }
    //         console.log(
    //             `The message has changed from "${oldVal}" to "${newVal}"`
    //         );
    //     },
    // },

    computed: {
        getInvoiceId() {
            this.id =
                this.$store.getters["AccountantInvoiceModule/getInvoiceId"];
            return this.$store.getters["AccountantInvoiceModule/getInvoiceId"];
        },

        formattedData() {
            return this.invoice.invoice_tool.map((data) => {
                return this.invoiceFormation(
                    data,
                    this.invoice.invoice_tool.length
                );
            });
        },

        getMainUrl() {
            return this.$store.getters["SystemConfigurationsModule/getMainUrl"];
        },

        getCurrentTab() {
            return this.$store.getters["AccountantInvoiceModule/getTab"];
        },
    },
};
</script>

<style scoped>
.table-condensed > thead > tr > th,
.table-condensed > tbody > tr > th,
.table-condensed > tfoot > tr > th,
.table-condensed > thead > tr > td,
.table-condensed > tbody > tr > td,
.table-condensed > tfoot > tr > td {
    padding: 7px;
}
</style>
