<template>
    <div>
        <winkel-form ref="winkelForm" @data-updated="dataUpdated" :formDefinition="formDefinition" :dataUrl="dataUrl" :baseUrl="baseUrl"
            :title="title">
            <template v-if="data.status == 'lost' || data.status =='borrowed'" v-slot:additional-actions>
                <v-btn @click="dialog = true" color="primary">Return books</v-btn>
            </template>
        </winkel-form>
        <v-dialog v-model="dialog" persistent max-width="290">
            <v-card>
                <v-card-title class="headline">Return books</v-card-title>
                <v-card-text>
                    <p>Has been borrowed from <b>{{ data.time | moment("DD-MM-YYYY") }}</b> ({{ duration }} day(s))</p>
                    <p>Return due date <b>{{ data.due_date | moment("DD-MM-YYYY") }}</b></p>
                    <p style="color:red" v-if="overdue>0">Overdue: {{ overdue }} day(s)</p>
                </v-card-text>
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
                dialog:false,
                data:{}
            }
        },
        computed:{
            duration(){
                const borrow_date = this.$moment(this.data.time);
                console.log(borrow_date,this.$moment());
                
                return Math.ceil(this.$moment().diff(borrow_date, 'days', true));
            },
            overdue(){
                const due_date = this.$moment(this.data.due_date);
                const return_date = this.data.status == 'returned' ? this.$moment(this.data.returned):this.$moment()
                const overdue = return_date.diff(due_date, 'days');
                
                return overdue > 0? overdue:0;
            }
        },
        mounted() {
            this.formDefinition = this.$route.meta.formDefinition
            this.dataUrl = this.$route.meta.dataUrl
            this.title = this.$route.meta.title;
            this.baseUrl = this.$route.meta.baseUrl;
        },
        methods: {
            dataUpdated(data){
                this.data = data;
                if(this.overdue > 0 && this.data.status == 'borrowed'){
                    const overdue = this.overdue;
                    const late_penalty = 2000;
                    this.data.remark = `The library charges Rp. ${late_penalty*overdue}(${overdue} x ${late_penalty}) due to overdue` ;
                }
            },
            returnBook() {
                let action = this.axios.put(`${this.dataUrl}/${this.$route.params.id}`, {
                    status:'returned',
                    remark: this.data.remark
                });
                action.then(response => {
                    this.data = response.data;
                    this.$refs.winkelForm.openSnackbar({
                        text: "All changes saved!",
                        color: "green"
                    });
                    this.dialog = false;
                    this.$refs.winkelForm.getData();
                }).catch(err => {
                    this.$refs.winkelForm.openSnackbar({
                        text: "An error has occured",
                        color: "error"
                    })
                })
            }
        },
    }

</script>
