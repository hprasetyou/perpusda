<template>
    <div>
        <v-layout v-show="editMode && !readOnly"  >
            <v-autocomplete
                v-model="inputVal"
                :search-input.sync="search"
                :items="items"
                :label="label" 
                item-text="text"
                item-value="value"
                @keyup="searchData"
                >
                    <template v-if="!disableAdd" v-slot:append-item>
                        <v-layout px-4>
                            <v-text-field label="New data" v-model="newData" >
                                <v-icon slot="append" @click="addData" color="success">check</v-icon>
                            </v-text-field>
                        </v-layout >
                    </template>
                </v-autocomplete>
        </v-layout>
        <value-form :label="label" :value="getItemValue(value)" v-show="!editMode || readOnly" />
    </div>
</template>
<script>
import valueForm from './valueForm';
export default {
    components:{
        valueForm
    },
        props: {
            disableAdd:{
                type: Boolean,
                default: false
            },
            propToShow:{
                type: String,
                default:'name'
            },
            readOnly: {
                type: Boolean,
                default: false
            },
            editMode: {
                type: Boolean,
                default: false
            },
            value: {},
            label: {
                type: String
            },
            objUrl: {
                type: String
            }
        },
        data(){
            return {
                newData:'',
                inputVal:'',
                entries:[],
                search:'',
                inputReady: true
            }
        },
        computed:{
            items(){

                return this.entries.map(item=>{
                    const props = this.propToShow.split("-");
                    let text = ''
                    for (const prop of props) {
                        text += item[prop] + ' '
                    }
                    return {value:item.id,text}
                })
            }
        },
        mounted() {
            this.searchData()
        },
        methods:{
            getItemValue(key){
                let out = '';
                for (const item of this.items) {
                    if(item.value == key){
                        out = item.text
                    }
                }
                return out;
            },
            getData(s) {
                let params = '';
                if(s){
                    params = `?q=${s}`;
                }
                return new Promise((resolve,reject)=>{
                this.axios.get(`/api/${this.objUrl}${params}`)
                            .then(response => {
                                this.entries = response.data.data;
                                resolve(response)
                            })
                })
            },
            addData(){
                this.axios.post(`/api/${this.objUrl}`,{
                    name:this.newData
                }).then(response => {
                        this.entries.push(response.data)
                        this.inputVal = {
                                value: response.data.id,
                                text: response.data.name
                        }
                        this.newData = ''
                    })
            },
            searchData(){
                const val = this.search;
                if(this.inputReady){
                    this.getData(val).then(data=>{
                        this.inputReady = false;
                    })
                }else{
                    setTimeout(() => {
                        this.inputReady = true;
                    }, 1000);
                }
            }
        },
        watch:{
            value(){
                this.inputVal = this.value;
            },
            inputVal(){
                // this.value = this.inputVal;
                this.$emit('input',this.inputVal);
        }
    }
    }

</script>
