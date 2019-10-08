import ListComponent from './components/html/List.vue';
import DetailComponent from './components/html/Detail.vue';
import resConf from './res/resource-definition';
import borrowedBookRoutes from './routes/borrowed_books';
import reports from './routes/reports';
import dashboard from './components/pages/Dashboard.vue';

let routes = [];

routes.push({
    path: `/`,
    component: dashboard
})
routes = routes.concat(borrowedBookRoutes);
routes = routes.concat(reports);
for (const key in resConf) {
    if (resConf.hasOwnProperty(key)) {
        const meta = resConf[key]
        meta.baseUrl = `/${key}`
        routes.push({
            path: `/${key}`,
            component: ListComponent,
            meta
        })
        routes.push({
            path: `/${key}/:id`,
            component: DetailComponent,
            meta
        })    
    }
}

export { routes }
