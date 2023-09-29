<template>
    <!-- <v-col>
        <v-row> -->
    <div>
        <spinner v-if="showLoader"></spinner>

        <!-- <v-col v-else sm="12" md="12"> -->

        <div v-else>
            <v-card-title class="px-0 pt-0 pb-1">
                    <div class="pl-2 pt-1 text-sm uppercase">Invoices<span class="d-none">{{ getSchoolId }}</span></div>
                    <v-spacer></v-spacer>

                    <div class="flex col-3 p-0 pt-1 mr-2">
                        <input
                        v-model="search"
                            type="text"
                            class="form-control form-control-sm"
                        />
                        <v-icon size="20" class="px-1"
                            >mdi-magnify</v-icon
                        >
                    </div>
                </v-card-title>
                <hr class="bg-gray-200 mb-1 mt-0" />
            <!-- {{ $page.props.posts }} -->

            <v-data-table
                :headers="determineHeader"
                :items="invoices"
                item-key="name"
                :search="search"
                class="elevation-1"
                :items-per-page="11"
                dense
            >
                <template v-slot:body="{ items, headers }">
                    <tbody>
                        <tr v-for="(item, idx, k) in items" :key="idx">
                            <td v-for="(header, key) in headers" :key="key">
                                <v-icon
                                    v-if="header.value == 'head' && $page.props.role === 'bishop'"
                                    :class="
                                        items[idx]['status_from_head'] ? 'text-danger' : ''
                                    "
                                    size="20"
                                >
                                    {{ items[idx]['status_from_head'] ? 'mdi-cancel' : 'mdi-check-circle' }}
                                </v-icon>

                                <v-icon
                                    v-if="header.value == 'finance' && $page.props.role !== 'bishop'"
                                    :class="
                                        !items[idx]['status_from_financial_bishop'] ? 'text-danger' : ''
                                    "
                                    size="20"
                                    @click="verifyInvoiceCreation(items[idx]['id'], items[idx]['status_from_financial_accountant'])"
                                >
                                    {{ items[idx]['status_from_financial_accountant'] ? 'mdi-cancel' : 'mdi-check-circle' }}
                                </v-icon>

                                <v-icon
                                    v-if="header.text == 'Approval' && $page.props.role === 'bishop'"
                                    :class="
                                        items[idx]['status_from_financial_bishop'] ? 'text-danger' : ''
                                    "
                                    size="20"
                                    @click="verifyInvoiceCreationBishop(items[idx]['id'], items[idx]['status_from_financial_bishop'])"
                                >
                                    {{ items[idx]['status_from_financial_bishop'] ? 'mdi-cancel' : 'mdi-check-circle' }}
                                </v-icon>

                                <v-icon
                                    v-if="header.value == 'finance' && $page.props.role === 'bishop'"
                                    :class="
                                        !items[idx]['status_from_financial_accountant'] ? 'text-danger' : ''
                                    "
                                    size="20"
                                >
                                    {{ !items[idx]['status_from_financial_accountant'] ? 'mdi-cancel' : 'mdi-check-circle' }}
                                </v-icon>

                                <v-icon
                                    v-if="header.value == 'view'"
                                    size="22"
                                    @click="setInvoiceCreationView(items[idx]['id'])"
                                >
                                    mdi-eye
                                </v-icon>

                                <v-icon
                                    v-if="header.value == 'starred'"
                                    size="22"
                                    :class="
                                        item[header.value] ? 'text-warning' : ''
                                    "
                                    @click="
                                        starredInvoice(
                                            items[idx]['id'],
                                            item[header.value],
                                            header.value
                                        )
                                    "
                                >
                                    mdi-star
                                </v-icon>

                                <span
                                    class="text-green-500 font-semibold uppercase text-xs"
                                    v-else-if="header.value == 'total'"
                                    >{{
                                        formattedPrice(item[header.value])
                                    }}</span
                                >

                                <span
                                    class="text-gray-600 font-semibold uppercase text-xs"
                                    v-else-if="header.value == 'created_at'"
                                    >{{
                                        formattedDate(item[header.value])
                                    }}</span
                                >

                                <span
                                    class="text-gray-600 font-semibold uppercase text-xs"
                                    v-else-if="header.value == 'invoice_items'"
                                >
                                    <div v-for="item in item[header.value]">
                                        <span> Name {{ item.name }} </span>

                                        <v-icon size="20" class="mb-1 px-1"
                                            >mdi-hand-pointing-right</v-icon
                                        >

                                        <span>
                                            Price
                                            <span class="text-green-500">{{
                                                formattedPrice(item.price)
                                            }}</span>
                                        </span>

                                        <!-- <v-icon size="20" class="mb-1 px-1"
                                            >mdi-hand-pointing-right</v-icon
                                        >

                                        <span>
                                            Description {{ item.description }}
                                        </span> -->
                                    </div>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </template>
            </v-data-table>
        </div>

        <!-- </v-col> -->
    </div>
    <!-- </v-row>
    </v-col> -->
</template>

