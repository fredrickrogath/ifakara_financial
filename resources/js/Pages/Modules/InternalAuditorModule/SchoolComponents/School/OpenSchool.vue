<template>
    <!-- <v-col>
        <v-row> -->
    <div>
        <!-- <v-col sm="12" md="12" lass="mt-0 pt-0 bg-info"> -->
        <!-- <v-card flat :dark="isDark"> -->
        <!-- <v-card elevation="0" data-app> -->
        <!-- {{ getAddStudent }} -->
        <!-- <add-staff v-if="getCurrentSchoolDetailTab == 'allStaffs'"></add-staff> -->
        <all-school-staffs
            v-if="getCurrentSchoolDetailTab == 'allStaffs'"
        ></all-school-staffs>
        <all-school-students
            v-if="getCurrentSchoolDetailTab == 'allStudents'"
        ></all-school-students>
        <all-invoices v-if="getCurrentSchoolDetailTab == 'invoices'"></all-invoices>
        <all-tools v-if="getCurrentSchoolDetailTab == 'tools'"></all-tools>
        <!-- </v-col> -->
    </div>
    <!-- </v-row>
    </v-col> -->
</template>

<script>
// import moment from "moment";
import Spinner from "../../../.././Components/SpinnerLoader.vue";

import AllSchoolStaffs from "./AllStaffs.vue";
import AllSchoolStudents from "./AllStudents.vue";
// import AllSchoolStudents from "./../../../SecretaryModule/SchoolComponents/School/AllStudents.vue";
import AllInvoices from "./AllInvoices.vue";
import AllTools from "./AllTools.vue";

// import AddStaff from ".././School/School/AddStaff.vue";
// import AddStudent from ".././School/School/AddStudent.vue";
export default {
    components: {
        Spinner,

        AllSchoolStaffs,
        AllSchoolStudents,
        AllInvoices,
        AllTools,

        // AddStaff,
        // AddStudent,
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
        // this.showLoader = true;
        // this.getSchools();

        // Receiving broadicasting
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                // console.log('abc');
                // this.getSchools();
            }
        );
    },

    data() {
        return {
            contentFullWidthWhenSideBarHides: 10,
            storagePath: window.location.origin + "/storage/systemFiles/",

            // showLoader: true,
            // search: "",
            // headers: [
            //     {
            //         text: "Name",
            //         align: "start",
            //         sortable: false,
            //         value: "name",
            //     },
            //     // {
            //     //     text: "Email",
            //     //     value: "email",
            //     // },
            //     // {
            //     //     text: "Department",
            //     //     value: "role",
            //     // },
            //     { text: "Date", value: "created_at" },
            //     { text: "View", value: "view" },
            // ],
            // students: [],

            // idForAction: null,
        };
    },

    computed: {
        contentFullWidthWhenSideBarHidesComputed() {
            return this.contentFullWidthWhenSideBarHides;
        },

        getCurrentSchoolDetailTab() {
            return this.$store.getters["InternalAuditorSchoolDetailsModule/getTab"];
        },

        getAddStudent() {
            return this.$store.getters[
                "InternalAuditorSchoolDetailsModule/getAddStudent"
            ];
        },

        getAddStaff() {
            return this.$store.getters[
                "InternalAuditorSchoolDetailsModule/getAddStaff"
            ];
        },
    },

    methods: {
        // async setIdForAction(id) {
        //     this.idForAction = id;
        // },
        // formattedPrice(amount) {
        //     return amount.toLocaleString("sw-TZ", {
        //         style: "currency",
        //         currency: "Tsh",
        //     });
        // },
        // formattedDate(date) {
        //     return moment(date).format("MMMM Do YYYY");
        //     // return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        // },
        // // totalPrice(item) {
        // //     return item.reduce((total, item) => {
        // //         return total + item.tool.price * item.count;
        // //     }, 0);
        // // },
        // department(role){
        //     if (role == 3){
        //         return 'Academic'
        //     }
        //     else if (role == 5){
        //         return 'Accountant'
        //     }
        //     else if (role == 6){
        //         return 'Procurement'
        //     }
        // },
        // getSchools() {
        //     axios.get("http://127.0.0.1:8000/api/secretary/getStaffs").then((response) => {
        //         this.students = response.data.data;
        //         this.showLoader = false;
        //         // console.log(response.data.data)
        //     });
        // },
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
        //         .post("/accountant/deleteInvoice", {
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
        //             console.log(response.data.data);
        //         });
        //     // handle response here
        // },
        // save(id, column, data) {
        //     this.updateTools(id, data, column);
        //     // console.log(id + " , " +data);
        // },
        // cancel() {},
        // open() {},
        // close() {},
    },
};
</script>

<!-- <script>
import moment from "moment";
export default {
    mounted() {
        this.showLoader = true;

        // Receiving broadicasting
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                // this.getInvoiceView();
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
        };
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

        async sellerName(invoice) {
            if (typeof invoice !== "undefined" && invoice !== null) {
                this.seller = invoice.seller.name;
                // this.supplier = invoice.seller;
            }
        },

        async getInvoiceView() {
            // axios
            //     .post("/accountant/getInvoiceView", {
            //         id: this.getInvoiceId,
            //     })
            //     .then((response) => {
            //         this.showLoader = false;
            //         this.totalPrice(response.data.data);
            //         this.invoice = response.data.data;
            //         this.sellerName(this.invoice);
            //     });
        },

        async invoiceFormation(data) {
            this.objectData.push({
                toolName: data.tool.name,
                toolPrice: data.tool.price,
                toolCount: data.count,
            });
            // console.log(this.objectData);
        },

        async acceptInvoice() {
            axios
                .post(
                    // "http://127.0.0.1:8001/api/accountant/invoiceFromSchool",
                    "/accountant/acceptInvoice",
                    {
                        id: this.invoice.id,
                        status: this.invoice.status,
                        // invoice: this.objectData,
                    }
                )
                .then((response) => {
                    this.showLoader = false;
                    // Clear objectData
                    console.log(response.data.data);
                    // console.log(this.objectData);
                });
        },
    },

    watch: {
        id(newVal, oldVal) {
            if (newVal !== null) {
                this.getInvoiceView();
            }
            console.log(
                `The message has changed from "${oldVal}" to "${newVal}"`
            );
        },
    },

    computed: {
        getInvoiceId() {console.log(this.id)
            this.id =
                this.$store.getters["SecratarySchoolModule/getSchoolId"];
            return this.$store.getters["SecratarySchoolModule/getSchoolId"];
        },

        formattedData() {
            return this.invoice.invoice_tool.map((data) => {
                return this.invoiceFormation(
                    data,
                    this.invoice.invoice_tool.length
                );
            });
        },
    },
};
</script> -->
