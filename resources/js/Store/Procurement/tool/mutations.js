export default {
    setTab(state, tab) {
        state.tab = tab;
    },

    setInvoiceGenerate(state) {
        state.invoiceGenerate = !state.invoiceGenerate;
    },

    getSchoolDashboards(state) {
        state.getSchoolDashboards = !state.getSchoolDashboards;
    },

    setViewSchoolDashboard(state) {
        state.viewSchoolDashboard = !state.viewSchoolDashboard;
    },

    setSchoolId(state, id) {
        state.schoolId = id;
    },
    
    setSnackBarState(state){
        state.snackBarState = !state.snackBarState;
    },
};