<template>
    <!-- <v-col>
        <v-row> -->
    <div class="card -mt-3 h-screen">
        <spinner v-if="showLoader"></spinner>

        <v-col v-else sm="12" md="12" class="mt-0 pt-0 bg-white">
            <!-- <v-card flat :dark="isDark"> -->
            <!-- <v-card elevation="0" data-app> -->

            <v-card-title class="px-0 pt-0">
                
                    <div class="pl-2 pt-1 text-sm uppercase">Schools</span></div>
                    <v-spacer></v-spacer>
                    <!-- <snackbar message="Task completed successfully"></snackbar> -->

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
                <hr class="bg-gray-200 mb-1 mt-0" />
            <!-- {{ $page.props.posts }} -->

            <v-data-table
                :headers="headers"
                :items="students"
                item-key="name"
                :search="search"
                class="elevation-1"
                :items-per-page="11"
            >
                <template v-slot:body="{ items, headers }">
                    <tbody>
                        <tr v-for="(item, idx, k) in items" :key="idx">
                            <td v-for="(header, key) in headers" :key="key">
                                <!-- <v-icon
                                    v-if="header.value == 'delete'"
                                    size="22"
                                    type="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#warning-alert-modal"
                                    @click="setIdForAction(items[idx]['id'])"
                                >
                                    mdi-delete
                                </v-icon> -->

                                <v-icon
                                    v-if="header.value == 'view'"
                                    size="22"
                                    @click="setInvoiceSchoolView(items[idx]['id'])"
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
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'id'"
                                    >{{ item[header.value] }}</span
                                >

                                <span
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'created_at'"
                                    >{{
                                        formattedDate(item[header.value])
                                    }}</span
                                >

                                <span
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'updated_at'"
                                    >{{
                                        formattedDate(item[header.value])
                                    }}</span
                                >

                                <span
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'name'"
                                    >{{ item[header.value] }}</span
                                >

                                <span
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'email'"
                                >
                                    {{ item[header.value] }}
                                </span>

                                <!-- <span
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'mobile'"
                                >
                                    {{ item[header.value] }}
                                </span> -->

                                <span
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'logo_path'"
                                >
                                    <!-- {{ item[header.value] }} -->
                                    <!-- {{ formatName(items[idx]['name']) }} -->

                                    <img
                                        class="h-8 w-8 rounded-full object-cover"
                                        :src="
                                            'https://ui-avatars.com/api/?name=' +
                                            formatName(items[idx]['name']) +
                                            '&color=7F9CF5&background=EBF4FF'
                                        "
                                        :alt="items[idx]['name']"
                                    />
                                </span>

                                <span
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'location'"
                                >
                                    {{ item[header.value] }}
                                </span>

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
import Spinner from "../../.././Components/SpinnerLoader.vue";
export default {
    components: {
        Spinner,
    },
    
    mounted() {
        this.showLoader = true;
        this.getSchools();

        // Receiving broadicasting
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                // console.log('abc');
                this.getSchools();
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
                    text: "Logo",
                    value: "logo_path",
                },
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
                // {
                //     text: "Mobile",
                //     value: "mobile",
                // },
                {
                    text: "Location",
                    value: "location",
                },
                { text: "Date", value: "created_at" },
                { text: "View", value: "view" },
            ],
            students: [],

            idForAction: null,
        };
    },

    computed: {
        contentFullWidthWhenSideBarHidesComputed() {
            return this.contentFullWidthWhenSideBarHides;
        },

        // getAddSchool() {
        //     return this.$store.getters["SecratarySchoolModule/getAddSchool"];
        // },

        getMainUrl() {
            return this.$store.getters["SystemConfigurationsModule/getMainUrl"];
        },
    },

    methods: {
        async setIdForAction(id) {
            console.log(id)
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
                return "Academic";
            } else if (role == 5) {
                return "Accountant";
            } else if (role == 6) {
                return "Procurement";
            }
        },

        formatName(name) {
            const nameArr = name.split(" ");
            const formattedNameArr = nameArr.map((name) => {
                return name.charAt(0).toUpperCase() + name.slice(1);
            });
            const formattedName = formattedNameArr.join("+");
            // this.formattedName = formattedName;
            return formattedName;
        },

        

        getSchools() {
            axios
                .get(this.getMainUrl + "secretary/getSchools")
                .then((response) => {
                    this.students = response.data.data;
                    this.showLoader = false;
                    // console.log(response.data.data)
                });
        },

        setInvoiceSchoolView(id) {
            this.$store.dispatch("AccountantInvoiceModule/setInvoiceSchoolView", id);
        },

        // setSchoolDashboards() {
        //     this.$store.dispatch("ProcurementToolModule/setSchoolDashboards");
        // },

        // setAddSchool() {
        //     this.$store.dispatch("SecretarySchoolDetailModule/setAddSchool");
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
