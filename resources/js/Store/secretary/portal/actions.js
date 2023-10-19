export default {
    setPostView(context, id){
        context.commit("setPostView", id);
    },

    setApplicantView(context, applicant){
        context.commit("setApplicantView", applicant);
    },
};