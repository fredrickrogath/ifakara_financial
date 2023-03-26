export default {
    setTab(state, tab) {
        state.tab = tab;
    },

    setAddStudent(state) {
        state.addStudent = !state.addStudent;
    },

    setSnackBarState(state){
        state.snackBarState = !state.snackBarState;
    },

    setSchoolView(state, id){
        state.setSchoolView = !state.setSchoolView;
        state.schoolId = id;
    },
};