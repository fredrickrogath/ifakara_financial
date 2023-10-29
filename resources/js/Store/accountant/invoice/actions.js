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

    setInvoiceCreationView(context, id){
        context.commit("setInvoiceCreationView", id);
    },

    setCurrentTabInvoices(context){
        context.commit("setCurrentTabInvoices");
    },

    setInvoiceSchoolView(context, id){
        context.commit("setInvoiceSchoolView", id);
    },

    setChartOfAcountForm(context, tab){
        context.commit("setChartOfAcountForm", tab);
    },

    setPaymentView(context, id){
        context.commit("setPaymentView", id);
    },

    setInvoice(context){
        context.commit("setInvoice");
    },

    setActiveClass(context, activeClass){
        context.commit("setActiveClass", activeClass);
    },

    setActivePayment(context, activePayment){
        context.commit("setActivePayment", activePayment);
    },

    setAccounts(context, accounts){
        context.commit("setAccounts", accounts);
    }
    
};