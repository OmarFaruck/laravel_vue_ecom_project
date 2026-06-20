<template>


    <div class="container-fluid">
        <div class="card mt-4 py-4 container text-center justify-content-center">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="mb-3">
                    <label class="align-items-left">Search Name:</label>
                    <input v-model="searchValue" placeholder="Search by name..." type="text" class="form-control" />
                </div>
                <h2>PageSetting Page</h2>


                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Add PageSetting
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

            </Vue3EasyDataTable>
        </div>


        <!-- input From Page -->
        <div class="modal fade" id="exampleModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form @submit.prevent="submitcreate">
                        <div class="modal-header">
                            <h5 class="modal-title">PageSetting Create Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <div class="mb-3">
                                <label>page_name:</label>
                                <input v-model="form.page_name" type="text" placeholder="Create page_name"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.page_name">
                                    {{ form.errors.page_name }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>page_slug:</label>
                                <input v-model="form.page_slug" type="text" placeholder="Create page_slug"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.page_slug">
                                    {{ form.errors.page_slug }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>page_title:</label>
                                <input v-model="form.page_title" type="text" placeholder="Create page_title"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.page_title">
                                    {{ form.errors.page_title }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>page_description:</label>
                                <textarea v-model="form.page_description" type="text"
                                    placeholder="Create page_description" class="form-control" />
                                <div class="text-danger" v-if="form.errors.page_description">
                                    {{ form.errors.page_description }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>meta_title:</label>
                                <input v-model="form.meta_title" type="text" placeholder="Create meta_title"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.meta_title">
                                    {{ form.errors.meta_title }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>meta_description:</label>
                                <textarea v-model="form.meta_description" type="text"
                                    placeholder="Create meta_description" class="form-control" />
                                <div class="text-danger" v-if="form.errors.meta_description">
                                    {{ form.errors.meta_description }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>meta_keywords:</label>
                                <input v-model="form.meta_keywords" type="text" placeholder="Create meta_keywords"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.meta_keywords">
                                    {{ form.errors.meta_keywords }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>page_position:</label>
                                <input v-model="form.page_position" type="number" placeholder="Create page_position"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.page_position">
                                    {{ form.errors.page_position }}
                                </div>
                            </div>



                            <div class="mb-3">
                                <label for="coupon_type">status</label>

                                <select id="coupon_type" class="form-control" v-model="form.status" required>
                                    <option value="1">Active</option>
                                    <option value="2">InActive</option>
                                </select>
                                <div class="text-danger" v-if="form.errors.status">
                                    {{ form.errors.status }}
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
                            <h5 class="modal-title">Contact Address Edit Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <div class="mb-3">
                                <label>page_name:</label>
                                <input v-model="form.page_name" type="text" placeholder="Create page_name"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.page_name">
                                    {{ form.errors.page_name }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>page_slug:</label>
                                <input v-model="form.page_slug" type="text" placeholder="Create page_slug"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.page_slug">
                                    {{ form.errors.page_slug }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>page_title:</label>
                                <input v-model="form.page_title" type="text" placeholder="Create page_title"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.page_title">
                                    {{ form.errors.page_title }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>page_description:</label>
                                <textarea v-model="form.page_description" type="text"
                                    placeholder="Create page_description" class="form-control" />
                                <div class="text-danger" v-if="form.errors.page_description">
                                    {{ form.errors.page_description }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>meta_title:</label>
                                <input v-model="form.meta_title" type="text" placeholder="Create meta_title"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.meta_title">
                                    {{ form.errors.meta_title }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>meta_description:</label>
                                <textarea v-model="form.meta_description" type="text"
                                    placeholder="Create meta_description" class="form-control" />
                                <div class="text-danger" v-if="form.errors.meta_description">
                                    {{ form.errors.meta_description }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>meta_keywords:</label>
                                <input v-model="form.meta_keywords" type="text" placeholder="Create meta_keywords"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.meta_keywords">
                                    {{ form.errors.meta_keywords }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>page_position:</label>
                                <input v-model="form.page_position" type="number" placeholder="Create page_position"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.page_position">
                                    {{ form.errors.page_position }}
                                </div>
                            </div>



                            <div class="mb-3">
                                <label for="coupon_type">status</label>

                                <select id="coupon_type" class="form-control" v-model="form.status" required>
                                    <option value="1">Active</option>
                                    <option value="2">InActive</option>
                                </select>
                                <div class="text-danger" v-if="form.errors.status">
                                    {{ form.errors.status }}
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

const searchField = ["id", "page_name", "page_slug", "page_title", "page_description", "meta_title", "meta_description", "meta_keywords", "page_position", "status"];
const searchValue = ref();

const page = usePage();

const items = computed(() => page.props.PageSetting || []);
const headers = [
    { text: "ID", value: "id" },
    { text: "page_name", value: "page_name" },
    { text: "page_slug", value: "page_slug" },
    { text: "page_title", value: "page_title" },
    { text: "page_description", value: "page_description" },
    { text: "meta_title", value: "meta_title" },
    { text: "meta_description", value: "meta_description" },
    { text: "meta_keywords", value: "meta_keywords" },
    { text: "page_position", value: "page_position" },
    { text: "status", value: "status" },
    { text: "Action", value: "action" },

];
const form = useForm({
    id: null,
    page_name: "",
    page_slug: "",
    page_title: "",
    page_description: "",
    meta_title: "",
    meta_description: "",
    meta_keywords: "",
    page_position: "",
    status: ""
});

const submitcreate = () => {
    form.post("/admin/PageSetting", {
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

    swal("Good job!", "This PageSetting will be added", "success");
};

function edit(item) {
    form.id = item.id;
    form.page_name = item.page_name;
    form.page_slug = item.page_slug;
    form.page_title = item.page_title;
    form.page_description = item.page_description;
    form.meta_title = item.meta_title;
    form.meta_description = item.meta_description;
    form.meta_keywords = item.meta_keywords;
    form.page_position = item.page_position;
    form.status = item.status;
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

        .post(`/admin/PageSetting/${form.id}`, {
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

    swal("Good job!", "This PageSetting will be updated", "success");
}

function remove(data) {

    swal({
        title: "Are you sure?",
        text: "This PageSetting will be deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {

        if (willDelete) {

            router.delete(`/admin/PageSetting/${data.id}`, {
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