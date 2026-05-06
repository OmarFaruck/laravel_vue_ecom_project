<template>


    <div class="container-fluid">
        <div class="card mt-4 px-4 py-4 container text-center justify-content-center">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="/admin/dashboard">
                    <h2>Return Page</h2>
                </a>
                <h2>SubCategory Pages</h2>


                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Add SubCategory Page
                </button>


            </div>



            <Vue3EasyDataTable :headers="headers" :items="items" :rows-per-page="10" border-cell
                header-text-direction="center" body-text-direction="center">
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

                <template #item-action="{ item }">
                    <button @click="edit(item)" class="btn btn-sm btn-success me-2">
                       <SquarePen /> Edit
                    </button>
                    <button @click="remove(item)" class="btn btn-sm btn-danger">
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
                            <h5 class="modal-title">SubCategory Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Name:</label>
                                <input v-model="form.name" type="text" class="form-control" />
                                <div class="text-danger" v-if="form.errors.name">
                                    {{ form.errors.name }}
                                </div>
                            </div>


                            <div class="mb-3">
                                <label>Catagory id:</label>
                                <select v-model="form.category_id" class="form-control">
                                    <option value="">Select a category</option>
                                    <option v-for="cat in category" :key="cat.id" :value="cat.id">
                                        {{ cat.name }}
                                    </option>
                                </select>
                                <div class="text-danger" v-if="form.errors.category_id">
                                    {{ form.errors.category_id }}
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
                            <h5 class="modal-title">SubCategory Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Name:</label>
                                <input v-model="form.name" type="text" class="form-control" />
                                <div class="text-danger" v-if="form.errors.name">
                                    {{ form.errors.name }}
                                </div>
                            </div>


                            <div class="mb-3">
                                <label>Catagory id:</label>
                                <select v-model="form.category_id" class="form-control">
                                    <option value="">Select a category</option>
                                    <option v-for="cat in category" :key="cat.id" :value="cat.id">
                                        {{ cat.name }}
                                    </option>
                                </select>
                                <div class="text-danger" v-if="form.errors.category_id">
                                    {{ form.errors.category_id }}
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

<script lang="ts" setup> 
import { useForm } from "@inertiajs/vue3";
import { Modal } from "bootstrap";
import { SquarePen, Trash2 } from '@lucide/vue';
import Vue3EasyDataTable from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';
// import 'vue3-easy-data-table';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import { computed } from "vue";
import type { Header, Item } from "vue3-easy-data-table";

const { subcategories, category } = defineProps({
    subcategories: Array,
    category: Array,
});

const items = computed(() => subcategories || []);
const headers = [
    { text: "ID", value: "id" },
    { text: "Name", value: "name" },
    { text: "Category", value: "category.name" },
    { text: "Action", value: "action" },

];
const form = useForm({
    id: null,
    name: "",
    category_id: "",
    // image: null,
});

const submitcreate = () => {
    form.post("/subcategory", {
        onSuccess: () => {
            // Form এর সব input ফাঁকা করে দেয়
            form.reset();


            //   HTML এর এই modal টা ধরছে:
            const modalEl = document.getElementById("exampleModal");
            const modal = Modal.getInstance(modalEl) || new Modal(modalEl);

            // Modal বন্ধ করা
            modal.hide();

            // 🔥 Force remove modal overlay + body lock
            document.body.classList.remove("modal-open");
            document
                .querySelectorAll(".modal-backdrop")
                .forEach((el) => el.remove());
        },
    });

    swal("Good job!", "This category will be added", "success");
};

function edit(item) {
    form.id = item.id;
    form.name = item.name;
    form.category_id = item.category_id;

    const modalEl = document.getElementById("editModal");
    const modal = new Modal(modalEl);

    modal.show();
}

function submitUpdate() {



    const ModelEI = document.getElementById("editModal");
    const editModal = Modal.getInstance(ModelEI);
    editModal.hide();

    form.transform((data) => ({
        ...data,
        _method: "put",
    }))

        .post(`/subcategory/${form.id}`, {
            ForceFormData: true,
            onfinish: () => {
                form.reset();
                // 🔥 Force remove modal overlay + body lock
                document.body.classList.remove("modal-open");
                document
                    .querySelectorAll(".modal-backdrop")
                    .forEach((el) => el.remove());

            }


        });

    swal("Good job!", "This category will be updated", "success");
}

function remove(subcategory) {
    swal({
        title: "Are you sure?",
        text: "This category will be deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {

        if (willDelete) {
            form.delete(`/subcategory/${subcategory.id}`, {
                onSuccess: () => {
                    swal("Deleted successfully!", {
                        icon: "success",
                    });
                }
            });
        } else {
            swal("Your data is safe Now!");
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