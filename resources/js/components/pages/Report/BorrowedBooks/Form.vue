<template>
    <div>
        <v-layout row pa-3>
                <h3>Generate Borrowed Book Report</h3>
        </v-layout>
        <v-layout row>
            <v-col md="5">
                <v-card>
                    <v-card-title>Generate Report</v-card-title>
                    <v-card-text>
                        <date-input v-model="data.start_date" />
                        <date-input v-model="data.end_date" />
                        <v-select :items="statusItems" 
                        label="Status"  
                        item-text="text"
                        v-model="data.status"
                        item-value="value"></v-select>
                    </v-card-text>
                    <v-card-actions>
                        <v-btn @click="generateReport" text>Download</v-btn>
                    </v-card-actions>
                </v-card>
            </v-col>
        </v-layout>
    </div>
</template>
<script>
import dateInput from '../../../html/form/date';
import * as download from 'downloadjs';
export default {
    components:{
        dateInput
    },
    data(){
        return{
            title:'Report',
            data:{
                status:'all'
            },
            statusItems:[
                {
                    text:'All',
                    value:'all'
                },
                {
                    text:'Borrowed',
                    value:'borrowed'
                },
                {
                    text:'Returned',
                    value:'returned'
                },
                {
                    text:'Lost',
                    value:'lost'
                },
            ]
        }
    },
    methods: {
        generateReport(){
                this.axios.get(`api/borrowed_book/report`,{
                    params:this.data,
                    responseType: 'blob'})
                    .then(response => {                        
                        download(response.data, `Borrowed-books-${this.data.start_date}-${this.data.end_date}-${this.data.status}.pdf`, 
                        response.headers['content-type']);
                    })
        }
    },
}
</script>