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
    
    // finalCounter2(_, getters){
    //     // the dash is for the state
    //     return getters.finalCounter;
    // }
};