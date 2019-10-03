export default {
    title:'Publisher',
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
                label:'Summary',
                model:'summary',
                type:'textarea'
            }
        ]
    },
    dataUrl:'/api/publisher'
}