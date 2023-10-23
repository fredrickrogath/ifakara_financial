<template>
    <div data-app class="card p-0 h-screen -mt-3">
        <spinner v-if="showLoader"></spinner>
        <div v-else class="h-screen">
            <!-- <v-card elevation=""> -->

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
                                        @click="deleteChartOfAccounts()"
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

            <!-- Right modal content -->
            <div
                id="right-modal"
                class="modal fade"
                tabindex="-1"
                role="dialog"
                aria-hidden="true"
            >
                <div class="modal-dialog modal-sm modal-right bg-transparent">
                    <div class="modal-content">
                        <!-- <div class="modal-header border-0 bg-info">
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div> -->
                        <div class="modal-body bg-white">
                            <div class="">
                                <form @submit.prevent="addChartOfAccounts">
                                    <div class="mb-1 font-sm text-gray-600">
                                        <label
                                            for="example-email"
                                            class="form-label text-gray-500"
                                            >Transaction Type</label
                                        >
                                        <select
                                            id="example-email"
                                            v-model="account_type"
                                            class="form-select form-select-sm font-normal"
                                            aria-label=".form-select-sm example"
                                        >
                                            <option value="Income" selected>
                                                Income
                                            </option>
                                            <option value="Expense">
                                                Expenses
                                            </option>
                                            <!-- <option value="3">Three</option> -->
                                        </select>
                                    </div>

                                    <div class="text-sm mb-1 text-gray-600">
                                        <label
                                            for="example-email"
                                            class="form-label text-gray-500 font-normal"
                                            >Level 1</label
                                        >
                                        <input
                                            type="text"
                                            id="example-email"
                                            v-model="level1"
                                            class="form-control form-control-sm"
                                            placeholder="Tool Price"
                                        />
                                    </div>

                                    <div class="text-sm mb-1 text-gray-600">
                                        <label
                                            for="example-email"
                                            class="form-label text-gray-500 font-normal"
                                            >Level 2</label
                                        >
                                        <input
                                            type="text"
                                            id="example-email"
                                            v-model="level2"
                                            class="form-control form-control-sm"
                                            placeholder="Tool Price"
                                        />
                                    </div>

                                    <div class="text-sm mb-1 text-gray-600">
                                        <label
                                            for="example-email"
                                            class="form-label text-gray-500 font-normal"
                                            >Level 3</label
                                        >
                                        <input
                                            type="text"
                                            id="example-email"
                                            v-model="level3"
                                            class="form-control form-control-sm"
                                            placeholder="Tool Price"
                                        />
                                    </div>

                                    <div class="text-sm mb-1 text-gray-600">
                                        <label
                                            for="example-email"
                                            class="form-label text-gray-500 font-normal"
                                            >Name</label
                                        >
                                        <input
                                            type="text"
                                            id="example-email"
                                            v-model="name"
                                            class="form-control form-control-sm"
                                            placeholder="Tool Price"
                                        />
                                    </div>

                                    <div class="text-sm mb-1 text-gray-600">
                                        <label
                                            for="example-textarea"
                                            class="form-label text-gray-500 font-normal"
                                            >Description</label
                                        >
                                        <textarea
                                            class="form-control form-control-sm"
                                            id="example-textarea"
                                            rows="2"
                                            v-model="description"
                                        ></textarea>
                                    </div>

                                    <div class="text-sm text-gray-600">
                                        <label
                                            for="example-textarea"
                                            class="form-label text-gray-500 font-normal"
                                            >Note</label
                                        >
                                        <textarea
                                            class="form-control form-control-sm"
                                            id="example-textarea"
                                            rows="2"
                                            v-model="notes"
                                        ></textarea>
                                    </div>

                                    <div
                                        class="d-flex justify-content-between my-1 mt-2"
                                    >
                                        <button
                                            data-bs-dismiss="modal"
                                            type="submit"
                                            class="btn btn-secondary text-white btn-sm waves-effect waves-light"
                                        >
                                            Submit
                                        </button>
                                        <button
                                            data-bs-dismiss="modal"
                                            type="button"
                                            class="btn btn-danger btn-sm text-white waves-effect waves-light"
                                        >
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <!-- End of Right modal content -->
            <div class="bg-gray-100 h-3"></div>

            <v-card-title class="px-1 pt-0 my-1 pb-0">
                <div class="d-flex">
                    <div class="pl-2 pt-1 mr-4 text-sm uppercase">
                        Chart Of Accounts
                    </div>
                    <div
                        class="pl-2 pt-1 text-sm uppercase cursor-pointer bg-gray-200 pr-3 pb-1 rounded mr-2"
                        @click="showAccountForm = true"
                    >
                        <v-icon size="20" class="px-1">mdi-plus-circle</v-icon>
                        Add Account
                    </div>
                    <div
                        class="pl-2 pt-1 text-sm uppercase cursor-pointer bg-gray-200 pr-3 pb-1 rounded mr-2"
                        @click="showSubAccountForm = true"
                    >
                        <v-icon size="20" class="px-1">mdi-plus-circle</v-icon>
                        Add sub account
                    </div>

                    <div
                        class="pl-2 pt-1 text-sm uppercase cursor-pointer bg-gray-200 pr-3 pb-1 rounded mr-2"
                        @click="showPurposeForm = true"
                    >
                        <v-icon size="20" class="px-1">mdi-plus-circle</v-icon>
                        Add purpose
                    </div>

                    <div
                        class="pl-2 pt-1 text-sm uppercase cursor-pointer bg-gray-200 pr-3 pb-1 rounded mr-2"
                        @click="resetForms()"
                        v-show="
                            showAccountForm ||
                            showSubAccountForm ||
                            showPurposeForm
                        "
                    >
                        <v-icon size="20" class="px-1">mdi-close-circle</v-icon>
                        Close
                    </div>
                </div>

                <div class="mt-4 z-10">
                    <v-sheet
                        width="300"
                        class="mx-auto absolute top-14 left-12 bg-white"
                        v-show="showAccountForm"
                    >
                        <v-form fast-fail @submit.prevent="addAccount">
                            <v-text-field
                                v-model="account"
                                label="Account Name"
                                :rules="accountRules"
                            ></v-text-field>

                            <v-text-field
                                v-model="accountCode"
                                label="Account Code"
                                :rules="accountCodeRules"
                            ></v-text-field>

                            <select
                                class="form-select"
                                aria-label="Default select mb-4"
                                v-model="accountCategory"
                            >
                                <option selected>Open this select menu</option>
                                <option value="expense">Expenses</option>
                                <option value="income">Income</option>
                            </select>

                            <div>
                                <v-btn type="submit" block class="mt-2"
                                    >Submit</v-btn
                                >
                            </div>
                        </v-form>
                    </v-sheet>

                    <v-sheet
                        width="300"
                        class="mx-auto absolute top-14 left-12 bg-white"
                        v-show="showSubAccountForm"
                    >
                        <v-form fast-fail @submit.prevent="addSubAccount">
                            <v-text-field
                                v-model="subAccount"
                                label="Sub Account Name"
                                :rules="subAccountRules"
                            ></v-text-field>

                            <v-text-field
                                v-model="subAccountCode"
                                label="Sub Account Code"
                                :rules="subAccountCodeRules"
                            ></v-text-field>

                            <select
                                class="form-select"
                                aria-label="Default select mb-4"
                                v-model="accountIdFromSubAccount"
                            >
                                <option selected>Open this select menu</option>
                                <option
                                    :value="account.id"
                                    v-for="account in accounts"
                                    :key="account.id"
                                >
                                    {{ account.account_code }}
                                    {{ account.account_name }}
                                </option>
                            </select>

                            <div>
                                <v-btn type="submit" block class="mt-2"
                                    >Submit</v-btn
                                >
                            </div>
                        </v-form>
                    </v-sheet>

                    <v-sheet
                        width="300"
                        class="mx-auto absolute top-14 left-12 bg-white"
                        v-show="showPurposeForm"
                    >
                        <v-form fast-fail @submit.prevent="addPurpose">
                            <v-text-field
                                v-model="purposePrice"
                                label="Purpose Price"
                                :rules="purposePriceRules"
                            ></v-text-field>

                            <v-text-field
                                v-model="purposeCode"
                                label="Purpose Code"
                                :rules="purposeCodeRules"
                            ></v-text-field>

                            <v-text-field
                                v-model="purposeName"
                                label="Purpose Name"
                                :rules="purposeNameRules"
                            ></v-text-field>

                            <select
                                class="form-select"
                                aria-label="Default select mb-4"
                                v-model="accountIdFromPurpose"
                            >
                                <option selected>Open this select menu</option>
                                <option
                                    :value="account.id"
                                    v-for="account in accounts"
                                    :key="account.id"
                                >
                                    {{ account.account_code }}
                                    {{ account.account_name }}
                                </option>
                            </select>

                            <select
                                class="form-select"
                                aria-label="Default select mb-4"
                                v-model="subAccountIdFromPurpose"
                            >
                                <option selected>Open this select menu</option>
                                <option
                                    :value="subAccount.id"
                                    v-for="subAccount in subAccounts"
                                    :key="subAccounts.id"
                                >
                                    {{ subAccount.account_code }}
                                    {{ subAccount.account_name }}
                                </option>
                            </select>

                            <div>
                                <v-btn type="submit" block class="mt-2"
                                    >Submit</v-btn
                                >
                            </div>
                        </v-form>
                    </v-sheet>
                </div>

                <v-spacer></v-spacer>
                <div class="flex col-3 p-0 mr-2">
                    <input
                        v-model="search"
                        type="text"
                        class="form-control form-control-sm"
                    />
                    <v-icon size="20" class="px-1">mdi-magnify</v-icon>
                </div>

                <v-icon
                    type="button"
                    data-bs-toggle="modal"
                    data-bs-target="#right-modal"
                    class="ml-4 mt-2 mr-1"
                    size="22"
                    @click=""
                >
                    mdi-pen-plus
                </v-icon>
            </v-card-title>

            <div class="border-b border-6 mt-0 pt-0 border-gray-200"></div>

            <!-- <v-flex md6 style="overflow: auto"> -->
            <v-data-table
                :headers="headers"
                :items="chartOfAccounts"
                item-key="name"
                :search="search"
                class="elevation-1"
                :items-per-page="20"
                dense
            >
                <template v-slot:body="{ items, headers }">
                    <tbody>
                        <tr v-for="(item, idx, k) in items" :key="idx">
                            <td v-for="(header, key) in headers" :key="key">
                                <v-icon
                                    v-if="header.value == 'view'"
                                    size="22"
                                    @click="studentDetails(items[idx]['id'])"
                                >
                                    mdi-eye
                                </v-icon>

                                <span
                                    class="text-gray-600 font-semibold uppercase text-xs"
                                    v-else-if="header.value == 'created_at'"
                                    >{{
                                        formattedDate(item[header.value])
                                    }}</span
                                >

                                <span
                                    class="text-gray-600"
                                    v-else-if="header.value == 'updated_at'"
                                    >{{
                                        formattedDate(item[header.value])
                                    }}</span
                                >

                                <span
                                    class="text-gray-600 font-semibold uppercase text-xs"
                                    v-else-if="header.value == 'Account_code'"
                                    >{{ item[header.value] }}</span
                                >

                                <span
                                    class="text-gray-600 font-semibold uppercase text-xs"
                                    v-else-if="header.value == 'Account_name'"
                                >
                                    {{ item[header.value] }}
                                </span>

                                <span
                                    class="text-gray-600 font-semibold uppercase text-xs"
                                    v-else-if="header.value == 'Sub_accounts'"
                                >
                                    <span
                                        v-for="subAccount in item[header.value]"
                                        :key="subAccount.id"
                                    >
                                        <div>
                                            {{ subAccount["Account code"] }}
                                            <span class="mx-2"></span>
                                            {{ subAccount["Account name"] }}

                                            <span
                                                class="d-flex flex-column float-right ml-10"
                                            >
                                                <span class="pt-1"
                                                    >Purposes</span
                                                >
                                                <span
                                                    v-for="purpose in subAccount.Purposes"
                                                    :key="purpose.id"
                                                    class="d-flex flex-column"
                                                >
                                                    <span>
                                                        {{
                                                            purpose.Purpose_code
                                                        }}
                                                        <span
                                                            class="mx-1"
                                                        ></span>
                                                        {{
                                                            purpose.Purpose_name
                                                        }}
                                                        <span
                                                            class="mx-1"
                                                        ></span>

                                                        {{ purpose.Price }}
                                                    </span>
                                                </span>

                                                <!-- <span>hello</span> -->
                                            </span>
                                        </div>
                                    </span>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </template>
            </v-data-table>
            <!-- </v-flex> -->
        </div>
    </div>
