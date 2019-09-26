export default {
    title:'Borrowed Books',
    header:[
    {
        text: 'ID',
        value: 'name'
    },
    {
        text: 'Created At',
        value: 'created_at'
    },
    {
        text: 'Updated At',
        value: 'updated_at'
    }],
    formDefinition:{
        left:[
            {
                label:'ID',
                model:'name',
                type:'input',
                readOnly:true
            },
            {
                label:'Book',
                model:'book_id',
                type:'one2many',
                objUrl:'book'
            },
            {
                label:'Member',
                model:'member_id',
                propToShow:'id-name',
                type:'one2many',
                objUrl:'member',
                disableAdd:true
            },
            {
                label:'Date time',
                model:'time',
                type:'input',
                readOnly:true
            }
        ],
        center:[
            {
                label:'Remark',
                model:'remark',
                type:'textarea'
            }
        ]
    },
    dataUrl:'/api/borrowed_book'
}