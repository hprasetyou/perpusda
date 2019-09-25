export default {
    users:{
        title:'User',
        header:[{
            text: 'ID',
            align: 'left',
            value: 'id'
        },
        {
            text: 'Email',
            value: 'email'
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
                    label:'Email',
                    model:'email',
                    type:'input'
                },
            ],
            center:[
                {
                    label:'Name',
                    model:'name',
                    type:'input'
                }]
        },
        dataUrl:'/api/user'
    },
    authors:{
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
    },
    members:{
        title:'Members',
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
                },
                {
                    label:'Address',
                    model:'address',
                    type:'textarea'
                }
            ]
        },
        dataUrl:'/api/member'
    },
    categories:{
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
    },
    publishers:{
        title:'Publisher',
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
        dataUrl:'/api/publisher'
    },
    books:{
        title:'Books',
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
        dataUrl:'/api/book'
    }
}