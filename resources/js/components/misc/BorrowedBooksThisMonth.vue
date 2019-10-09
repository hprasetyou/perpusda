<template>
    <v-card color="#385F73" dark>
        <v-card-text class="white--text">
            <div class="headline mb-2">Total books borrowed this month</div>
            <p>{{ total }} Books ({{ returned }} Returned) </p>
            
        </v-card-text>

        <v-card-actions>
            <v-btn to="/borrowed_books">Details</v-btn>
        </v-card-actions>
    </v-card>
</template>
<script>
export default {
    data(){
        return {
            total:0,
            returned:0,
            params:{
                    filter:['time','time'],
                    filterOperator:['>=','<='],
                    filterValue:[this.$moment().format('YYYY-MM-01'),this.$moment().format('YYYY-MM-29')]
                }
        }
    },
    methods: {
        getBorrowed(){
            const params = this.params;
            this.axios.get('/api/borrowed_book',{
                params
            }).then(response =>{
                this.total = response.data.total;
            })
        },
        getReturned(){
            const params = {};
            params.filter = ['status'];
            params.filterOperator = ['='];
            params.filterValue = ['returned'];
            for (let i = 0; i < this.params.filter.length; i++) {
                params.filter.push(this.params.filter[i]) 
                params.filterOperator.push(this.params.filterOperator[i]) 
                params.filterValue.push(this.params.filterValue[i])                
            }
            this.axios.get('/api/borrowed_book',{
                params
            }).then(response =>{
                this.returned = response.data.total;
            })
        }
    },
    mounted() {
        this.getBorrowed();
        this.getReturned();
    },
}
</script>