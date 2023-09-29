<template>
    <!-- <v-col>
        <v-row> -->
    <div class="mt-0 pt-0">
        <spinner v-if="showLoader"></spinner>

        <v-col v-else sm="12" md="12" class="mt-0 pt-0">
            <!-- <v-card flat :dark="isDark"> -->
            <!-- <v-card elevation="0" data-app> -->
            <v-card-title class="px-0 pt-0">
                <span class="text-sm uppercase">Staffs</span> <span class="d-none">{{ getSchoolId }} </span>
                <v-spacer></v-spacer>
                <v-text-field
                    v-model="search"
                    append-icon="mdi-magnify"
                    label="Search"
                    single-line
                    hide-details
                ></v-text-field>

                <!-- <div class="d-flex justify-content-between align-items-center">
                    <v-icon
                        v-if="!getAddStaff"
                        class="ml-5 pr-0 pt-3 mr-0"
                        size="22"
                        @click="setAddStaff()"
                    >
                        mdi-pen-plus
                    </v-icon>

                    <v-icon
                        v-else
                        class="ml-4 px-1 mt-1 mr-0 py-1"
                        size="22"
                        @click="setAddStaff()"
                    >
                        mdi-check
                    </v-icon>
                </div> -->
            </v-card-title>
            <!-- {{ $page.props.posts }} -->

            <v-data-table
                :headers="headers"
                :items="staffs"
                item-key="name"
                :search="search"
                class="elevation-1"
                dense
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

                                <v-icon
                                    v-if="header.value == 'view'"
                                    size="22"
                                    @click="setInvoiceView(items[idx]['id'])"
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
                                    class="text-gray-600 font-semibold uppercase text-xs"
                                    v-else-if="header.value == 'id'"
                                    >{{ item[header.value] }}</span
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
                                    v-else-if="header.value == 'updated_at'"
                                    >{{
                                        formattedDate(item[header.value])
                                    }}</span
                                >

                                <span
                                    class="text-gray-600 font-semibold uppercase text-xs"
                                    v-else-if="header.value == 'name'"
                                    >{{ item[header.value] }}</span
                                >

                                <span
                                    class="text-gray-600 font-semibold uppercase text-xs"
                                    v-else-if="header.value == 'email'"
                                >
                                    {{ item[header.value] }}
                                </span>

                                <span
                                    class="text-gray-600 font-semibold uppercase text-xs"
                                    v-else-if="header.value == 'role'"
                                >
                                    {{ department(item[header.value]) }}
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
import Spinner from "../../../.././Components/SpinnerLoader.vue";
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

        window.Echo.channel("school-staff-trigger-from-financial-secretary").listen(
            "Api\\Secretary\\SchoolEvent",
            (e) => {
                this.getStaffs();
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
                    text: "Name",
                    align: "start",
                    sortable: false,
                    value: "name",
                },
                {
                    text: "Email",
                    value: "email",
                },
                {
                    text: "Department",
                    value: "role",
                },
                { text: "Date", value: "created_at" },
            ],
            staffs: [],

            idForAction: null,

            schoolId: null,
        };
    },

    computed: {
        contentFullWidthWhenSideBarHidesComputed() {
            return this.contentFullWidthWhenSideBarHides;
        },

        getSchoolId() {
            this.schoolId =
                this.$store.getters["InternalAuditorSchoolModule/getSchoolId"];
            return this.$store.getters["InternalAuditorSchoolModule/getSchoolId"];
        },

        getAddStaff() {
            return this.$store.getters[
                "InternalAuditorSchoolDetailsModule/getAddStaff"
            ];
        },

        getMainUrl() {
            return this.$store.getters["SystemConfigurationsModule/getMainUrl"];
        },
    },

    watch: {
        schoolId(newVal, oldVal) {
            if (newVal !== null) {
                this.getStaffs();
            }
            // console.log(
            //     `The message has changed from "${oldVal}" to "${newVal}"`
            // );
        },
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

        // totalPrice(item) {
        //     return item.reduce((total, item) => {
        //         return total + item.tool.price * item.count;
        //     }, 0);
        // },

        department(role) {
            if (role == 3) {
                return "Academic Office";
            } else if (role == 5) {
                return "Accountant Office";
            } else if (role == 6) {
                return "Procurement Office";
            }else if (role == 1){
                return "Head Office";
            }else if (role == 8){
                return "Other Offices"
            }
        },

        setAddStaff() {
            this.$store.dispatch("InternalAuditorSchoolDetailsModule/setAddStaff");
        },

        // getStaffs() {
        //     axios.get("http://127.0.0.1:8000/api/secretary/getStaffs").then((response) => {
        //         this.students = response.data.data;
        //         this.showLoader = false;
        //         // console.log(response.data.data)
        //     });
        // },

        async getStaffs() {
            axios
                .post(this.getMainUrl + "secretary/getSchoolStaffs", {
                    school_id: this.schoolId,
                })
                .then((response) => {
                    this.staffs = response.data.data;
                    this.showLoader = false;
                    // this.students = response.data.data;
                    // this.amount = "";
                    // this.narration = "";
                    // console.log(response.data.data);
                });
            // handle response here
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
        //             // console.log(response.data.data);
        //         });
        //     // handle response here
        // },

        // setInvoiceView(id) {
        //     this.$store.dispatch("AccountantInvoiceModule/setInvoiceView", id);
        // },

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
