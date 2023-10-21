<template>
    <!-- <v-col>
        <v-row> -->
    <div>
        <spinner v-if="showLoader"></spinner>
            <v-card-title class="px-0 pt-0 pb-1">
                    <div class="pl-2 pt-1 text-sm uppercase">Posts</div>
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
                :headers="headers"
                :items="students"
                item-key="name"
                :search="search"
                class="elevation-1"
                dense
                :items-per-page="11"
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
                                    @click="setPostView(items[idx]['id'])"
                                >
                                    mdi-eye
                                </v-icon>
                                <span
                                    class="text-gray-500 font-semibold uppercase text-xs"
                                    v-else-if="header.value == 'age_range'"
                                    >{{ item[header.value] }}</span
                                >

                                <span
                                    class="text-gray-500 font-semibold uppercase text-xs"
                                    v-else-if="header.value == 'gender'"
                                    >{{ item[header.value] }}</span
                                >

                                <span
                                    class="text-gray-500 font-semibold uppercase text-xs"
                                    v-else-if="header.value == 'vacant_name'"
                                    >{{ item[header.value] }}</span
                                >

                                <span
                                    class="text-gray-500 font-semibold uppercase text-xs"
                                    v-else-if="header.value == 'education_level_id'"
                                    >{{
                                        item[header.value]
                                    }}</span
                                >

                                <span
                                    class="text-gray-500 font-semibold uppercase text-xs"
                                    v-else-if="header.value == 'end_date'"
                                    >{{
                                        item[header.value]
                                    }}</span
                                >

                                <span
                                    class="text-gray-500 font-semibold uppercase text-xs"
                                    v-else-if="
                                        header.value == 'year_experience'
                                    "
                                    >{{
                                        item[header.value]
                                    }}</span
                                >

                                    <span
                                        class="text-gray-500 font-semibold uppercase text-xs"
                                        v-else-if="header.value == 'institution_name'"
                                        >{{ item[header.value] }}</span
                                    >

                                <span
                                    class="text-gray-500 font-semibold uppercase text-xs"
                                    v-else-if="header.value == 'email'"
                                >
                                    {{ item[header.value] }}
                                </span>

                                <span
                                    class="text-gray-500 font-semibold uppercase text-xs"
                                    v-else-if="header.value == 'application_date'"
                                    >{{ item[header.value] }}</span
                                >
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

        // window.Echo.channel(
        //     "school-staff-trigger-from-financial-secretary"
        // ).listen("Api\\Secretary\\StaffEvent", (e) => {
        //     this.getStaffs();
        // });
    },

    data() {
        return {
            contentFullWidthWhenSideBarHides: 10,
            storagePath: window.location.origin + "/storage/",

            showLoader: true,
            search: "",
            headers: [
                {
                    text: "Institution Name",
                    align: "start",
                    sortable: false,
                    value: "institution_name",
                },
                {
                    text: "Vacant Name",
                    value: "vacant_name",
                },
                {
                    text: "Education Level",
                    value: "education_level_id",
                },
                {
                    text: "Age",
                    value: "age_range",
                },
                {
                    text: "Experience",
                    value: "year_experience",
                },
                { text: "Application Date", value: "application_date" },
                { text: "End Date", value: "end_date" },
                // {
                //     text: "View",
                //     value: "view",
                // },
            ],
            students: [],

            idForAction: null,
        };
    },

    computed: {
    },

    methods: {
        async setIdForAction(id) {
            this.idForAction = id;
        },

        formattedDate(date) {
            return moment(date).format("MMMM Do YYYY");
            // return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        },

        getStaffs() {
            axios
                .get("http://35.239.9.62/api/v1/posts")
                .then((response) => {
                    this.students = response.data.posts;
                    this.showLoader = false;
                    // console.log(response.data.applicants)
                });
        },

        setPostView(id) {
            this.$store.dispatch("SecretaryPortalModule/setPostView", id);
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
