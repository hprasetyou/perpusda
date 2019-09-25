<template>
    <div>
        <v-layout v-show="editMode && !readOnly"  >
            <div>
                <v-select :items="items" 
                :label="label"  
                item-text="text"
                v-model="inputVal"
                item-value="value"></v-select>
            </div>
        </v-layout>
        <v-layout row px-3 wrap v-show="!editMode || readOnly">
            <v-flex xs3>
                <label for="">{{ label }}</label>
            </v-flex>
            <v-flex xs9>
                <label for="">{{ getItemValue(value) }}</label>
            </v-flex>
        </v-layout>
    </div>
</template>
<script>
    export default {
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
            items: {
                type: Array,
                default () {
                    return []
                }
            }
        },
        data(){
            return {
                inputVal:''
            }
        },
        methods:{
            getItemValue(key){
                let out = false;
                for (const item of this.items) {
                    if(item.value == key){
                        out = item.text
                    }
                }
                return out;
            }
        },
        watch:{
            value(){
                console.log('changee');
                
                this.inputVal = this.value;
            },
            inputVal(){
                // this.value = this.inputVal;
                this.$emit('input',this.inputVal);
        }
    }
    }

</script>
