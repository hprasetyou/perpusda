<template>
    <div>
        <v-layout row pa-3>
            <h3>{{ title }}</h3>
            <v-spacer></v-spacer>
            <v-btn color="primary" @click="downloadReport">Dowload Report</v-btn>
            <v-btn color="primary" :to="`${this.$route.path}/new`">New</v-btn>
        </v-layout>
        <v-divider></v-divider>
        <br>
        <winkel-table-filter @data-updated="updateFilter" :prefilter="preFilter" :columns="filterable"/>
        <br>
       <winkle-table :filterData="filterData" ref="table" @editRow="cellClicked"  @deleteRow="deleteConfirmation" :headers="header" :dataUrl="dataUrl">
       </winkle-table>
       
    </div>
</template>

<script>
    import winkleTable from '../../html/winkelTable.vue';
    import winkelTableFilter from '../../html/utils/winkelTableFilter.vue';
    import * as download from 'downloadjs'
    import {
        mapMutations
    } from "vuex";

    export default {
        components:{
            winkleTable,
            winkelTableFilter
        },
        data(){
            return {
                title: '',
                dataUrl:'',
                header: [],
                filterData:[],
                filterable: [],
                preFilter:[]
            }
        },
        mounted() {
            this.updateConf()
        },
        methods: {
            ...mapMutations(["showSnackbar", "closeSnackbar"]),
            openSnackbar(options) {
                this.showSnackbar(options)
            },
            cellClicked(data){
                this.$router.push(`${this.$route.path}/${data.id}`)
                
            },       
            deleteConfirmation(data) {
                
                this.$confirm('Delete this data?').then(res => {
                    if (res) {
                        this.deleteData(data);
                    }
                })
            },
            downloadReport(){
                this.axios.get(`${this.dataUrl}/report`,{
                    responseType: 'blob'})
                    .then(response => {
                        console.log(response);
                        
                        download(response.data, "report.pdf", response.headers['content-type']);
                    })
            },
            deleteData(data) {
                this.axios.delete(`${this.dataUrl}/${data.id}`)
                    .then(response => {
                        this.openSnackbar({
                            text: "Data has been deleted!",
                            color: "green"
                        })
                        this.$refs.table.getData()
                    })
            },
            updateConf(){
                this.title = this.$route.meta.title;
                this.header = this.$route.meta.header;
                this.dataUrl = this.$route.meta.dataUrl;
                this.filterable = this.$route.meta.filterable;
                this.preFilter = this.$route.meta.preFilter;
                
            },
            updateFilter(data){
                this.$set(this,'filterData',data);
            }
        },
        watch: {
            '$route.path':function(to, from){
                this.updateConf();
            }
        }
       
    }

</script>