</template>

<script>
import moment from "moment";
import Spinner from "./../.././Components/SpinnerLoader.vue";
export default {
    components: {
        Spinner,
    },

    mounted() {
        this.showLoader = true;

        this.getChartOfAccounts();

        this.getAccounts();

        this.getSubAccounts();

        // Receiving broadicasting
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                // console.log('abc');
                this.getChartOfAccounts();
                this.getAccounts();
                this.getSubAccounts();
            }
        );
    },

    data() {
        return {
            showLoader: true,
            showAccountForm: false,
            showSubAccountForm: false,
            showPurposeForm: false,

            accounts: [],
            subAccounts: [],
            subAccounts: [],

            accountIdFromSubAccount: null,

            accountIdFromPurpose: null,
            subAccountIdFromPurpose: null,

            search: "",
            chartOfAccounts: [],
            headers: [
                {
                    text: "Account Code",
                    align: "left",
                    sortable: false,
                    value: "Account_code",
                    width: "10%",
                },
                { text: "Account Name", value: "Account_name", width: "15%" },
                { text: "Sub Accounts", value: "Sub_accounts", width: "60%" },
                // { text: "Name", value: "name" },
                // { text: "Description", value: "description" },
                // { text: "Notes", value: "notes" },
                { text: "Date", value: "created_at", width: "15%" },
                // { text: "Action", value: "action" },
            ],

            account_type: "Income",
            level1: null,
            level2: null,
            level3: null,
            name: "",
            description: null,
            notes: null,

            idForAction: null,

            account: "",
            accountRules: [
                (value) => {
                    if (value?.length >= 3) return true;

                    return "Account must be at least of 3.";
                },
            ],

            accountCode: "",
            accountCodeRules: [
                (value) => {
                    if (value?.length >= 3) return true;

                    return "Account code must be at least of 3.";
                },
            ],

            accountCategory: "",

            subAccount: "",
            subAccountRules: [
                (value) => {
                    if (value?.length >= 3) return true;

                    return "Sub account must be at least 3 characters.";
                },
            ],
            subAccountCode: "",
            subAccountCodeRules: [
                (value) => {
                    if (/[^0-9]/.test(value)) return true;

                    return "sub account code should be digits";
                },
            ],

            purposePrice: "",
            purposePriceRules: [
                (value) => {
                    if (value >= 0) return true;

                    return "Purpose price must be at least 3 characters.";
                },
            ],

            purposeCode: "",
            purposeCodeRules: [
                (value) => {
                    if (value >= 0) return true;

                    return "Purpose code must be at least 3 characters.";
                },
            ],

            purposeName: "",
            purposeNameRules: [
                (value) => {
                    if (value >= 0) return true;

                    return "Purpose name must be at least 3 characters.";
                },
            ],
        };
        purposeCode;
    },
    methods: {
        resetForms() {
            this.showAccountForm = false;
            this.showSubAccountForm = false;
            this.showPurposeForm = false;
        },
        formattedPrice(amount) {
            return amount.toLocaleString("sw-TZ", {
                style: "currency",
                currency: "Tsh",
            });
        },

        formattedDate(date) {
            return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        },
        getChartOfAccounts() {
            // console.log("Loading next page");
            axios.get("/accountant/getChartOfAccounts").then((response) => {
                this.chartOfAccounts = response.data.data;
                this.showLoader = false;
                // console.log(response.data.data);
            });
        },

        async setIdForAction(id) {
            this.idForAction = id;
        },

        async addAccount() {
            if (this.account == "" || this.accountCode == "") {
                return false;
            }
            axios
                .post("/accountant/addAccount", {
                    account: this.account,
                    accountCode: this.accountCode,
                    accountCategory: this.accountCategory,
                })
                .then((response) => {
                    if (response.data.data) {
                        this.account = "";
                        this.accountCode = "";
                        this.accountCategory = response.data.data;
                        this.resetForms();
                        // console.log(response.data.data)
                    }
                });
        },

        async addSubAccount() {
            if (
                this.subAccount == "" ||
                this.subAccountCode == "" ||
                this.accountIdFromSubAccount == null
            ) {
                return false;
            }

            axios
                .post("/accountant/addSubAccount", {
                    subAccount: this.subAccount,
                    subAccountCode: this.subAccountCode,
                    accountIdFromSubAccount: this.accountIdFromSubAccount,
                })
                .then((response) => {
                    if (response.data.data) {
                        this.subAccount = "";
                        this.subAccountCode = "";
                        this.accountIdFromSubAccount = null;
                        this.resetForms();
                    }
                });
        },

        async addPurpose() {
            if (
                this.purposePrice == "" ||
                this.purposeName == "" ||
                this.purposeCode == "" ||
                this.accountIdFromPurpose == "" ||
                this.subAccountIdFromPurpose == null
            ) {
                return false;
            }
            // console.log(this.purposePrice, this.purposeCode , this.accountIdFromPurpose, this.subAccountIdFromPurpose)
            axios
                .post("/accountant/addPurpose", {
                    purposePrice: this.purposePrice,
                    purposeCode: this.purposeCode,
                    purposeName: this.purposeName,
                    accountIdFromPurpose: this.accountIdFromPurpose,
                    subAccountIdFromPurpose: this.subAccountIdFromPurpose,
                })
                .then((response) => {
                    if (response.data.data) {
                        this.purposePrice = "";
                        this.purposeCode = "";
                        this.accountIdFromPurpose = null;
                        this.subAccountIdFromPurpose = null;
                        this.resetForms();
                        // console.log(response.data.data)
                    }
                });
        },

        async getAccounts() {
            axios.get("/accountant/getAccounts").then((response) => {
                if (response.data.data) {
                    this.accounts = response.data.data;
                    // console.log(response.data.data)
                }
            });
        },

        async getSubAccounts() {
            axios.get("/accountant/getSubAccounts").then((response) => {
                if (response.data.data) {
                    this.subAccounts = response.data.data;
                    // console.log(response.data.data)
                }
            });
        },

        async addChartOfAccounts() {
            axios
                .post("/accountant/addChartOfAccounts", {
                    account_type: this.account_type,
                    level1: this.level1,
                    level2: this.level2,
                    level3: this.level3,
                    name: this.name,
                    description: this.description,
                    notes: this.notes,
                })
                .then((response) => {
                    this.account_type = "";
                    this.level1 = null;
                    this.level2 = null;
                    this.level3 = null;
                    this.name = "";
                    this.description = nul;
                    this.notes = null;
                });
            // handle response here
        },

        async updateChartOfAccounts(id, column, data) {
            axios
                .post("/accountant/updateChartOfAccount", {
                    id: id,
                    data: data,
                    column: column,
                })
                .then((response) => {
                    // this.students = response.data.data;
                    // this.amount = "";
                    // this.narration = "";
                    // console.log(response.data.data);
                });
            // handle response here
        },

        async deleteChartOfAccounts() {
            axios
                .post("/accountant/deleteChartOfAccounts", {
                    id: this.idForAction,
                })
                .then((response) => {
                    // this.students = response.data.data;
                    // console.log(response.data.data);
                });
            // handle response here
        },

        save(id, column, data) {
            this.updateChartOfAccounts(id, data, column);
            // console.log(id + " , " +data);
        },
        cancel() {},
        open() {},
        close() {},
    },

    computed: {
        //   formattedDate(date) {
        //     return moment(date).format('MMMM Do YYYY, h:mm:ss a');
        //   }
    },
};
</script>
