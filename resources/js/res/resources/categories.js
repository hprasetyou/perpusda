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
    }],
    formDefinition:{
        left:[
            {
                label:'Name',
                model:'name',
                type:'input'
            }
        ]
    },
    dataUrl:'/api/category'
}