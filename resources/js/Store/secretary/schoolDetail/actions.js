export default {
    setTab(context, tab) {
        // for data will be data.value

        context.commit("setTab", tab);
    },

    setAddStudent(context){
        context.commit("setAddStudent");
    },

    setAddStaff(context){
        context.commit("setAddStaff");
    },

    setAddSchool(context){
        context.commit("setAddSchool");
    },
    
    setSnackBarState(context){
        context.commit("setSnackBarState");
    },

    setSchoolView(context, id){
        context.commit("setSchoolView", id);
    }
};