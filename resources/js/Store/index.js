import Vue from "vue";
import Vuex from "vuex";
import createPersistedState from "vuex-persistedstate";

import rootMutations from './mutations';
import rootActions from './actions';
import rootGettes from './getters';

import invoiceModules from '../Store/invoice/index';
import AccountantInvoice from '../Store/Accountant/invoice/index';
import AccountantUpload from "../Store/accountant/Upload/index";
import AccountantReport from "../Store/accountant/Report/index";
import SecratarySchool from "../Store/secretary/school/index";
import SecretarySchoolDetail from "../Store/secretary/schoolDetail/index";


import Procurementinvoice from '../Store/Procurement/invoice/index';
import Procurementtool from '../Store/Procurement/tool/index';
import ProcurementUpload from '../Store/Procurement/Upload/index';
import ProcurementReport from '../Store/procurement/Report/index';

import InternalAuditorSchoolDetails from '../Store/internal_auditor/schoolDetail/index';
import InternalAuditorSchool from '../Store/internal_auditor/school/index';

import SystemConfigurations from "../Store/systemConfigurations/config/index";

Vue.use(Vuex);

const counterModule = invoiceModules;

const AccountantInvoiceModule  = AccountantInvoice;

const AccountantReportModule = AccountantReport;

const AccountantUploadModule = AccountantUpload;

const SecratarySchoolModule = SecratarySchool;

const SecretarySchoolDetailModule = SecretarySchoolDetail;

const ProcurementInvoiceModule = Procurementinvoice;

const ProcurementToolModule = Procurementtool;

const ProcurementUploadModule = ProcurementUpload;

const ProcurementReportModule = ProcurementReport;

const InternalAuditorSchoolDetailsModule = InternalAuditorSchoolDetails;

const InternalAuditorSchoolModule = InternalAuditorSchool;

const SystemConfigurationsModule = SystemConfigurations;

const store = new Vuex.Store({
    plugins: [createPersistedState()],
    modules: {
        invoice: counterModule,

        AccountantInvoiceModule: AccountantInvoiceModule,

        AccountantUploadModule: AccountantUploadModule,

        AccountantReportModule: AccountantReportModule,

        SecratarySchoolModule: SecratarySchoolModule,

        SecretarySchoolDetailModule: SecretarySchoolDetailModule,

        ProcurementInvoiceModule: ProcurementInvoiceModule,

        ProcurementToolModule: ProcurementToolModule,

        ProcurementUploadModule: ProcurementUploadModule,

        ProcurementReportModule: ProcurementReportModule,

        InternalAuditorSchoolDetailsModule: InternalAuditorSchoolDetailsModule,

        InternalAuditorSchoolModule: InternalAuditorSchoolModule,

        SystemConfigurationsModule: SystemConfigurationsModule,
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
