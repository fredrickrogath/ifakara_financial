import mutations from './mutations';
import actions from './actions';
import getters from './getters';

export default {

    namespaced: true,

    state() {
        return {
            mainUrl: 'http://34.31.59.59/api/',
        };
    },
    mutations: mutations,
    actions: actions,
    getters: getters,
};