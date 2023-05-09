import mutations from './mutations';
import actions from './actions';
import getters from './getters';

export default {

    namespaced: true,

    state() {
        return {
            mainUrl: 'http://127.0.0.1:8000/api/',
        };
    },
    mutations: mutations,
    actions: actions,
    getters: getters,
};