import mutations from './mutations';
import actions from './actions';
import getters from './getters';

export default {

    namespaced: true,

    state() {
        return {
            tab: 'all',
            schoolId: null,
            invoiceGenerate: false,
            getSchoolDashboards: false,
            viewSchoolDashboard: false,

            // SNACKBAR
            snackBarState: false,
            snackBarMessage: 'Successfully submited',
        };
    },
    mutations: mutations,
    actions: actions,
    getters: getters,
};