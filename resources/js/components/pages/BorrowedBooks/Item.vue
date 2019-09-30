<template>
    <div>
        <winkel-form :formDefinition="formDefinition" :dataUrl="dataUrl" :baseUrl="baseUrl" :title="title">
            <template v-slot:additional-actions>
                <v-btn color="primary">Return books</v-btn>
            </template>
        </winkel-form>
    </div>
</template>
<script>
import winkelForm from '../../html/form/Form';
export default {
    components:{
        winkelForm
    },
    data() {
        return {
            formDefinition:{},
            dataUrl:'',
            baseUrl:'',
            title:''
        }
    },
    mounted() {
        this.formDefinition = this.$route.meta.formDefinition
        this.dataUrl = this.$route.meta.dataUrl
        this.title = this.$route.meta.title;
        this.baseUrl = this.$route.meta.baseUrl;
    }
}
</script>