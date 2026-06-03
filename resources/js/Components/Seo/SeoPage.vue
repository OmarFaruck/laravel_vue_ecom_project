<template>


    <div class="container-fluid">
        <div class="card mt-4 py-4 container text-center justify-content-center">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="mb-3">
                    <label class="align-items-left">Search Name:</label>
                    <input v-model="searchValue" placeholder="Search by name..." type="text" class="form-control" />
                </div>
                <h2>Seo Page</h2>


                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Add SeoPage
                </button>


            </div>



            <Vue3EasyDataTable :headers="headers" :items="items" :rows-per-page="10" border-cell
                header-text-direction="center" body-text-direction="center" :search-field="searchField"
                :search-value="searchValue">
                <template #header-name="header">
                    <div class="customize-header">
                        <!-- <img src="../images/name.png" class="header-icon"> -->
                        {{ header.text }}
                    </div>
                </template>
                <template #header-address="header">
                    <div class="customize-header">
                        <!-- <img src="../images/address.png" class="header-icon"> -->
                        {{ header.text }}
                    </div>
                </template>

                <template #item-action="item">
                    <button @click="edit(item)" class="btn btn-sm btn-success me-2">
                        <SquarePen /> Edit
                    </button>
                    <button type="button" @click="remove(item)" class="btn btn-sm btn-danger">
                        <Trash2 /> Delete
                    </button>
                </template>

                <template #item-og_image="item">
                    <img :src="`/storage/seopage/${item.og_image}`" width="80" height="60" class="rounded" />
                </template>

                <template #item-twitter_image="item">
                    <img :src="`/storage/seopage/${item.twitter_image}`" width="80" height="60" class="rounded" />
                </template>

            </Vue3EasyDataTable>
        </div>


        <!-- input From Page -->
        <div class="modal fade" id="exampleModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form @submit.prevent="submitcreate">
                        <div class="modal-header">
                            <h5 class="modal-title">Seo Create Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <div class="mb-3">
                                <label>meta_title:</label>
                                <input v-model="form.meta_title" type="text" placeholder="Create meta_title"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.meta_title">
                                    {{ form.errors.meta_title }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>meta_author:</label>
                                <input v-model="form.meta_author" type="text" placeholder="Create meta_author"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.meta_author">
                                    {{ form.errors.meta_author }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>meta_description:</label>
                                <input v-model="form.meta_description" type="text" placeholder="Create meta_description"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.meta_description">
                                    {{ form.errors.meta_description }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>meta_keyword:</label>
                                <input v-model="form.meta_keyword" type="text" placeholder="Create meta_keyword"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.meta_keyword">
                                    {{ form.errors.meta_keyword }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>meta_tag:</label>
                                <input v-model="form.meta_tag" type="text" placeholder="Create meta_tag"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.meta_tag">
                                    {{ form.errors.meta_tag }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>google_verification:</label>
                                <input v-model="form.google_verification" type="text"
                                    placeholder="Create google_verification" class="form-control" />
                                <div class="text-danger" v-if="form.errors.google_verification">
                                    {{ form.errors.google_verification }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>bing_verification:</label>
                                <input v-model="form.bing_verification" type="text"
                                    placeholder="Create bing_verification" class="form-control" />
                                <div class="text-danger" v-if="form.errors.bing_verification">
                                    {{ form.errors.bing_verification }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>yandex_verification:</label>
                                <input v-model="form.yandex_verification" type="text"
                                    placeholder="Create yandex_verification" class="form-control" />
                                <div class="text-danger" v-if="form.errors.yandex_verification">
                                    {{ form.errors.yandex_verification }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>alexa_verification:</label>
                                <input v-model="form.alexa_verification" type="text"
                                    placeholder="Create alexa_verification" class="form-control" />
                                <div class="text-danger" v-if="form.errors.alexa_verification">
                                    {{ form.errors.alexa_verification }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>google_analytics:</label>
                                <input v-model="form.google_analytics" type="text" placeholder="Create google_analytics"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.google_analytics">
                                    {{ form.errors.google_analytics }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>google_tag_manager:</label>
                                <input v-model="form.google_tag_manager" type="text"
                                    placeholder="Create google_tag_manager" class="form-control" />
                                <div class="text-danger" v-if="form.errors.google_tag_manager">
                                    {{ form.errors.google_tag_manager }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>facebook_pixel:</label>
                                <input v-model="form.facebook_pixel" type="text" placeholder="Create facebook_pixel"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.facebook_pixel">
                                    {{ form.errors.facebook_pixel }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>google_adsense:</label>
                                <input v-model="form.google_adsense" type="text" placeholder="Create google_adsense"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.google_adsense">
                                    {{ form.errors.google_adsense }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>og_title:</label>
                                <input v-model="form.og_title" type="text" placeholder="Create og_title"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.og_title">
                                    {{ form.errors.og_title }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>og_description:</label>
                                <input v-model="form.og_description" type="text" placeholder="Create og_description"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.og_description">
                                    {{ form.errors.og_description }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>og_image:</label>
                                <input @input="form.og_image = $event.target.files[0]" type="file" class="form-control"
                                    placeholder="Create og_image" />

                                <div class="text-danger" v-if="form.errors.og_image">
                                    {{ form.errors.og_image }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>twitter_title:</label>
                                <input v-model="form.twitter_title" type="text" placeholder="Create twitter_title"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.twitter_title">
                                    {{ form.errors.twitter_title }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>twitter_description:</label>
                                <input v-model="form.twitter_description" type="text"
                                    placeholder="Create twitter_description" class="form-control" />
                                <div class="text-danger" v-if="form.errors.twitter_description">
                                    {{ form.errors.twitter_description }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>twitter_image:</label>
                                <input @input="form.twitter_image = $event.target.files[0]" type="file"
                                    class="form-control" placeholder="Create twitter_image" />
                                <div class="text-danger" v-if="form.errors.twitter_image">
                                    {{ form.errors.twitter_image }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>canonical_url:</label>
                                <input v-model="form.canonical_url" type="text" placeholder="Create canonical_url"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.canonical_url">
                                    {{ form.errors.canonical_url }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>robots:</label>
                                <input v-model="form.robots" type="text" placeholder="Create robots"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.robots">
                                    {{ form.errors.robots }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>sitemap_url:</label>
                                <input v-model="form.sitemap_url" type="text" placeholder="Create sitemap_url"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.sitemap_url">
                                    {{ form.errors.sitemap_url }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>schema_markup:</label>
                                <input v-model="form.schema_markup" type="text" placeholder="Create schema_markup"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.schema_markup">
                                    {{ form.errors.schema_markup }}
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- input Edit From Page -->
        <div class="modal fade" id="editModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form @submit.prevent="submitUpdate">
                        <div class="modal-header">
                            <h5 class="modal-title">PickupPoint Edit Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <div class="mb-3">
                                <label>meta_title:</label>
                                <input v-model="form.meta_title" type="text" placeholder="Create meta_title"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.meta_title">
                                    {{ form.errors.meta_title }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>meta_author:</label>
                                <input v-model="form.meta_author" type="text" placeholder="Create meta_author"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.meta_author">
                                    {{ form.errors.meta_author }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>meta_description:</label>
                                <input v-model="form.meta_description" type="text" placeholder="Create meta_description"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.meta_description">
                                    {{ form.errors.meta_description }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>meta_keyword:</label>
                                <input v-model="form.meta_keyword" type="text" placeholder="Create meta_keyword"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.meta_keyword">
                                    {{ form.errors.meta_keyword }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>meta_tag:</label>
                                <input v-model="form.meta_tag" type="text" placeholder="Create meta_tag"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.meta_tag">
                                    {{ form.errors.meta_tag }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>google_verification:</label>
                                <input v-model="form.google_verification" type="text"
                                    placeholder="Create google_verification" class="form-control" />
                                <div class="text-danger" v-if="form.errors.google_verification">
                                    {{ form.errors.google_verification }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>bing_verification:</label>
                                <input v-model="form.bing_verification" type="text"
                                    placeholder="Create bing_verification" class="form-control" />
                                <div class="text-danger" v-if="form.errors.bing_verification">
                                    {{ form.errors.bing_verification }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>yandex_verification:</label>
                                <input v-model="form.yandex_verification" type="text"
                                    placeholder="Create yandex_verification" class="form-control" />
                                <div class="text-danger" v-if="form.errors.yandex_verification">
                                    {{ form.errors.yandex_verification }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>alexa_verification:</label>
                                <input v-model="form.alexa_verification" type="text"
                                    placeholder="Create alexa_verification" class="form-control" />
                                <div class="text-danger" v-if="form.errors.alexa_verification">
                                    {{ form.errors.alexa_verification }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>google_analytics:</label>
                                <input v-model="form.google_analytics" type="text" placeholder="Create google_analytics"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.google_analytics">
                                    {{ form.errors.google_analytics }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>google_tag_manager:</label>
                                <input v-model="form.google_tag_manager" type="text"
                                    placeholder="Create google_tag_manager" class="form-control" />
                                <div class="text-danger" v-if="form.errors.google_tag_manager">
                                    {{ form.errors.google_tag_manager }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>facebook_pixel:</label>
                                <input v-model="form.facebook_pixel" type="text" placeholder="Create facebook_pixel"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.facebook_pixel">
                                    {{ form.errors.facebook_pixel }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>google_adsense:</label>
                                <input v-model="form.google_adsense" type="text" placeholder="Create google_adsense"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.google_adsense">
                                    {{ form.errors.google_adsense }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>og_title:</label>
                                <input v-model="form.og_title" type="text" placeholder="Create og_title"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.og_title">
                                    {{ form.errors.og_title }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>og_description:</label>
                                <input v-model="form.og_description" type="text" placeholder="Create og_description"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.og_description">
                                    {{ form.errors.og_description }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>og_image:</label>
                                <input @input="form.og_image = $event.target.files[0]" type="file" class="form-control"
                                    placeholder="Create og_image" />

                                <div class="text-danger" v-if="form.errors.og_image">
                                    {{ form.errors.og_image }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>twitter_title:</label>
                                <input v-model="form.twitter_title" type="text" placeholder="Create twitter_title"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.twitter_title">
                                    {{ form.errors.twitter_title }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>twitter_description:</label>
                                <input v-model="form.twitter_description" type="text"
                                    placeholder="Create twitter_description" class="form-control" />
                                <div class="text-danger" v-if="form.errors.twitter_description">
                                    {{ form.errors.twitter_description }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>twitter_image:</label>
                                <input @input="form.twitter_image = $event.target.files[0]" type="file"
                                    class="form-control" placeholder="Create twitter_image" />
                                <div class="text-danger" v-if="form.errors.twitter_image">
                                    {{ form.errors.twitter_image }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>canonical_url:</label>
                                <input v-model="form.canonical_url" type="text" placeholder="Create canonical_url"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.canonical_url">
                                    {{ form.errors.canonical_url }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>robots:</label>
                                <input v-model="form.robots" type="text" placeholder="Create robots"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.robots">
                                    {{ form.errors.robots }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>sitemap_url:</label>
                                <input v-model="form.sitemap_url" type="text" placeholder="Create sitemap_url"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.sitemap_url">
                                    {{ form.errors.sitemap_url }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>schema_markup:</label>
                                <input v-model="form.schema_markup" type="text" placeholder="Create schema_markup"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.schema_markup">
                                    {{ form.errors.schema_markup }}
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>
</template>

<script setup>
import { usePage, useForm, router } from "@inertiajs/vue3";
import { Modal } from "bootstrap";
import { SquarePen, Trash2 } from '@lucide/vue';
import Vue3EasyDataTable from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';
// import 'vue3-easy-data-table';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import { computed, ref } from "vue";

const searchField = ["id", 'meta_title', 'meta_author',
    'meta_description','meta_keyword','meta_tag',
    'google_verification', 'bing_verification', 'yandex_verification', 'alexa_verification', 'google_analytics', 'google_tag_manager',
    'facebook_pixel','google_adsense', 'og_title',
    'og_description', 'og_image', 'twitter_title',
    'twitter_description', 'twitter_image', 'canonical_url',
    'robots', 'sitemap_url', 'schema_markup',
];

const searchValue = ref();

const page = usePage();

const items = computed(() => page.props.SeoPage || []);
const headers = [
    { text: "ID", value: "id" },
    { text: "meta_title", value: "meta_title" },
    { text: "meta_author", value: "meta_author" },
    { text: "meta_description", value: "meta_description" },
    { text: "meta_keyword", value: "meta_keyword" },
    { text: "meta_tag", value: "meta_tag" },
    { text: "google_verification", value: "google_verification" },
    { text: "bing_verification", value: "bing_verification" },
    { text: "yandex_verification", value: "yandex_verification" },
    { text: "alexa_verification", value: "alexa_verification" },
    { text: "google_analytics", value: "google_analytics" },
    { text: "google_tag_manager", value: "google_tag_manager" },
    { text: "facebook_pixel", value: "facebook_pixel" },
    { text: "google_adsense", value: "google_adsense" },
    { text: "og_title", value: "og_title" },
    { text: "og_description", value: "og_description" },
    { text: "og_image", value: "og_image" },
    { text: "twitter_title", value: "twitter_title" },
    { text: "twitter_description", value: "twitter_description" },
    { text: "twitter_image", value: "twitter_image" },
    { text: "canonical_url", value: "canonical_url" },
    { text: "robots", value: "robots" },
    { text: "sitemap_url", value: "sitemap_url" },
    { text: "schema_markup", value: "schema_markup" },
    { text: "Action", value: "action" },

];
const form = useForm({
    id: null,
    meta_title: "",
    meta_author: "",
    meta_description: "",
    meta_keyword: "",
    meta_tag: "",
    google_verification: "",
    bing_verification: "",
    yandex_verification: "",
    alexa_verification: "",
    google_analytics: "",
    google_tag_manager: "",
    facebook_pixel: "",
    google_adsense: "",
    og_title: "",
    og_description: "",
    og_image: null,
    twitter_title: "",
    twitter_description: "",
    twitter_image: null,
    canonical_url: "",
    robots: "",
    sitemap_url: "",
    schema_markup: "",
});

const submitcreate = () => {
    form.post("/SeoPage", {
        onSuccess: () => {
            // Form এর সব input ফাঁকা করে দেয়
            form.reset();


            //   HTML এর এই modal টা ধরছে:
            const modalEl = document.getElementById("exampleModal");
            if (modalEl) {
                const modal = Modal.getInstance(modalEl) || new Modal(modalEl);

                // Modal বন্ধ করা
                modal.hide();
            }

            // 🔥 Force remove modal overlay + body lock
            document.body.classList.remove("modal-open");
            document
                .querySelectorAll(".modal-backdrop")
                .forEach((el) => el.remove());
        },
    });

    swal("Good job!", "This SeoPage will be added", "success");
};

function edit(item) {

    form.id = item.id;
    form.meta_title = item.meta_title;
    form.meta_author = item.meta_author;
    form.meta_description = item.meta_description;
    form.meta_keyword = item.meta_keyword;
    form.meta_tag = item.meta_tag;
    form.google_verification = item.google_verification;
    form.google_analytics = item.google_analytics;
    form.bing_verification = item.bing_verification;
    form.yandex_verification = item.yandex_verification;
    form.alexa_verification = item.alexa_verification;
    form.google_tag_manager = item.google_tag_manager;
    form.facebook_pixel = item.facebook_pixel;
    form.google_adsense = item.google_adsense;
    form.og_title = item.og_title;
    form.og_description = item.og_description;
    form.og_image = null;
    form.twitter_title = item.twitter_title;
    form.twitter_description = item.twitter_description;
    form.twitter_image = null;
    form.canonical_url = item.canonical_url;
    form.robots = item.robots;
    form.sitemap_url = item.sitemap_url;
    form.schema_markup = item.schema_markup;
    const modalEl = document.getElementById("editModal");
    if (modalEl) {
        const modal = new Modal(modalEl);
        modal.show();
    }
}

function submitUpdate() {



    const ModelEI = document.getElementById("editModal");
    if (ModelEI) {
        const editModal = Modal.getInstance(ModelEI);
        if (editModal) {
            editModal.hide();
        }
    }

    form.transform((data) => ({
        ...data,
        _method: "put",
    }))

        .post(`/SeoPage/${form.id}`, {
            forceFormData: true,
            onFinish: () => {
                form.reset();
                // 🔥 Force remove modal overlay + body lock
                document.body.classList.remove("modal-open");
                document
                    .querySelectorAll(".modal-backdrop")
                    .forEach((el) => el.remove());

            }


        });

    swal("Good job!", "This SeoPage will be updated", "success");
}

function remove(data) {

    swal({
        title: "Are you sure?",
        text: "This SeoPage will be deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {

        if (willDelete) {

            router.delete(`/SeoPage/${data.id}`, {
                onSuccess: () => {
                    swal("Deleted successfully!", {
                        icon: "success",
                    });
                }
            });

        }

    });
}
</script>

<style>
.customize-header {
    display: flex;
    justify-items: center;
    align-items: center;
}

.header-icon {
    display: inline-block;
    width: 20px;
    height: 20px;
}

.customize-table {
    --easy-table-header-font-size: 24px;
}
</style>
