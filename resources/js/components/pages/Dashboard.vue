<template>
    <div>
        <v-layout row>
            <v-col md="4">
                <borrowed-book-widget/>
            </v-col>
        </v-layout>
    </div>
</template>
<script>
import borrowedBookWidget from '../misc/BorrowedBooksThisMonth'
export default {
    components:{
        borrowedBookWidget
    },
    data(){
        return{
            title:'Dashboard'
        }
    }
}
</script>