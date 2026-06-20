<template>


    <div class="container-fluid">
        <div class="card mt-4 py-4 container text-center justify-content-center">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="mb-3">
                    <label class="align-items-left">Search Name:</label>
                    <input v-model="searchValue" placeholder="Search by name..." type="text" class="form-control" />
                </div>
                <h2>CouponCode Page</h2>


                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Add CouponCode
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
                            <h5 class="modal-title">CouponCode Create Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <div class="mb-3">
                                <label>Coupon_Code:</label>
                                <input v-model="form.coupon_code" type="text" placeholder="Create coupon_code"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.coupon_code">
                                    {{ form.errors.coupon_code }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>valid_date:</label>
                                <input v-model="form.valid_date" type="date" placeholder="Create valid_date"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.valid_date">
                                    {{ form.errors.valid_date }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="coupon_type">Coupon Type</label>

                                <select id="coupon_type" class="form-control" v-model="form.type" required>
                                    <option value="1">Fixed</option>
                                    <option value="2">Percentage</option>
                                </select>
                                <div class="text-danger" v-if="form.errors.type">
                                    {{ form.errors.type }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>coupon_amount:</label>
                                <input v-model="form.coupon_amount" type="number" placeholder="Create coupon_amount"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.coupon_amount">
                                    {{ form.errors.coupon_amount }}
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
                                <label>Coupon_Code:</label>
                                <input v-model="form.coupon_code" type="text" placeholder="Create coupon_code"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.coupon_code">
                                    {{ form.errors.coupon_code }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>valid_date:</label>
                                <input v-model="form.valid_date" type="date" placeholder="Create valid_date"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.valid_date">
                                    {{ form.errors.valid_date }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="coupon_type">Coupon Type</label>

                                <select id="coupon_type" class="form-control" v-model="form.type" required>
                                    <option value="1">Fixed</option>
                                    <option value="2">Percentage</option>
                                </select>
                                <div class="text-danger" v-if="form.errors.type">
                                    {{ form.errors.type }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>coupon_amount:</label>
                                <input v-model="form.coupon_amount" type="number" placeholder="Create coupon_amount"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.coupon_amount">
                                    {{ form.errors.coupon_amount }}
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

const searchField = ["id", "coupon_code", "valid_date", "type", "coupon_amount", "status"];
const searchValue = ref();

const page = usePage();

const items = computed(() => page.props.CouponCode || []);
const headers = [
    { text: "ID", value: "id" },
    { text: "coupon_code", value: "coupon_code" },
    { text: "valid_date", value: "valid_date" },
    { text: "type", value: "type" },
    { text: "coupon_amount", value: "coupon_amount" },
    { text: "status", value: "status" },
    { text: "Action", value: "action" },

];
const form = useForm({
    id: null,
    coupon_code: "",
    valid_date: "",
    type: "",
    coupon_amount: "",
    status: ""
});

const submitcreate = () => {
    form.post("/admin/CouponCode", {
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

    swal("Good job!", "This CouponCode address will be added", "success");
};

function edit(item) {
    form.id = item.id;
    form.coupon_code = item.coupon_code;
    form.valid_date = item.valid_date;
    form.type = item.type;
    form.coupon_amount = item.coupon_amount;
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

        .post(`/admin/CouponCode/${form.id}`, {
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

    swal("Good job!", "This CouponCode address will be updated", "success");
}

function remove(data) {

    swal({
        title: "Are you sure?",
        text: "This CouponCode address will be deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {

        if (willDelete) {

            router.delete(`/admin/CouponCode/${data.id}`, {
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