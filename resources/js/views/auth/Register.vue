<template>
    <div class="col-lg-12">
        <form>
            <div class="form-group">
                <label for="">Name</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    v-model="user.name"
                    :class="[
                            { 'is-invalid': errorFor('name') }
                        ]"
                />
                <v-errors :errors="errorFor('name')"></v-errors>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input
                    type="text"
                    name="email"
                    class="form-control"
                    v-model="user.email"
                    :class="[
                            { 'is-invalid': errorFor('email') }
                        ]"
                />
                <v-errors :errors="errorFor('email')"></v-errors>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input
                    type="password"
                    name="password"
                    class="form-control"
                    v-model="user.password"
                    :class="[
                            { 'is-invalid': errorFor('password') }
                        ]"
                />
                <v-errors :errors="errorFor('password')"></v-errors>
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    v-model="user.password_confirmation"
                    :class="[
                            { 'is-invalid': errorFor('password_confirmation') }
                        ]"
                />
                <v-errors :errors="errorFor('password_confirmation')"></v-errors>
            </div>
            <div class="form-group">
                <button
                    type="submit"
                    class="btn btn-primary btn-lg btn-block"
                    @click.prevent="register"
                    :disabled="loading"
                >
                    Submit
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import { logIn, setStateToken } from "./../../auth";
import validationErrors from "./../../shared/mixins/validationErrors";
export default {
    mixins: [validationErrors],
    data() {
        return {
            user: {
                name: null,
                email: null,
                password: null,
                password_confirmation: null
            },
            loading: false,
            errors: null
        };
    },
    methods: {
        async register() {
            this.loading = true;
            this.errors = null;

            try {
                const response = await axios.post(`/api/register`, this.user);
                if (201 === response.status) {
                    setStateToken(response.headers["authorization"]);
                    logIn();
                    this.$store.dispatch("logInUser");
                    this.$router.push({ name: "home" });
                }
            } catch (error) {
                this.errors = error.response && error.response.data.errors;
            }

            this.loading = false;
        }
    }
};
</script>
