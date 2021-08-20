<template>
    <div >
        <span v-for="(block,index) in blocks" :key="'home'+index">
            <span v-for="(layout,index) in block" :key="'layout'+index">
                <span v-html="layout.layout"></span>
            </span>
        </span>
    </div>    
</template>

<script>
export default {
    data() {
        return{
            loading:false,
            blocks:null
        }
    },
    created()
    {
            this.loading = true;
            axios.get("/api/search", {
                params: {
                    page_name: this.$route.name,
                }
            }).then(res => {
                this.loading = false;
                this.blocks = res.data;
            }).catch(error => {
                console.log(error);
            });

    }
}
</script>