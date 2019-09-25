export default {
    title:'Categories',
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
                type:'input'
            }
        ],
        right:[
            {
                label:'Product Image',
                model:'mainImage',
                type:'image'
            }
        ]
    },
    dataUrl:'/api/category'
}