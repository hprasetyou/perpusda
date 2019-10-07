import BorrowedBookItem from '../components/pages/BorrowedBooks/Item.vue';
import BorrowedBookList from '../components/pages/BorrowedBooks/List.vue';
import resConf from '../res/resource-definition';

export default [
    {
        path: `/borrowed_books`,
        component: BorrowedBookList,
        meta:resConf.borrowed_books
    },
    {
        path: `/borrowed_books/:id`,
        component: BorrowedBookItem,
        meta:resConf.borrowed_books
    }
]