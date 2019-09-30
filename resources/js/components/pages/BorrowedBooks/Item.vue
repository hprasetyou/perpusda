<template>
    <div>
        <winkel-form ref="winkelForm" :formDefinition="formDefinition" :dataUrl="dataUrl" :baseUrl="baseUrl"
            :title="title">
            <template v-slot:additional-actions>
                <v-btn @click="dialog = true" color="primary">Return books</v-btn>
            </template>
        </winkel-form>
        <v-dialog v-model="dialog" persistent max-width="290">
            <v-card>
                <v-card-title class="headline">Use Google's location service?</v-card-title>
                <v-card-text>Let Google help apps determine location. This means sending anonymous location data to
                    Google, even when no apps are running.</v-card-text>
                <v-textarea label="Remark" v-model="returnRemarks">
                </v-textarea>
                <v-card-actions>
                    <div class="flex-grow-1"></div>
                    <v-btn color="red darken-1" text @click="dialog = false">Cancel</v-btn>
                    <v-btn color="green darken-1" text @click="returnBook">Ok</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>
<script>
    import winkelForm from '../../html/form/Form';
    
    export default {
        components: {
            winkelForm
        },
        data() {
            return {
                formDefinition: {},
                dataUrl: '',
                baseUrl: '',
                title: '',
                returnRemarks:'',
                dialog:false
            }
        },
        mounted() {
            this.formDefinition = this.$route.meta.formDefinition
            this.dataUrl = this.$route.meta.dataUrl
            this.title = this.$route.meta.title;
            this.baseUrl = this.$route.meta.baseUrl;
        },
        methods: {
            returnBook() {
                this.axios.post(`/api/returned_book`, {
                        borrowed_book_id: this.$route.params.id,
                        remark:returnRemarks
                    })
                    .then(response => {
                        dialog = false;
                        this.openSnackbar({
                            text: "All changes saved!",
                            color: "green"
                        });
                    })
            }
        },
    }

</script>
