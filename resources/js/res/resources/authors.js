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
    filterable:[{
        name:'name',
        label:'Name',
        type:'text'
    }],
    dataUrl:'/api/author'
}