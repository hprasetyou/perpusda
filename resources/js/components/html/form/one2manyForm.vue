<template>
    <div>
        <v-layout v-show="editMode && !readOnly"  >
            <div>
                <v-combobox
                v-model="inputVal"
                :search-input.sync="search"
                :items="items"
                :label="label" 
                item-text="text"
                item-value="value"
                ></v-combobox>
            </div>
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
                inputVal:'',
                entries:[],
                search:''
            }
        },
        computed:{
            items(){

                return this.entries.map(item=>{
                    return {value:item.id,text:item.name}
                })
            }
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
                if(s){
                    this.axios.get(`/api/${this.objUrl}?q=${s}`)
                            .then(response => {
                                this.entries = response.data.data;
                            })
                }
            },
            getItems(){
                
            }
        },
        watch:{
            search (val) {
                console.log(val);
                this.getData(val)
            },
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
