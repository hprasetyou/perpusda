<template>
    <div>
        <div v-show="editMode && !readOnly">
            <v-date-picker v-show="showPicker" v-model="inputVal" color="green lighten-1"></v-date-picker>
            <v-text-field @click="showPicker = true" :label="label" v-model="inputVal" required>
            </v-text-field>
        </div>
        <value-form :label="label" :value="value" v-show="!editMode || readOnly" />
    </div>
</template>
<script>
import valueForm from './valueForm';
export default {
    components:{
        valueForm
    },
    props:{
        readOnly:{
            type:Boolean,
            default:false
        },
        editMode:{
            type:Boolean,
            default:false
        },
        value:{},
        label:{
            type:String
        }
    },
    data(){
        return {
            showPicker:false,
            inputVal:''
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