import mutations from './mutations';
import actions from './actions';
import getters from './getters';

export default {

    namespaced: true,

    state() {
        return {
            setPostView: false,
            postId: null,

            setApplicantView: false,
            applicant: null,
        };
    },
    mutations: mutations,
    actions: actions,
    getters: getters,
};