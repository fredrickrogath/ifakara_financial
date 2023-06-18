export default {
    setTab(state, tabInvoice) {
        state.tabInvoice = tabInvoice;
    },

    setInvoiceGenerate(state) {
        state.invoiceGenerate = !state.invoiceGenerate;
    },

    setSnackBarState(state){
        state.snackBarState = !state.snackBarState;
    },

    setInvoiceView(state, id){
        state.invoiceView = !state.invoiceView;
        state.invoiceId = id;
    },

    setCurrentTabInvoices(state){
        state.currentTabInvoices = !state.currentTabInvoices;
    },

    setInvoiceSchoolView(state, id){
        state.invoiceSchoolView = !state.invoiceSchoolView;
        state.schoolId = id;
    },
};