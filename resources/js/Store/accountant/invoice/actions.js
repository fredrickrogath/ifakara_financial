export default {
    setTab(context, tabInvoice) {
        // for data will be data.value

        context.commit("setTab", tabInvoice);
    },

    setInvoiceGenerate(context){
        context.commit("setInvoiceGenerate");
    },
    
    setSnackBarState(context){
        context.commit("setSnackBarState");
    },

    setInvoiceView(context, id){
        context.commit("setInvoiceView", id);
    },

    setCurrentTabInvoices(context){
        context.commit("setCurrentTabInvoices");
    },

    setInvoiceSchoolView(context, id){
        context.commit("setInvoiceSchoolView", id);
    },

};