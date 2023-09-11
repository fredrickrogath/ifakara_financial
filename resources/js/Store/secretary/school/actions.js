export default {
    setTab(context, tab) {
        // for data will be data.value

        context.commit("setTab", tab);
    },

    setAddStudent(context){
        context.commit("setAddStudent");
    },
    
    setSnackBarState(context){
        context.commit("setSnackBarState");
    },

    setSchoolView(context, id){
        context.commit("setSchoolView", id);
    },

    setCommentView(context){
        context.commit("setCommentView");
    },

    setNotificationId(context, id){
        context.commit("setNotificationId", id);
    },

    setActiveClass(context, activeClass){
        context.commit("setActiveClass", activeClass);
    },

    setActivePayment(context, activePayment){
        context.commit("setActivePayment", activePayment);
    }
};