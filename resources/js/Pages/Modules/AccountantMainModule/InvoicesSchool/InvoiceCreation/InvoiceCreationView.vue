<template>
    <div class="">
        <div class="d-flex justify-content-between my-1">
            <a @click="setInvoiceCreationView(null)" class="btn text-lg-700">
                <strong class="text-danger" style="font-size: large"
                    ><i class="fe-arrow-left"></i>
                </strong>
            </a>

            <!-- <div class=""> -->
                <!-- end col -->
                <div>
                    <div class="mt-0 float-end d-flex flex-col mr-2">
                        <span class="pb-1">
                            <strong> Invoice id : </strong
                            ><span>{{ getInvoiceCreationId }}</span>
                        </span>

                        <span class="pb-1">
                            <strong>Invoice Status : </strong>
                            <span class="float-end"
                                ><span class="">
                                        <div
                                            class="px-1"
                                        >
                                            <span
                                                class="btn btn-success text-white btn-sm waves-effect waves-light px-1 py-0"
                                                v-if="
                                                    !this.invoice
                                                        .status_from_financial_bishop &&
                                                    $page.props.role == 'bishop'
                                                "
                                                @click="verifyInvoiceCreationBishop"
                                            >
                                                Approve
                                            </span>

                                            <span
                                                class="btn btn-danger text-white btn-sm waves-effect waves-light px-1 py-0"
                                                v-else-if="
                                                    this.invoice
                                                        .status_from_financial_bishop &&
                                                    $page.props.role == 'bishop'
                                                "
                                                @click="verifyInvoiceCreationBishop"
                                            >
                                                Unapproved
                                            </span>

                                            <span
                                                class="btn btn-success text-white btn-sm waves-effect waves-light px-1 py-0"
                                                v-else-if="
                                                    !this.invoice
                                                        .status_from_financial_bishop &&
                                                    $page.props.role !== 'bishop'
                                                "
                                            >
                                                Approved
                                            </span>

                                            <button
                                                type="submit"
                                                class="disabled btn btn-danger text-white btn-sm waves-effect waves-light px-1 py-0"
                                                v-else
                                            >
                                                Unapproved
                                            </button>
                                        </div>
                                </span></span
                            >
                        </span>

                        <span>
                            <strong>Invoice Date:</strong>
                            <span class="float-end">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <!-- {{ currentDate | formatDate }} -->
                                {{ formattedDate(invoice.created_at) }}
                            </span>
                        </span>
                    </div>
                </div>
                <!-- end col -->
            <!-- </div> -->
        </div>

        <hr class="bg-gray-200 mb-1 mt-1" />

        <div class="">
            <div class="mt-0 pt-0">
                <div class="">
                    <!-- end row -->

                    <!-- end row -->
                    <div class="row">
                        <div class="">
                            <div class="table-responsive">
                                <table class="table table-centered teble-sm text-xs uppercase">
                                    <thead>
                                        <tr>
                                            <!-- <th>#</th> -->
                                            <th style="width: 10%">Tool&Item</th>
                                            <!-- <th style="width: 10%">Quantity</th> -->
                                            <th style="width: 10%">Amount</th>
                                            <th
                                                class="text-end"
                                            >
                                            Description
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="data in invoice.invoice_items"
                                            :key="data.id"
                                        >
                                            <!-- <td>1</td> -->
                                            <td class="text-gray-600 font-semibold uppercase text-xs">
                                                {{ data.name }}
                                                <br />
                                                <!-- 2 Pages static website - my
                                                website -->
                                            </td>
                                            <!-- <td>{{ data.count }}</td> -->
                                            <td class="text-gray-600 font-semibold uppercase text-xs">
                                                {{
                                                    formattedPrice(
                                                        data.price
                                                    )
                                                }}
                                            </td>
                                            <td class="text-gray-600 font-semibold uppercase text-xs text-end">
                                                {{
                                                    data.description
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

                    <div class="row text-xs">
                        <div class="col-sm-6">
                            <!-- <div class="clearfix pt-5">
                                <h4 class="">
                                    Total Amount of the Tools & Items
                                </h4>
                            </div> -->
                        </div>
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
                                            formattedPrice(total * (18 / 100))
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
                    <!-- end row -->

                    <!-- <div class="mt-4 mb-1">
                        <div class="text-end d-print-none">
                            <a
                                href="javascript:window.print()"
                                class="btn btn-primary waves-effect waves-light"
                                ><i class="mdi mdi-printer me-1"></i> Print</a
                            >
                            <a
                                href="#"
                                class="btn btn-info waves-effect waves-light"
                                >Submit</a
                            >
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
</template>

<script>
import moment from "moment";
// import SellerProfile from "../../../../../Components/SellerProfile.vue";
export default {
    components: {
        // SellerProfile,
    },

    mounted() {
        this.showLoader = true;
        this.getInvoiceCreation();

        // Receiving broadicasting
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                if(this.getInvoiceCreationView){
                    this.getInvoiceCreation();
                }
                // console.log(e);
            }
        );
    },

    data() {
        return {
            showLoader: false,
            objectData: [],
            // seller: "",
            // supplier: [],
            invoice: [],
            total: 0,
            // count: 0,
            // id: null,
            // sellerInfo: [],
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
            this.total = invoice.invoice_items.reduce((total, item) => {
                return total + item.price;
            }, 0);
            this.objectData.splice(0, this.objectData.length);
        },

        // async sellerName(invoice) {
        //     if (typeof invoice !== "undefined" && invoice !== null) {
        //         this.seller = invoice.seller.name;
        //         // this.supplier = invoice.seller;
        //     }
        // },

        // getSellerProfile(seller) {
        //     this.sellerInfo = seller;
        // },

        async getInvoiceCreation() {
            axios
                .post(this.getMainUrl + "accountant/getInvoiceCreation", {
                    id: this.getInvoiceCreationId,
                })
                .then((response) => {
                    if (response.data.data != null) {
                        // this.showLoader = false;
                        this.totalPrice(response.data.data);
                        // console.log(response.data.data)
                        this.invoice = response.data.data;
                        // this.sellerName(this.invoice);
                    }
                });
        },

        // async invoiceFormation(data) {
        //     this.objectData.push({
        //         toolName: data.tool.name,
        //         toolPrice: data.tool.price,
        //         toolCount: data.count,
        //     });
        //     // console.log(this.objectData);
        // },

        setInvoiceCreationView(id) {
            this.$store.dispatch("AccountantInvoiceModule/setInvoiceCreationView", id);
        },

        async verifyInvoiceCreationBishop() {
            axios
                .post(
                    // "http://127.0.0.1:8001/api/accountant/invoiceFromSchool",
                    this.getMainUrl + "accountant/verifyInvoiceCreationBishop",
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
        },
    },

    watch: {
        // id(newVal, oldVal) {
        //     if (newVal !== null) {
        //         this.getInvoiceView();
        //     }
        //     // console.log(
        //     //     `The message has changed from "${oldVal}" to "${newVal}"`
        //     // );
        // },
    },

    computed: {
        // getInvoiceId() {
        //     this.id =
        //         this.$store.getters["AccountantInvoiceModule/getInvoiceId"];
        //     return this.$store.getters["AccountantInvoiceModule/getInvoiceId"];
        // },

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

        getInvoiceCreationId() {
            return this.$store.getters["AccountantInvoiceModule/getInvoiceCreationId"];
        },

        getInvoiceCreationView() {
            return this.$store.getters[
                "AccountantInvoiceModule/getInvoiceCreationView"
            ];
        },
    },
};
</script>
