<template>
    <!-- <v-col>
        <v-row> -->
    <div>
        <spinner v-if="showLoader"></spinner>

        <v-col v-else sm="12" md="12" class="px-0 pt-0">
            <!-- <v-card flat :dark="isDark"> -->
            <!-- <v-card elevation="0" data-app> -->

            <!-- Warning Alert Modal -->
            <div
                id="warning-alert-modal"
                class="modal fade"
                tabindex="-1"
                role="dialog"
                aria-hidden="true"
            >
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-body p-2">
                            <div class="text-center">
                                <i
                                    class="dripicons-warning h1 text-warning"
                                ></i>
                                <h4 class="mt-2 text-gray-500">
                                    Are you sure you want to delete this data ?
                                </h4>
                                <p class="mt-3">
                                    Do not worry, deleting this can be restored
                                    in your trash within 30 days.
                                </p>
                                <div class="flex justify-around">
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-warning my-1 text-white"
                                        data-bs-dismiss="modal"
                                        @click="deleteInvoice()"
                                    >
                                        Continue
                                    </button>
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-danger my-1 text-white"
                                        data-bs-dismiss="modal"
                                    >
                                        cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <v-card-title class="px-2 pt-0">
                Staffs
                <v-spacer></v-spacer>
                <v-text-field
                    v-model="search"
                    append-icon="mdi-magnify"
                    label="Search"
                    single-line
                    hide-details
                ></v-text-field>
            </v-card-title>

            <!-- {{ $page.props.posts }} -->

            <v-data-table
                :headers="headers"
                :items="students"
                item-key="name"
                :search="search"
                class="elevation-1"
            >
                <template v-slot:body="{ items, headers }">
                    <tbody>
                        <tr v-for="(item, idx, k) in items" :key="idx">
                            <td v-for="(header, key) in headers" :key="key">
                                <v-icon
                                    v-if="header.value == 'delete'"
                                    size="22"
                                    type="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#warning-alert-modal"
                                    @click="setIdForAction(items[idx]['id'])"
                                >
                                    mdi-delete
                                </v-icon>

                                <!-- <v-icon
                                    v-if="header.value == 'view'"
                                    size="22"
                                    @click="setInvoiceView(items[idx]['id'])"
                                >
                                    mdi-eye
                                </v-icon> -->

                                <!-- <v-icon
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
                                </v-icon> -->

                                <!-- <span
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'basic_salary'"
                                    >{{ item[header.value] }}</span
                                > -->

                                <span
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'phone'"
                                    >{{ item[header.value] }}</span
                                >

                                <span
                                    class="text-gray-600 italic font-semibold uppercase"
                                    v-else-if="header.value == 'gender'"
                                    >{{ item[header.value] }}</span
                                >

                                <span
                                    class="text-gray-600 italic font-semibold uppercase"
                                    v-else-if="header.value == 'vacant_name'"
                                    >{{ item[header.value] }}</span
                                >

                                <span
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'basic_salary'"
                                    >{{
                                        formattedPrice(item[header.value])
                                    }}</span
                                >

                                <span
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'end_date'"
                                    >{{
                                        formattedDate(item[header.value])
                                    }}</span
                                >

                                <span
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="
                                        header.value == 'allounce_salary'
                                    "
                                    >{{
                                        formattedPrice(item[header.value])
                                    }}</span
                                >

                                <span
                                    class="text-gray-600 italic font-semibold uppercase"
                                    v-else-if="header.value == 'fname'"
                                    >{{
                                        item["fname"] +
                                        " " +
                                        item["mname"] +
                                        " " +
                                        item["lname"]
                                    }}</span
                                >

                                <span
                                    class="text-gray-600 italic font-semibold lowercase"
                                    v-else-if="header.value == 'email'"
                                >
                                    {{ item[header.value] }}
                                </span>

                                <span
                                    class="text-gray-600 italic font-semibold uppercase"
                                    v-else-if="
                                        header.value == 'institution_name'
                                    "
                                >
                                    {{ item[header.value] }}
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </template>
            </v-data-table>
        </v-col>
    </div>
    <!-- </v-row>
    </v-col> -->
</template>

<script>
import moment from "moment";
import Spinner from "../../.././Components/SpinnerLoader.vue";
export default {
    components: {
        Spinner,
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
        this.getStaffs();

        // Receiving broadicasting
        // window.Echo.channel("EventTriggered").listen(
        //     "NewPostPublished",
        //     (e) => {
        //         // console.log('abc');
        //         this.getStaffs();
        //     }
        // );

        window.Echo.channel(
            "school-staff-trigger-from-financial-secretary"
        ).listen("Api\\Secretary\\StaffEvent", (e) => {
            this.getStaffs();
        });
    },

    data() {
        return {
            contentFullWidthWhenSideBarHides: 10,
            storagePath: window.location.origin + "/storage/systemFiles/",

            showLoader: true,
            search: "",
            headers: [
                {
                    text: "Name",
                    align: "start",
                    sortable: false,
                    value: "fname",
                },
                {
                    text: "Email",
                    value: "email",
                },
                {
                    text: "Phone",
                    value: "phone",
                },
                {
                    text: "Gender",
                    value: "gender",
                },
                {
                    text: "Basic Salary",
                    value: "basic_salary",
                },
                {
                    text: "Allowance Salary",
                    value: "allounce_salary",
                },
                {
                    text: "Vacant",
                    value: "vacant_name",
                },
                {
                    text: "Institution",
                    value: "institution_name",
                },
                { text: "End Date", value: "end_date" },
            ],
            students: [],

            idForAction: null,
        };
    },

    computed: {
        contentFullWidthWhenSideBarHidesComputed() {
            return this.contentFullWidthWhenSideBarHides;
        },

        getMainUrl() {
            return this.$store.getters["SystemConfigurationsModule/getMainUrl"];
        },
    },

    methods: {
        async setIdForAction(id) {
            this.idForAction = id;
        },

        // formattedPrice(amount) {
        //     return amount.toLocaleString("sw-TZ", {
        //         style: "currency",
        //         currency: "Tsh",
        //     });
        // },

        formattedPrice(priceString) {
            // Assuming the priceString is in plain numeric format (e.g., "300000")
            const price = parseFloat(priceString);
            if (!isNaN(price)) {
                return new Intl.NumberFormat("en-US", {
                    style: "currency",
                    currency: "Tsh", // Change to your desired currency code
                    minimumFractionDigits: 2, // Specify the number of decimal places
                }).format(price);
            }
            return priceString; // Return the original string if parsing fails
        },

        formattedDate(date) {
            return moment(date).format("MMMM Do YYYY");
            // return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        },

        // totalPrice(item) {
        //     return item.reduce((total, item) => {
        //         return total + item.tool.price * item.count;
        //     }, 0);
        // },

        department(role) {
            if (role == 1) {
                return "Head Office";
            } else if (role == 3) {
                return "Academic Office";
            } else if (role == 5) {
                return "Accountant Office";
            } else if (role == 6) {
                return "Procurement Office";
            } else if (role == 8) {
                return "Other Office";
            }
        },

        getStaffs() {
            axios
                .get("http://35.239.9.62/api/v1/hr/staff/")
                .then((response) => {
                    this.students = response.data.staffs;
                    this.showLoader = false;
                    // console.log(response.data.staffs)
                });
        },

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

        // async starredInvoice(id, data, column) {
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
