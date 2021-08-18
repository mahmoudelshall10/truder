<template>
    <div>
        <div
            class="invalid-feedback"
            v-for="(error, index) in errors"
            :key="key(index)"
        >
            {{ error }}
        </div>
    </div>
</template>

<script>
export default {
    props: ["errors"],
    methods: {
        key(index) {
            return `validation_error_${index}_${Math.random()}`;
        }
    }
};
</script>

<style scoped>
.form-control.is-invalid ~ div > .invalid-feedback {
    display: block;
}

label {
    font-size: 0.7em;
    text-transform: uppercase;
    color: gray;
    font-weight: bolder;
}
.is-invalid {
    border-color: #b22222;
    background-image: none;
}
.invalid-feedback {
    color: #b22222;
}
</style>
