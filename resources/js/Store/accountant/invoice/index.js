import mutations from './mutations';
import actions from './actions';
import getters from './getters';

export default {

    namespaced: true,

    state() {
        return {
            tabInvoice: 'entries',
            invoiceGenerate: false,
            currentTabInvoices: false,

            invoiceSchoolView: false,
            invoiceView: false,
            invoiceId: null,
            schoolId: null,

            activeClass: 'ALL',
            activePayment: 'ALL',

            // SNACKBAR
            snackBarState: false,
            snackBarMessage: 'Successfully submited',

            tabInvoice: 'entries',
            chartOfAcountForm: '',

            paymentView: false,
            paymentId: null,

            setInvoice: false,
        };
    },
    mutations: mutations,
    actions: actions,
    getters: getters,
};