<template>
    <!-- <v-col>
        <v-row> -->
    <div>
        <spinner v-if="showLoader"></spinner>

        <v-col v-else sm="12" md="12" class="px-0 pt-0">

            
            <v-card-title class="px-0 pt-0 pb-1">
                    <div class="pl-2 pt-1 text-sm uppercase">Tools & Equipments <span class="d-none">{{ getSchoolId }}</span></div>
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
                :items="tools"
                item-key="name"
                :search="search"
                class="elevation-1"
            >
                <template v-slot:body="{ items, headers }">
                    <tbody>
                        <tr v-for="(item, idx, k) in items" :key="idx">
                            <td v-for="(header, key) in headers" :key="key">
                                <div
                                    v-if="
                                        header.value == 'action' ||
                                        header.value == 'starred'
                                    "
                                >
                                    <v-icon
                                        v-if="header.value == 'action'"
                                        size="22"
                                        type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#warning-alert-modal"
                                        @click="
                                            setIdForAction(items[idx]['id'])
                                        "
                                    >
                                        mdi-delete
                                    </v-icon>

                                    <v-icon
                                        v-if="header.value == 'starred'"
                                        size="22"
                                        :class="
                                            item[header.value]
                                                ? 'text-warning'
                                                : ''
                                        "
                                        @click="
                                            starredTools(
                                                items[idx]['id'],
                                                item[header.value],
                                                header.value
                                            )
                                        "
                                    >
                                        mdi-star
                                    </v-icon>
                                </div>

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
                                    v-else-if="header.value == 'id'"
                                >
                                    {{ encrypt() }}
                                    <!-- {{ item[header.value] }} -->
                                </span>

                                <v-edit-dialog
                                    v-else
                                    :return-value.sync="item[header.value]"
                                    @save="
                                        save(
                                            items[idx]['id'],
                                            item[header.value],
                                            header.value
                                        )
                                    "
                                    @cancel="cancel"
                                    @open="open"
                                    @close="close"
                                    large
                                >
                                    <span
                                        class="text-gray-600 font-semibold uppercase text-xs"
                                        :class="
                                            item[header.value] == null &&
                                            header.value !== 'action' // header.value == 'level1'
                                                ? 'bg-gray-100 italic rounded px-1'
                                                : ''
                                        "
                                        >{{
                                            item[header.value] !== null
                                                ? header.value == "price"
                                                    ? formattedPrice(
                                                          item[header.value]
                                                      )
                                                    : item[header.value]
                                                : "Empty"
                                        }}</span
                                    >

                                    <template v-slot:input>
                                        <v-text-field
                                            v-model="item[header.value]"
                                            label="Edit"
                                            single-line
                                        ></v-text-field>
                                    </template>
                                </v-edit-dialog>
                            </td>
                        </tr>
                    </tbody>
                </template>
            </v-data-table>

            <!-- <v-data-table
                mobile-breakpoint="0"
                :headers="headers"
                :items="tools"
                :search="search"
                class="bg-red-900"
            >
                <template v-slot:item.id="{ item }">
                    <span class="text-gray-600">{{ item.id }}</span>
                </template>

                <template v-slot:item.name="{ item }">
                    <span class="text-gray-600">{{
                        item.name
                    }}</span>
                </template>

                <template v-slot:item.price="{ item }">
                    <span class="text-gray-600">{{ formattedPrice(item.price) }}</span>
                </template>

                <template v-slot:item.count="{ item }">
                    <span class="text-gray-600">{{
                        item.count
                    }}</span>
                </template>

                <template v-slot:item.description="{ item }">
                    <span class="text-gray-600">{{ item.description }}</span>
                </template>

                <template v-slot:item.created_at="{ item }">
                    <span class="text-gray-600">{{
                        formattedDate(item.created_at)
                    }}</span>
                </template>

                <template v-slot:item.updated_at="{ item }">
                    <span class="text-gray-600">{{
                        formattedDate(item.updated_at)
                    }}</span>
                </template>
            </v-data-table> -->
            <!-- </v-card> -->
            <!-- </v-card> -->
        </v-col>
    </div>
    <!-- </v-row>
    </v-col> -->
</template>

<script>
import moment from "moment";
import Spinner from "./../../../.././Components/SpinnerLoader.vue";
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
        // this.getLegerEntries();
        this.getTools();

        // Receiving broadicasting
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                // console.log('abc');
                this.getTools();
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
                    text: "Code",
                    align: "start",
                    sortable: false,
                    value: "id",
                },
                {
                    text: "Name",
                    value: "name",
                },
                { text: "Price", value: "price", align: "center" },
                { text: "Count", value: "count" },
                { text: "Date", value: "created_at" },
                // { text: "Update", value: "updated_at" },
                // { text: "Starred", value: "starred" },
                { text: "Action", value: "action" },

                // { text: "Iron (%)", value: "iron" },
            ],
            // posts: this.$store.getters["getPosts"],
            // posts: null,
            tools: [],

            idForAction: null,

            schoolId: null,

            // url: "http://127.0.0.1:8000/api",
        };
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

    computed: {
        contentFullWidthWhenSideBarHidesComputed() {
            return this.contentFullWidthWhenSideBarHides;
        },

        getSchoolId() {
            this.schoolId =
                this.$store.getters["InternalAuditorSchoolModule/getSchoolId"];
            return this.$store.getters["InternalAuditorSchoolModule/getSchoolId"];
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
            // return moment(date).format("MMMM Do YYYY");
            return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        },

        encrypt() {
            let result = "";
            const characters =
                "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            for (let i = 0; i < 4; i++) {
                result += characters.charAt(
                    Math.floor(Math.random() * characters.length)
                );
            }
            return "wU" + result.slice(2);
        },

        getTools() {
            axios.post(this.getMainUrl + "procurement/getToolsForInternalAuditor", {
                school_id: this.schoolId,
                }).then((response) => {
                this.tools = response.data.data;
                this.showLoader = false;
                // console.log(response.data.data);
            });
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
