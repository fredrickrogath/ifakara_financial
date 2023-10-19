export default {
    getPostView(state){
        return state.setPostView;
    },

    getApplicantView(state){
        return state.setApplicantView;
    },

    getPostId(state){
        return state.postId;
    },

    getApplicant(state){
        return state.applicant;
    },
    
    // finalCounter2(_, getters){
    //     // the dash is for the state
    //     return getters.finalCounter;
    // }
};