import { isLoggedIn, logOut, getStateToken } from "./auth";
export default {
    state: {
        isLoggedIn: false,
        user: {},
        token: null,
    },
    mutations: {
        setLoggedIn(state, payload) {
            state.isLoggedIn = payload;
        },
        setUser(state, payload) {
            state.user = payload;
        },
        setToken(state, payload) {
            state.token = payload;
        }
    },
    actions: {
        async logInUser({ commit, dispatch }) {
            if (isLoggedIn()) {
                try {
                    getStateToken();
                    const user = (
                        await axios.get("api/auth/me", {
                            headers: {
                                Authorization: `Bearer ${getStateToken()}`
                            }
                        })
                    ).data;
                    commit("setLoggedIn", true);
                    commit("setUser", user);
                    commit("setToken", getStateToken());
                } catch (error) {
                    console.log(error.response.data.errors);
                    dispatch("logout");
                }
            }
        },
        logout({ commit }) {
            commit("setUser", {});
            commit("setToken", null);
            commit("setLoggedIn", false);
            logOut();
        }
    }
};
