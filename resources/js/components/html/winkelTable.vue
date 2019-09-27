<template>
    <div>
        <v-data-table :hide-default-footer="hideAction" v-model="selected" show-select :headers="tableHeader" :items="tableData" :options.sync="pagination"
        :footer-props="{'items-per-page-options':[15,30,50]}"
            :server-items-length="totalItem" :loading="loading" class="elevation-1">
                <template v-slot:item.action="{ item }">
                    <v-icon v-for="action in actions" :key="action.name"
                        small
                        class="mr-2"
                        @click="rowAction(action.name,item)"
                    >
                        {{action.icon}}
                    </v-icon>
                </template>
        </v-data-table>
    </div>
</template>

<script>
    export default {
        props: {
            headers: {
                type: Array
            },
            dataUrl: {
                type: String,
                default:''
            },
            hideAction: {
                type: Boolean,
                default:false
            },
            itemData: {
                type: Array,
                default: ()=>[]
            },
            actions:{

                type: Array,
                default: ()=>[{
                    name:'edit',
                    icon:'edit'
                },{
                    name:'delete',
                    icon:'delete'
                }]
            }
        },
        data() {
            return {
                selected: [],
                rowsPerPage: 10,
                pagination: {},
                totalItem: 0,
                loading: true,
                tableData:[]
            }
        },
        watch: {
            pagination: {
                handler() {
                    this.getData()
                },
                deep: true
            },
            itemData:{
                handler() {
                    this.tableData = this.itemData;
                }
            },
            dataUrl: {
                handler() {
                    this.getData()
                },
                deep: true
            }
        },
        computed: {
            pages() {
                if (this.pagination.rowsPerPage == null ||
                    this.pagination.totalItems == null
                ) return 0

                return Math.ceil(this.pagination.totalItems / this.pagination.rowsPerPage)
            },
            tableHeader(){
                const header = this.headers;
                const actionHeader = header.filter(item=>item.value == 'action');
                if(!actionHeader.length>0){
                    header.push({ text: 'Actions', value: 'action', sortable: false })
                }
                return header;
            }
        },
        methods: {
            rowAction(action,data){
                this.$emit(`${action}Row`,data)
            },
            parseColValue(colData,key){
                const keys = key.split('.');
                let o = colData;
                for (const k of keys) {
                    o = o[k];
                }
                return o
            },
            getDataFromApi() {
                this.loading = true
                return new Promise((resolve, reject) => {
                    const {
                        sortBy,
                        descending,
                        page,
                        rowsPerPage
                    } = this.pagination

                    this.axios.get(this.dataUrl, {
                            params: {
                                page: page,
                                perpage: rowsPerPage,
                                sortby: sortBy,
                                descending
                            }
                        })
                        .then(response => {
                            // handle success
                            this.loading = false;
                            resolve({
                                items: response.data.data,
                                total: response.data.total
                            })
                        })

                })
            },
            getData(){
                if(this.dataUrl.length >1){
                    this.getDataFromApi()
                        .then(data => {
                            this.tableData = data.items
                            this.totalItem = data.total
                        })
                }else{
                    this.loading = false;
                }

            }

        },
    }

</script>
