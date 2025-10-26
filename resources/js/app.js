import "./bootstrap";
import { createApp, h } from "vue";
import { createInertiaApp, router } from "@inertiajs/vue3";
import NProgress from "nprogress";
import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";

// ✅ Dynamic CSS/JS Loader Function
const loadPageSpecificAssets = async (pageName) => {
    if (pageName.startsWith("Admin/")) {
        // ✅ AdminLTE & Plugins CSS
       import("@/Assets/css/backend/css/adminlte.min.css");
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

        // ✅ jQuery & DataTables JS
    //    import("@/Assets/css/backend/plugins/jquery/jquery.min.js");
    //    import("@/Assets/css/backend/plugins/datatables/jquery.dataTables.min.js");
    //    import("@/Assets/css/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js");
    //    import("@/Assets/css/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js");
    //    import("@/Assets/css/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js");
    //    import("@/Assets/css/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js");
    //    import("@/Assets/css/backend/plugins/jszip/jszip.min.js");
    //    import("@/Assets/css/backend/plugins/pdfmake/pdfmake.min.js");
    //    import("@/Assets/css/backend/plugins/pdfmake/vfs_fonts.js");
    //    import("@/Assets/css/backend/plugins/datatables-buttons/js/buttons.html5.min.js");
    //    import("@/Assets/css/backend/plugins/datatables-buttons/js/buttons.print.min.js");
    //    import("@/Assets/css/backend/plugins/datatables-buttons/js/buttons.colVis.min.js");
    //    import("@/Assets/css/backend/dist/js/adminlte.min.js");
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
