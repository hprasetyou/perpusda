<template>
    <div>
        <v-card>
            <v-card-text>
                <v-layout class="filter-toolbar">
                    <v-chip-group>
                        <v-chip close @click:close="removeFilter(i)" v-for="(item ,i) in appliedFilters" :key="i">
                            {{ item.column.label + '=' + item.value }}
                        </v-chip>
                    </v-chip-group>
                    <v-spacer></v-spacer>
                    <v-btn color="" @click="openFilter = !openFilter">
                        Add filter
                    </v-btn>
                    <v-card class="filter-form-card" v-show="openFilter"
                            max-width="344" >
                      <v-form>
                    <v-container>
                        <v-select
                            :items="columns"
                            label="Column"
                            v-model="filterColumn"
                            outlined
                            item-text="label"
                            item-value="name"
                            ></v-select>

                        <v-text-field
                            label="Value"
                            v-model="filterValue"
                            outlined
                        ></v-text-field>
                        <v-btn color="" @click="applyFilter">
                            Apply
                        </v-btn>
                        <v-btn color="" @click="openFilter = false">
                            Close
                        </v-btn>
                    </v-container>
                </v-form>
                        </v-card>
                </v-layout>
            </v-card-text>
        </v-card>
    </div>
</template>
<style>
    .filter-toolbar{
        position: relative;
    }
    .v-sheet.filter-form-card{
        z-index: 9;
        position: absolute;
        right: 0;
        top: 50px;
    }
</style>
<script>
export default {
    data(){
        return {
            openFilter: false,
            appliedFilters:[],
            filterColumn:null,
            filterValue:null
        }
    },
    props:{
        columns:{
            type:Array
        }
    },
    methods: {
        applyFilter(){ 
            const filterColumn = this.filterColumn;
            const column = this.columns.find(item => item.name == filterColumn);
            const filterExist = this.appliedFilters.findIndex(item => item.column.name == filterColumn);
            const data = {
                column,
                operator:'=',
                value:this.filterValue
            }
            if(filterExist > -1){
                this.appliedFilters[filterExist] = data;
            }else{
                this.appliedFilters.push(data);
            }
            this.openFilter = false;
            this.$emit('data-updated',this.appliedFilters)
        },
        removeFilter(i){
            this.appliedFilters.splice(i,1)
            this.$emit('data-updated',this.appliedFilters)
        }
    }
}
</script>