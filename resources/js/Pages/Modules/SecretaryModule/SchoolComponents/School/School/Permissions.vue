<template>
    <!-- <v-col>
        <v-row> -->
    <div>
        <spinner v-if="showLoader"></spinner>

        <v-col v-else sm="12" md="12" class="mt-0 pt-0">
        
            <v-card-title class="px-0 pt-0">
                Permissions
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
                        v-if="!getAddSchool"
                        class="ml-5 pr-0 pt-3 mr-0"
                        size="22"
                        @click="setAddSchool()"
                    >
                        mdi-pen-plus
                    </v-icon>

                    <v-icon
                        v-else
                        class="ml-4 px-1 mt-1 mr-0 py-1"
                        size="22"
                        @click="setAddSchool()"
                    >
                        mdi-check
                    </v-icon>
                </div> -->
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

                                <v-icon
                                    v-if="header.value == 'financial_secreatary_permission'"
                                    size="22"
                                    :color="!item[header.value].financial_secreatary_permission ? 'bg-red-400' : 'bg-green-400'"
                                    @click="alterPermission(items[idx]['id'], items[idx].object.id, items[idx].object_type, item[header.value].financial_secreatary_permission)"
                                >
                                    {{!item[header.value].financial_secreatary_permission ? 'mdi-lock' : 'mdi-lock-open-variant'}}
                                </v-icon>
                                
                                <v-icon
                                    v-if="header.value == 'comment'"
                                    size="22"
                                    :class="
                                        item[header.value] ? 'text-warning' : ''
                                    "
                                    @click="
                                        // starredInvoice(
                                        //     items[idx]['id'],
                                        //     item[header.value],
                                        //     header.value
                                        // );
                                         setCommentView(items[idx]['id']);
                                    "
                                >
                                    mdi-chat-processing
                                </v-icon>
                                <span
                                    class="text-gray-600"
                                    v-else-if="header.value == 'from_role'"
                                    >{{ item[header.value] }}
                                    
                                    </span
                                >

                                <span
                                    class="text-gray-600"
                                    v-else-if="header.value == 'created_at'"
                                    >{{
                                        formattedDate(item[header.value])
                                    }}</span
                                >

                                <span
                                    class="text-gray-600"
                                    v-else-if="header.value == 'to_role'"
                                    >{{
                                        item[header.value]
                                    }}</span
                                >

                                <span
                                    class="text-gray-600"
                                    v-else-if="header.value == 'object'"
                                    >{{ item[header.value].first_name }}  {{ item[header.value].last_name }}</span
                                >

                                <span
                                    class="text-gray-600"
                                    v-else-if="header.value == 'object_type'"
                                >
                                    {{ item[header.value] }}
                                </span>

                                <!-- <span
                                    class="text-gray-600"
                                    v-else-if="header.value == 'mobile'"
                                >
                                    {{ item[header.value] }}
                                </span> -->

                                <!-- <span
                                    class="text-gray-600"
                                    v-else-if="header.value == 'location'"
                                >
                                    {{ item[header.value] }}
                                </span> -->

                                <!-- <span
                                    class="text-gray-600"
                                    v-else-if="header.value == 'role'"
                                >
                                    {{ department(item[header.value]) }}
                                </span> -->
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
import Spinner from "../../../../.././Components/SpinnerLoader.vue";
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
        this.getSchoolPermissions();

        // Receiving broadicasting
        window.Echo.channel("academic-trigger-student-permission").listen(
            "Api\\Secretary\\Student\\PermissionEvent",
            (e) => {
                this.getSchoolPermissions();
            }
        );

        // window.Echo.channel("academic-trigger-add-student").listen(
        //     "Academic\\StudentEvent",
        //     (e) => {
        //         this.getSchoolPermissions();
        //     }
        // );
    },

    data() {
        return {
            contentFullWidthWhenSideBarHides: 10,
            storagePath: window.location.origin + "/storage/systemFiles/",

            showLoader: true,
            search: "",
            headers: [
                {
                    text: "From",
                    align: "start",
                    sortable: false,
                    value: "from_role",
                },
                {
                    text: "To",
                    value: "to_role",
                },
                {
                    text: "Object Type",
                    value: "object_type",
                },
                {
                    text: "Object Name",
                    value: "object",
                },
                { text: "Date", value: "created_at" },
                { text: "Action", value: "financial_secreatary_permission" },
                { text: "Action", value: "comment" },
            ],
            students: [],

            idForAction: null,
        };
    },

    computed: {
        contentFullWidthWhenSideBarHidesComputed() {
            return this.contentFullWidthWhenSideBarHides;
        },

        getAddSchool() {
            return this.$store.getters["SecratarySchoolModule/getAddSchool"];
        },

        getMainUrl() {
            return this.$store.getters["SystemConfigurationsModule/getMainUrl"];
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
            return moment(date).format("MMMM Do YYYY");
            // return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        },

        // totalPrice(item) {
        //     return item.reduce((total, item) => {
        //         return total + item.tool.price * item.count;
        //     }, 0);
        // },

        department(role) {
            if (role == 3) {
                return "Academic";
            } else if (role == 5) {
                return "Accountant";
            } else if (role == 6) {
                return "Procurement";
            }
        },

        setCommentView(id) {
            this.$store.dispatch("SecratarySchoolModule/setNotificationId", id);
            this.$store.dispatch("SecratarySchoolModule/setCommentView");
        },

        getSchoolPermissions() {
            axios
                .get(this.getMainUrl + "secretary/getSchoolPermissions")
                .then((response) => {
                    this.students = response.data.data;
                    this.showLoader = false;
                    console.log(response.data.data)
                });
        },

        async alterPermission(id, object_id, object_type, permission) {
            // console.log(id, object_id, object_type, permission)
            axios
                .post(this.getMainUrl + "secretary/alterPermission", {
                    id: id,
                    object_id: object_id,
                    object_type: object_type,
                    permission: permission,
                })
                .then((response) => {
                    // this.students = response.data.data;
                    // this.amount = "";
                    // this.narration = "";
                    // this.getSchoolPermissions();
                    // console.log(response.data.data);
                });
            // handle response here
        },

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

        setSchoolView(id) {
            this.$store.dispatch("SecratarySchoolModule/setSchoolView", id);
        },

        setAddSchool() {
            this.$store.dispatch("SecretarySchoolDetailModule/setAddSchool");
        },
        
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
