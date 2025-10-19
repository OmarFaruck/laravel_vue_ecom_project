import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp, router } from '@inertiajs/vue3'
import NProgress from 'nprogress'
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
 
 // Font Awesome imports
// import { library } from '@fortawesome/fontawesome-svg-core'
// import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'


const loadPageSpecificCSS = (pageName) => {
    // console.log(pageName);
    if (pageName.startsWith('Admin/')) {
        // console.log('Loading admin CSS');
       import('@/Assets/css/backend/css/adminlte.css') 
       import('@/Assets/css/backend/css/adminlte.min.css')
       import('@/Assets/css/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')
 
    } else {
         import('@/Assets/css/fontend/css/style.css');
         import('@/Assets/css/fontend/css/style.min.css');
        
    }
}

createInertiaApp({
    resolve: name => {
        //console.log(name);
        loadPageSpecificCSS(name);
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });
        app.use(plugin)
        app.mount(el)
    },
})


router.on('start', () => { NProgress.start() })
router.on('finish', () => { NProgress.done() })