<script>
import moment from "moment";
import Spinner from "../../../../Components/SpinnerLoader.vue";
// import Snackbar from "../../../../Components/Snackbar";
import SellerProfile from "../../../../Components/SellerProfile.vue";
export default {
    components: {
        Spinner,
        // Snackbar,
        SellerProfile,
    },

    props: {
        // postsData: {
        // type: Number,
        // default: [],
        // default(rawProps) {
        //     return { message: "hello" };
        // },
        // DATA TYPES
        // String
        // Number
        // Boolean
        // Array
        // Object
        // Date
        // Function
        // Symbol
        // disabled: [Boolean, Number]
        // },
    },

    mounted() {
        this.showLoader = true;
        this.getInvoices();

        // Receiving broadicasting
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                // console.log('abc');
                this.getInvoices();
            }
        );
    },

    data() {
        return {
            contentFullWidthWhenSideBarHides: 10,
            storagePath: window.location.origin + "/storage/systemFiles/",

            showLoader: true,
            search: "",
            headers: [
                {
                    text: "Total",
                    value: "total",
                },
                {
                    text: "Items",
                    value: "invoice_items",
                },
                { text: "Date", value: "created_at" },
                { text: "Head", value: "head" },
                { text: "Finance", value: "finance" },
            ],

            headersBishop: [
                {
                    text: "Total",
                    value: "total",
                },
                {
                    text: "Items",
                    value: "invoice_items",
                },
                { text: "Head", value: "head" },
                { text: "Finance", value: "finance" },
                { text: "Approval", value: "bishop" },
                { text: "Date", value: "created_at" },
                { text: "View", value: "view" },
            ],

            invoices: [],

            idForAction: null,

            sellerInfo: [],

            schoolId: null,
        };
    },

    computed: {
        contentFullWidthWhenSideBarHidesComputed() {
            return this.contentFullWidthWhenSideBarHides;
        },

        getSchoolId() {
            this.schoolId = this.$store.getters["AccountantInvoiceModule/getSchoolId"];
            return this.$store.getters["AccountantInvoiceModule/getSchoolId"];
        },

        getMainUrl() {
            return this.$store.getters["SystemConfigurationsModule/getMainUrl"];
        },

        determineHeader(){
            return this.$page.props.role != 'bishop' ? this.headers : this.headersBishop;
        }
    },

    watch: {
    // schoolId(newVal, oldValue) {
    //     if (newVal !== null && newVal !== oldValue) {
    //         console.log(newVal + ' ' + oldValue)
    //             this.getInvoices();
    //         }
    //         // console.log(
    //         //     `The message has changed from "${oldVal}" to "${newVal}"`
    //         // );
    // },
  },

    methods: {
        async setIdForAction(id) {
            this.idForAction = id;
        },

        formattedPrice(amount) {
            return amount.toLocaleString("sw-TZ", {
                style: "currency",
                currency: "Tsh",
            });
        },

        formattedDate(date) {
            // return moment(date).format("MMMM Do YYYY");
            return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        },

        totalPrice(item) {
            return item.reduce((total, item) => {
                return total + item.tool.price * item.count;
            }, 0);
        },

        getSellerProfile(seller) {
            this.sellerInfo = seller;
        },

        setInvoiceCreationView(id) {
            this.$store.dispatch("AccountantInvoiceModule/setInvoiceCreationView", id);
        },
        
        async verifyInvoiceCreation(id , status_from_financial_accountant) {
            axios
                .post(this.getMainUrl + "accountant/verifyInvoiceCreation", {
                    id: id,
                    status_from_financial_accountant: status_from_financial_accountant
                })
                .then((response) => {
                    // this.students = response.data.data;
                    // console.log(response.data.data);
                });
            // handle response here
        },

        async verifyInvoiceCreationBishop(id , status_from_financial_bishop) {
            axios
                .post(this.getMainUrl + "accountant/verifyInvoiceCreationBishop", {
                    id: id,
                    status_from_financial_bishop: status_from_financial_bishop
                })
                .then((response) => {
                    // this.students = response.data.data;
                    // console.log(response.data.data);
                });
            // handle response here
        },

        getInvoices() {
            if(this.$page.props.role == 'bishop'){
                axios
                .post(this.getMainUrl + "accountant/getInvoicesCreationAll", {
                    school_id: this.getSchoolId,
                })
                .then((response) => {
                    this.invoices = response.data.data;
                    this.showLoader = false;
                    // console.log(response.data.data)
                });
            }
            
            if(this.$page.props.role != 'bishop'){
                axios
                .post(this.getMainUrl + "accountant/getInvoicesCreation", {
                    school_id: this.getSchoolId,
                })
                .then((response) => {
                    this.invoices = response.data.data;
                    this.showLoader = false;
                    // console.log(response.data.data)
                });
        }},

        // async updateTools(id, column, data) {
        //     axios
        //         .post("/accountant/updateTools", {
        //             id: id,
        //             data: data,
        //             column: column,
        //         })
        //         .then((response) => {
        //             // this.students = response.data.data;
        //             // this.amount = "";
        //             // this.narration = "";
        //             // console.log(response.data.data);
        //         });
        //     // handle response here
        // },

        // async deleteInvoice() {
        //     axios
        //         .post("/accountant/deleteCreateInvoice", {
        //             id: this.idForAction,
        //         })
        //         .then((response) => {
        //             // this.students = response.data.data;
        //             // console.log(response.data.data);
        //         });
        //     // handle response here
        // },

        // async starredInvoice(id,data ,column) {
        //     axios
        //         .post("/accountant/starredInvoice", {
        //             id: id,
        //             data: data,
        //             column: column,
        //         })
        //         .then((response) => {
        //             // this.students = response.data.data;
        //             // this.amount = "";
        //             // this.narration = "";
        //             // console.log(response.data.data);
        //         });
        //     // handle response here
        // },

        setInvoiceView(id) {
            this.$store.dispatch("AccountantInvoiceModule/setInvoiceView", id);
        },

        save(id, column, data) {
            this.updateTools(id, data, column);
            // console.log(id + " , " +data);
        },
        cancel() {},
        open() {},
        close() {},
    },
};
</script>
