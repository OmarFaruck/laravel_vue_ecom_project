<template>


    <div class="container-fluid">
        <div class="card mt-4 py-4 container text-center justify-content-center">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="mb-3">
                    <label class="align-items-left">Search Name:</label>
                    <input v-model="searchValue" placeholder="Search by name..." type="text" class="form-control" />
                </div>
                <h2>PickupPoint Page</h2>


                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Add PickupPoint
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
                            <h5 class="modal-title">PickupPoint Create Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <div class="mb-3">
                                <label>pickup_point_name:</label>
                                <input v-model="form.pickup_point_name" type="text" placeholder="Create pickup_point_name"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.pickup_point_name">
                                    {{ form.errors.pickup_point_name }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>pickup_point_email:</label>
                                <input v-model="form.pickup_point_email" type="email" placeholder="Create pickup_point_email"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.pickup_point_email">
                                    {{ form.errors.pickup_point_email }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>pickup_point_phone:</label>
                                <input v-model="form.pickup_point_phone" type="number" placeholder="Create pickup_point_phone"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.pickup_point_phone">
                                    {{ form.errors.pickup_point_phone }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>pickup_point_address:</label>
                                <input v-model="form.pickup_point_address" type="text"
                                    placeholder="Create pickup_point_address" class="form-control" />
                                <div class="text-danger" v-if="form.errors.pickup_point_address">
                                    {{ form.errors.pickup_point_address }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>pickup_point_city:</label>
                                <input v-model="form.pickup_point_city" type="text" placeholder="Create pickup_point_city"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.pickup_point_city">
                                    {{ form.errors.pickup_point_city }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>pickup_point_area:</label>
                                <input v-model="form.pickup_point_area" type="text"
                                    placeholder="Create pickup_point_area" class="form-control" />
                                <div class="text-danger" v-if="form.errors.pickup_point_area">
                                    {{ form.errors.pickup_point_area }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>pickup_point_manager_name:</label>
                                <input v-model="form.pickup_point_manager_name" type="text" placeholder="Create pickup_point_manager_name"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.pickup_point_manager_name">
                                    {{ form.errors.pickup_point_manager_name }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>pickup_point_manager_number:</label>
                                <input v-model="form.pickup_point_manager_number" type="number" placeholder="Create pickup_point_manager_number"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.pickup_point_manager_number">
                                    {{ form.errors.pickup_point_manager_number }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>pickup_point_description:</label>
                                <textarea v-model="form.pickup_point_description" type="text" placeholder="Create pickup_point_description"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.pickup_point_description">
                                    {{ form.errors.pickup_point_description }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>pickup_point_open_time:</label>
                                <input v-model="form.pickup_point_open_time" type="time" placeholder="Create pickup_point_open_time"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.pickup_point_open_time">
                                    {{ form.errors.pickup_point_open_time }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>pickup_point_close_time:</label>
                                <input v-model="form.pickup_point_close_time" type="time" placeholder="Create pickup_point_close_time"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.pickup_point_close_time">
                                    {{ form.errors.pickup_point_close_time }}
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
                            <h5 class="modal-title">PickupPoint Edit Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                       <div class="modal-body">

                            <div class="mb-3">
                                <label>pickup_point_name:</label>
                                <input v-model="form.pickup_point_name" type="text" placeholder="Create pickup_point_name"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.pickup_point_name">
                                    {{ form.errors.pickup_point_name }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>pickup_point_email:</label>
                                <input v-model="form.pickup_point_email" type="email" placeholder="Create pickup_point_email"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.pickup_point_email">
                                    {{ form.errors.pickup_point_email }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>pickup_point_phone:</label>
                                <input v-model="form.pickup_point_phone" type="number" placeholder="Create pickup_point_phone"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.pickup_point_phone">
                                    {{ form.errors.pickup_point_phone }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>pickup_point_address:</label>
                                <input v-model="form.pickup_point_address" type="text"
                                    placeholder="Create pickup_point_address" class="form-control" />
                                <div class="text-danger" v-if="form.errors.pickup_point_address">
                                    {{ form.errors.pickup_point_address }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>pickup_point_city:</label>
                                <input v-model="form.pickup_point_city" type="text" placeholder="Create pickup_point_city"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.pickup_point_city">
                                    {{ form.errors.pickup_point_city }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>pickup_point_area:</label>
                                <input v-model="form.pickup_point_area" type="text"
                                    placeholder="Create pickup_point_area" class="form-control" />
                                <div class="text-danger" v-if="form.errors.pickup_point_area">
                                    {{ form.errors.pickup_point_area }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>pickup_point_manager_name:</label>
                                <input v-model="form.pickup_point_manager_name" type="text" placeholder="Create pickup_point_manager_name"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.pickup_point_manager_name">
                                    {{ form.errors.pickup_point_manager_name }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>pickup_point_manager_number:</label>
                                <input v-model="form.pickup_point_manager_number" type="number" placeholder="Create pickup_point_manager_number"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.pickup_point_manager_number">
                                    {{ form.errors.pickup_point_manager_number }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>pickup_point_description:</label>
                                <textarea v-model="form.pickup_point_description" type="text" placeholder="Create pickup_point_description"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.pickup_point_description">
                                    {{ form.errors.pickup_point_description }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>pickup_point_open_time:</label>
                                <input v-model="form.pickup_point_open_time" type="time" placeholder="Create pickup_point_open_time"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.pickup_point_open_time">
                                    {{ form.errors.pickup_point_open_time }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>pickup_point_close_time:</label>
                                <input v-model="form.pickup_point_close_time" type="time" placeholder="Create pickup_point_close_time"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.pickup_point_close_time">
                                    {{ form.errors.pickup_point_close_time }}
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

const searchField = ["id", "pickup_point_name", "pickup_point_email", "pickup_point_phone", "pickup_point_address", "pickup_point_city", "pickup_point_area", "pickup_point_manager_name", "pickup_point_manager_number", "pickup_point_description", "pickup_point_open_time", "pickup_point_close_time", "status",];

const searchValue = ref();

const page = usePage();

const items = computed(() => page.props.PickupPoint || []);
const headers = [
    { text: "ID", value: "id" },
    { text: "pickup_point_name", value: "pickup_point_name" },
    { text: "pickup_point_email", value: "pickup_point_email" },
    { text: "pickup_point_phone", value: "pickup_point_phone" },
    { text: "pickup_point_address", value: "pickup_point_address" },
    { text: "pickup_point_city", value: "pickup_point_city" },
    { text: "pickup_point_area", value: "pickup_point_area" },
    { text: "pickup_point_manager_name", value: "pickup_point_manager_name" },
    { text: "pickup_point_manager_number", value: "pickup_point_manager_number" },
    { text: "pickup_point_description", value: "pickup_point_description" },
    { text: "pickup_point_open_time", value: "pickup_point_open_time" },
    { text: "pickup_point_close_time", value: "pickup_point_close_time" },
    { text: "status", value: "status" },
    { text: "Action", value: "action" },

];
const form = useForm({
    id: null,
    pickup_point_name: "",
    pickup_point_email: "",
    pickup_point_phone: "",
    pickup_point_address: "",
    pickup_point_city: "",
    pickup_point_area: "",
    pickup_point_manager_name: "",
    pickup_point_manager_number: "",
    pickup_point_description: "",
    pickup_point_open_time: "",
    pickup_point_close_time: "",
    status: ""
});

const submitcreate = () => {
    form.post("/PickupPoint", {
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

    swal("Good job!", "This PickupPoint will be added", "success");
};

function edit(item) {
    form.id = item.id;
    form.pickup_point_name = item.pickup_point_name;
    form.pickup_point_email = item.pickup_point_email;
    form.pickup_point_phone = item.pickup_point_phone;
    form.pickup_point_address = item.pickup_point_address;
    form.pickup_point_city = item.pickup_point_city;
    form.pickup_point_area = item.pickup_point_area;
    form.pickup_point_manager_name = item.pickup_point_manager_name;
    form.pickup_point_manager_number = item.pickup_point_manager_number;
    form.pickup_point_description = item.pickup_point_description;
    form.pickup_point_open_time = item.pickup_point_open_time;
    form.pickup_point_close_time = item.pickup_point_close_time;
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

        .post(`/PickupPoint/${form.id}`, {
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

    swal("Good job!", "This PickupPoint will be updated", "success");
}

function remove(data) {

    swal({
        title: "Are you sure?",
        text: "This PickupPoint will be deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {

        if (willDelete) {

            router.delete(`/PickupPoint/${data.id}`, {
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
