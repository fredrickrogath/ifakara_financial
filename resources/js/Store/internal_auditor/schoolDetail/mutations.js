export default {
    setTab(state, tab) {
        state.tab = tab;
    },

    setAddStudent(state) {
        state.addStudent = !state.addStudent;
    },

    setAddStaff(state) {
        state.addStaff = !state.addStaff;
    },
    
    setAddSchool(state) {
        state.addSchool = !state.addSchool;
    },

    setSnackBarState(state){
        state.snackBarState = !state.snackBarState;
    },

    setSchoolView(state, id){
        state.setSchoolView = !state.setSchoolView;
        state.schoolId = id;
    },
};