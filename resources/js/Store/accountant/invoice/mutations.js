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

    setInvoiceCreationView(state, id){
        state.invoiceCreationView = !state.invoiceCreationView;
        state.invoiceCreationId = id;
    },

    setCurrentTabInvoices(state){
        state.currentTabInvoices = !state.currentTabInvoices;
    },

    setInvoiceSchoolView(state, id){
        state.invoiceSchoolView = !state.invoiceSchoolView;
        state.schoolId = id;
    },

    setChartOfAcountForm(state , tab){
        state.chartOfAcountForm = tab;
    },

    setPaymentView(state , id){
        state.paymentView = !state.paymentView;
        state.paymentId = id;
    },

    setInvoice(state){
        state.setInvoice = !state.setInvoice;
    },

    setActiveClass(state, activeClass){
        state.activeClass = activeClass;
    },

    setActivePayment(state, activePayment){
        state.activePayment = activePayment;
    },
};