import "./bootstrap";
import { createApp, h } from "vue";
import { createInertiaApp, router } from "@inertiajs/vue3";
import NProgress from "nprogress";
import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";
import swal from 'sweetalert';
import 'bootstrap/dist/js/bootstrap.bundle.min.js'

// ✅ Dynamic CSS/JS Loader Function
const loadPageSpecificAssets = async (pageName) => {
    if (pageName.startsWith("Admin/")) {
        // ✅ AdminLTE & Plugins CSS
       import("@/Assets/css/backend/css/adminlte.css");
       import("@/Assets/css/backend/css/adminlte.min.css");
       import("@/Assets/css/backend/dist/js/adminlte.js");
       import("@/Assets/css/backend/dist/js/adminlte.min.js");
       import(
            "@/Assets/css/backend/plugins//icheck-bootstrap/icheck-bootstrap.min.css"
        );
       import(
            "@/Assets/css/backend/plugins//datatables-bs4/css/dataTables.bootstrap4.min.css"
        );
       import(
            "@/Assets/css/backend/plugins//datatables-responsive/css/responsive.bootstrap4.min.css"
        );
       import(
            "@/Assets/css/backend/plugins//datatables-buttons/css/buttons.bootstrap4.min.css"
        );

    } else {
        // ✅ Frontend CSS
       import("@/Assets/css/fontend/css/style.css");
       import("@/Assets/css/fontend/css/style.min.css");
    }
};

createInertiaApp({
    resolve: async (name) => {
       loadPageSpecificAssets(name); // ✅ assets load before rendering
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });
        app.use(plugin);
        app.mount(el);
    },
});

router.on("start", () => NProgress.start());
router.on("finish", () => NProgress.done());
