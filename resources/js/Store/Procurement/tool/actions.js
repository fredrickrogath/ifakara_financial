export default {
    setTab(context, tab) {
        // for data will be data.value

        context.commit("setTab", tab);
    },

    setInvoiceGenerate(context){
        context.commit("setInvoiceGenerate");
    },

    setSchoolDashboards(context){
        context.commit("getSchoolDashboards");
    },

    setViewSchoolDashboard(context){
        context.commit("setViewSchoolDashboard");
    },

    setSchoolId(context, id){
        context.commit("setSchoolId", id);
    },
    
    setSnackBarState(context){
        context.commit("setSnackBarState");
    }
};