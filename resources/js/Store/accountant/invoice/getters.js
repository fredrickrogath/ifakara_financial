export default {
    getTab(state) {
        return state.tabInvoice;
    },

    getInvoiceGenerate(state){
        return state.invoiceGenerate;
    },

    getSnackBarMessage(state){
        return state.snackBarMessage;
    },

    getSnackBarState(state){
        return state.snackBarState;
    },

    getInvoiceView(state){
        return state.invoiceView;
    },

    getInvoiceCreationView(state){
        return state.invoiceCreationView;
    },

    getInvoiceCreationId(state){
        return state.invoiceCreationId;
    },

    getInvoiceId(state){
        return state.invoiceId;
    },
    
    getCurrentTabInvoices(state){
        return state.currentTabInvoices;
    },

    getInvoiceSchoolView(state){
        return state.invoiceSchoolView;
    },

    getSchoolId(state){
        return state.schoolId;
    },

    getChartOfAcountForm(state){
        return state.chartOfAcountForm;
    },

    getPaymentView(state){
        return state.paymentView;
    },

    getPaymentId(state){
        return state.paymentId;
    },

    getInvoice(state){
        return state.setInvoice;
    },

    getActiveClass(state){
        return state.activeClass;
    },

    getActivePayment(state){
        return state.activePayment;
    },
    
    // finalCounter2(_, getters){
    //     // the dash is for the state
    //     return getters.finalCounter;
    // }
};