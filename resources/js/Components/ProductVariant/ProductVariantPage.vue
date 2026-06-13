<template>


    <div class="container-fluid">
        <div class="card mt-4 py-4 container text-center justify-content-center">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="mb-3">
                    <label class="align-items-left">Search Name:</label>
                    <input v-model="searchValue" placeholder="Search by name..." subject="text" class="form-control" />
                </div>
                <h2>Product_Variant Page</h2>


                <button subject="button" class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Add Product_Variant_Page
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
                    <button subject="button" @click="remove(item)" class="btn btn-sm btn-danger">
                        <Trash2 /> Delete
                    </button>
                </template>

                <template #item-product_image="item"> 
                    <img :src="`/storage/product_image/${item.product_image}`" width="80" height="60" class="rounded" />
                </template>
                
            </Vue3EasyDataTable>
        </div>


        <!-- input From Page -->
        <div class="modal fade" id="exampleModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form @submit.prevent="submitcreate">
                        <div class="modal-header">
                            <h5 class="modal-title">Product_Variant Create Form</h5>
                            <button subject="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <div class="mb-3">
                                <label>product_color:</label>
                                <input v-model="form.product_color" type="text" placeholder="Create product_color"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_color">
                                    {{ form.errors.product_color }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_size:</label>
                                <input v-model="form.product_size" type="number" placeholder="Create product_size"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_size">
                                    {{ form.errors.product_size }}
                                </div>
                            </div>


                            <div class="mb-3">
                                <label>product_quantity:</label>
                                <input v-model="form.product_quantity" type="number" placeholder="Create product_quantity"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_quantity">
                                    {{ form.errors.product_quantity }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_selling_price:</label>
                                <input v-model="form.product_selling_price" type="number" placeholder="Create product_selling_price"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_selling_price">
                                    {{ form.errors.product_selling_price }}
                                </div>
                            </div>

                          
                            <div class="mb-3">
                                <label>product_image:</label>
                                <input @input="form.product_image = $event.target.files[0]" type="file"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_image">
                                    {{ form.errors.product_image }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_id:</label>
                                 <select v-model="form.product_id" name="product_id" id="product_id" class="form-control">
                                    <option value="">Select a Product</option>
                                    <option v-for="product in Product" :key="product.id" :value="product.id">
                                        {{ product.id }} -- {{ product.product_name }}
                                    </option>
                                </select>
                                <div class="text-danger" v-if="form.errors.product_id">
                                    {{ form.errors.product_id }}
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
                            <h5 class="modal-title">Product_Variant Edit Form</h5>
                            <button subject="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <div class="mb-3">
                                <label>product_color:</label>
                                <input v-model="form.product_color" type="text" placeholder="Create product_color"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_color">
                                    {{ form.errors.product_color }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_size:</label>
                                <input v-model="form.product_size" type="number" placeholder="Create product_size"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_size">
                                    {{ form.errors.product_size }}
                                </div>
                            </div>


                            <div class="mb-3">
                                <label>product_quantity:</label>
                                <input v-model="form.product_quantity" type="number" placeholder="Create product_quantity"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_quantity">
                                    {{ form.errors.product_quantity }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_selling_price:</label>
                                <input v-model="form.product_selling_price" type="number" placeholder="Create product_selling_price"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_selling_price">
                                    {{ form.errors.product_selling_price }}
                                </div>
                            </div>

                          
                            <div class="mb-3">
                                <label>product_image:</label>
                                <input @input="form.product_image = $event.target.files[0]" type="file"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_image">
                                    {{ form.errors.product_image }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_id:</label>
                                 <select v-model="form.product_id" name="product_id" id="product_id" class="form-control">
                                    <option value="">Select a Product</option>
                                    <option v-for="product in Product" :key="product.id" :value="product.id">
                                        {{ product.id }} -- {{ product.product_name }}
                                    </option>
                                </select>
                                <div class="text-danger" v-if="form.errors.product_id">
                                    {{ form.errors.product_id }}
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

const searchField = ["id", "product_color", "product_size", "product_quantity", "product_selling_price", "product_image", "product_id"];
const searchValue = ref();

const page = usePage();

const items = computed(() => page.props.ProductVariant || []);
const headers = [
    { text: "ID", value: "id" },
    { text: "product_color", value: "product_color" },
    { text: "product_size", value: "product_size" },
    { text: "product_quantity", value: "product_quantity" },
    { text: "product_selling_price", value: "product_selling_price" },
    { text: "product_image", value: "product_image" },
    { text: "product_id", value: "product_id" }, 
    { text: "Action", value: "action" },

];
const form = useForm({
    id: null,
    product_color: "",
    product_size: "",
    product_quantity: "",
    product_selling_price: "",
    product_image: null,
    product_id: "", 
});

const props = defineProps({
    ProductVariant: Array,
    Product: Array,
});

const submitcreate = () => {
    form.post("/ProductVariant", {
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

    swal("Good job!", "This ProductVariant will be added", "success");
};

function edit(item) {
    form.id = item.id;
    form.product_color = item.product_color;
    form.product_size = item.product_size;
    form.product_quantity = item.product_quantity;
    form.product_selling_price = item.product_selling_price;
    form.product_image = item.product_image;
    form.product_id = item.product_id; 
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

        .post(`/ProductVariant/${form.id}`, {
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

    swal("Good job!", "This ProductVariant will be updated", "success");
}

function remove(data) {

    swal({
        title: "Are you sure?",
        text: "This ProductVariant will be deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {

        if (willDelete) {

            router.delete(`/ProductVariant/${data.id}`, {
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