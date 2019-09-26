export default {
    title:'Borrowed Books',
    header:[{
        text: 'ID',
        align: 'left',
        value: 'id'
    },
    {
        text: 'Name',
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
                label:'Name',
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
                type:'one2many',
                objUrl:'member'
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
    dataUrl:'/api/member'
}