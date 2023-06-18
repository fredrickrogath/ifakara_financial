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

            // SNACKBAR
            snackBarState: false,
            snackBarMessage: 'Successfully submited',
        };
    },
    mutations: mutations,
    actions: actions,
    getters: getters,
};