export default {
    setPostView(state, id){console.log('setPostView')
        state.setPostView = !state.setPostView;
        state.postId = id;
    },

    setApplicantView(state, applicant){
        state.setApplicantView = !state.setApplicantView;
        state.applicant = applicant;
    },
};