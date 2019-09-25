export default {
    title:'Authors',
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
            },
            {
                label:'Gender',
                model:'gender',
                type:'select',
                items:[
                    {value:'m',text:'Male'},
                    {value:'f',text:'Female'}
                ]
            }
        ]
    },
    dataUrl:'/api/author'
}