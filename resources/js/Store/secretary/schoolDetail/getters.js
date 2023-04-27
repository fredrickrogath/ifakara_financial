export default {
    getTab(state) {
        return state.tab;
    },

    getAddStudent(state){
        return state.addStudent;
    },

    getAddStaff(state){
        return state.addStaff;
    },

    getAddSchool(state){
        return state.addSchool;
    },

    getSnackBarMessage(state){
        return state.snackBarMessage;
    },

    getSnackBarState(state){
        return state.snackBarState;
    },

    getSchoolView(state){
        return state.setSchoolView;
    },

    getSchoolId(state){
        return state.schoolId;
    }
    
    // finalCounter2(_, getters){
    //     // the dash is for the state
    //     return getters.finalCounter;
    // }
};