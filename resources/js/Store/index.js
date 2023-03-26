import Vue from "vue";
import Vuex from "vuex";
import createPersistedState from "vuex-persistedstate";

import rootMutations from './mutations';
import rootActions from './actions';
import rootGettes from './getters';

import invoiceModules from '../Store/invoice/index';
import AccountantInvoice from '../Store/Accountant/invoice/index';
import SecratarySchool from "../Store/secretary/school/index";
import SecretarySchoolDetail from "../Store/secretary/schoolDetail/index";

Vue.use(Vuex);

const counterModule = invoiceModules;

const AccountantInvoiceModule  = AccountantInvoice;

const SecratarySchoolModule = SecratarySchool;

const SecretarySchoolDetailModule = SecretarySchoolDetail;

const store = new Vuex.Store({
    plugins: [createPersistedState()],
    modules: {
        invoice: counterModule,

        AccountantInvoiceModule: AccountantInvoiceModule,

        SecratarySchoolModule: SecratarySchoolModule,

        SecretarySchoolDetailModule: SecretarySchoolDetailModule,
    },
    state: {
        posts: [],
        routes: [],
        areRoutesLoaded: false,
    },
    mutations: rootMutations,
    actions: rootActions,
    getters: rootGettes,
});

export default store;
