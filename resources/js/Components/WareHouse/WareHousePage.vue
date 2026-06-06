<template>


    <div class="container-fluid">
        <div class="card mt-4 py-4 container text-center justify-content-center">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="mb-3">
                    <label class="align-items-left">Search Name:</label>
                    <input v-model="searchValue" placeholder="Search by name..." subject="text" class="form-control" />
                </div>
                <h2>WareHouse Page</h2>


                <button subject="button" class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Add WareHouse
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


            </Vue3EasyDataTable>
        </div>


        <!-- input From Page -->
        <div class="modal fade" id="exampleModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form @submit.prevent="submitcreate">
                        <div class="modal-header">
                            <h5 class="modal-title">WareHouse Create Form</h5>
                            <button subject="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <div class="mb-3">
                                <label>warehouse_name:</label>
                                <input v-model="form.warehouse_name" type="text" placeholder="Create warehouse_name"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.warehouse_name">
                                    {{ form.errors.warehouse_name }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>warehouse_code:</label>
                                <input v-model="form.warehouse_code" type="number" placeholder="Create warehouse_code"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.warehouse_code">
                                    {{ form.errors.warehouse_code }}
                                </div>
                            </div>


                            <div class="mb-3">
                                <label>warehouse_email:</label>
                                <input v-model="form.warehouse_email" type="email" placeholder="Create warehouse_email"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.warehouse_email">
                                    {{ form.errors.warehouse_email }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>warehouse_phone:</label>
                                <input v-model="form.warehouse_phone" type="number" placeholder="Create warehouse_phone"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.warehouse_phone">
                                    {{ form.errors.warehouse_phone }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>warehouse_address:</label>
                                <input v-model="form.warehouse_address" type="text"
                                    placeholder="Create warehouse_address" class="form-control" />
                                <div class="text-danger" v-if="form.errors.warehouse_address">
                                    {{ form.errors.warehouse_address }}
                                </div>
                            </div>


                            <div class="mb-3">
                                <label>warehouse_city:</label>
                                <input v-model="form.warehouse_city" type="text" placeholder="Create warehouse_city"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.warehouse_city">
                                    {{ form.errors.warehouse_city }}
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="coupon_subject">warehouse_districk</label>

                                <select id="coupon_subject" class="form-control" type="text"
                                    v-model="form.warehouse_districk" required>
                                    <option value="dhaka">dhaka</option>
                                    <option value="rajshahi">rajshahi</option>
                                    <option value="rangpur">rangpur</option>
                                    <option value="dinajpur">dinajpur</option>
                                    <option value="foridpur">foridpur</option>
                                    <option value="borishal">borishal</option>
                                    <option value="cumiila">cumiila</option>
                                    <option value="noakhali">noakhali</option>
                                    <option value="mymensingh">mymensingh</option>
                                    <option value="barombaria">barombaria</option>
                                    <option value="narayangonj">narayangonj</option>
                                    <option value="munshigonj">munshigonj</option>
                                    <option value="manikgonj">manikgonj</option>
                                    <option value="tangail">tangail</option>
                                    <option value="jamalpur">jamalpur</option>
                                    <option value="sherpur">sherpur</option>
                                    <option value="pabna">pabna</option>
                                    <option value="kustia">kustia</option>
                                    <option value="madaripur">madaripur</option>
                                    <option value="sherpur">sherpur</option>
                                </select>
                                <div class="text-danger" v-if="form.errors.warehouse_districk">
                                    {{ form.errors.warehouse_districk }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="coupon_subject">warehouse_area</label>

                                <select id="coupon_subject" class="form-control" type="text"
                                    v-model="form.warehouse_area" required>
                                    <option value="kamrangircjar">kamrangircjar</option>
                                    <option value="lalbagh">lalbagh</option>
                                    <option value="shyamoli">shyamoli</option>
                                    <option value="newmarket">newmarket</option>
                                    <option value="eliphenroad">eliphenroad</option>
                                    <option value="chata_mosque">chata_mosque</option>
                                    <option value="chad_mosque">chad_mosque</option>
                                    <option value="hagaribagh">hagaribagh</option>
                                    <option value="chowrasta">chowrasta</option>
                                    <option value="bongo_merket">bongo_merket</option>
                                    <option value="mirpur_1">mirpur_1</option>
                                    <option value="mirpur_2">mirpur_2</option>
                                    <option value="mirpur_9">mirpur_9</option>
                                    <option value="mirpur_10">mirpur_10</option>
                                    <option value="mirpur_11">mirpur_11</option>
                                    <option value="mirpur_12">mirpur_12</option>
                                    <option value="hatirjil">hatirjil</option>
                                </select>
                                <div class="text-danger" v-if="form.errors.warehouse_area">
                                    {{ form.errors.warehouse_area }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>warehouse_manager_name:</label>
                                <input v-model="form.warehouse_manager_name" type="text"
                                    placeholder="Create warehouse_manager_name" class="form-control" />
                                <div class="text-danger" v-if="form.errors.warehouse_manager_name">
                                    {{ form.errors.warehouse_manager_name }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>warehouse_manager_number:</label>
                                <input v-model="form.warehouse_manager_number" type="number"
                                    placeholder="Create warehouse_manager_number" class="form-control" />
                                <div class="text-danger" v-if="form.errors.warehouse_manager_number">
                                    {{ form.errors.warehouse_manager_number }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>warehouse_description:</label>
                                <textarea v-model="form.warehouse_description" type="text"
                                    placeholder="Create warehouse_description" class="form-control" />
                                <div class="text-danger" v-if="form.errors.warehouse_description">
                                    {{ form.errors.warehouse_description }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="coupon_subject">status</label>

                                <select id="coupon_subject" class="form-control" type="text" v-model="form.status"
                                    required>
                                    <option value="open">open</option>
                                    <option value="closed">closed</option>
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
                            <h5 class="modal-title">Warehouse Edit Form</h5>
                            <button subject="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <div class="mb-3">
                                <label>warehouse_name:</label>
                                <input v-model="form.warehouse_name" type="text" placeholder="Create warehouse_name"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.warehouse_name">
                                    {{ form.errors.warehousea_name }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>warehouse_code:</label>
                                <input v-model="form.warehouse_code" type="number" placeholder="Create warehouse_code"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.warehouse_code">
                                    {{ form.errors.warehouse_code }}
                                </div>
                            </div>


                            <div class="mb-3">
                                <label>warehouse_email:</label>
                                <input v-model="form.warehouse_email" type="email" placeholder="Create warehouse_email"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.warehouse_email">
                                    {{ form.errors.warehouse_email }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>warehouse_phone:</label>
                                <input v-model="form.warehouse_phone" type="number" placeholder="Create warehouse_phone"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.warehouse_phone">
                                    {{ form.errors.warehouse_phone }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>warehouse_address:</label>
                                <input v-model="form.warehouse_address" type="text"
                                    placeholder="Create warehouse_address" class="form-control" />
                                <div class="text-danger" v-if="form.errors.warehouse_address">
                                    {{ form.errors.warehouse_address }}
                                </div>
                            </div>


                            <div class="mb-3">
                                <label>warehouse_city:</label>
                                <input v-model="form.warehouse_city" type="text" placeholder="Create warehouse_city"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.warehouse_city">
                                    {{ form.errors.warehouse_city }}
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="coupon_subject">warehouse_districk</label>

                                <select id="coupon_subject" class="form-control" type="text"
                                    v-model="form.warehouse_districk" required>
                                    <option value="dhaka">dhaka</option>
                                    <option value="rajshahi">rajshahi</option>
                                    <option value="rangpur">rangpur</option>
                                    <option value="dinajpur">dinajpur</option>
                                    <option value="foridpur">foridpur</option>
                                    <option value="borishal">borishal</option>
                                    <option value="cumiila">cumiila</option>
                                    <option value="noakhali">noakhali</option>
                                    <option value="mymensingh">mymensingh</option>
                                    <option value="barombaria">barombaria</option>
                                    <option value="narayangonj">narayangonj</option>
                                    <option value="munshigonj">munshigonj</option>
                                    <option value="manikgonj">manikgonj</option>
                                    <option value="tangail">tangail</option>
                                    <option value="jamalpur">jamalpur</option>
                                    <option value="sherpur">sherpur</option>
                                    <option value="pabna">pabna</option>
                                    <option value="kustia">kustia</option>
                                    <option value="madaripur">madaripur</option>
                                    <option value="sherpur">sherpur</option>
                                </select>
                                <div class="text-danger" v-if="form.errors.warehouse_districk">
                                    {{ form.errors.warehouse_districk }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="coupon_subject">warehouse_area</label>

                                <select id="coupon_subject" class="form-control" type="text"
                                    v-model="form.warehouse_area" required>
                                    <option value="kamrangircjar">kamrangircjar</option>
                                    <option value="lalbagh">lalbagh</option>
                                    <option value="shyamoli">shyamoli</option>
                                    <option value="newmarket">newmarket</option>
                                    <option value="eliphenroad">eliphenroad</option>
                                    <option value="chata_mosque">chata_mosque</option>
                                    <option value="chad_mosque">chad_mosque</option>
                                    <option value="hagaribagh">hagaribagh</option>
                                    <option value="chowrasta">chowrasta</option>
                                    <option value="bongo_merket">bongo_merket</option>
                                    <option value="mirpur_1">mirpur_1</option>
                                    <option value="mirpur_2">mirpur_2</option>
                                    <option value="mirpur_9">mirpur_9</option>
                                    <option value="mirpur_10">mirpur_10</option>
                                    <option value="mirpur_11">mirpur_11</option>
                                    <option value="mirpur_12">mirpur_12</option>
                                    <option value="hatirjil">hatirjil</option>
                                </select>
                                <div class="text-danger" v-if="form.errors.warehouse_area">
                                    {{ form.errors.warehouse_area }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>warehouse_manager_name:</label>
                                <input v-model="form.warehouse_manager_name" type="text"
                                    placeholder="Create warehouse_manager_name" class="form-control" />
                                <div class="text-danger" v-if="form.errors.warehouse_manager_name">
                                    {{ form.errors.warehouse_manager_name }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>warehouse_manager_number:</label>
                                <input v-model="form.warehouse_manager_number" type="number"
                                    placeholder="Create warehouse_manager_number" class="form-control" />
                                <div class="text-danger" v-if="form.errors.warehouse_manager_number">
                                    {{ form.errors.warehouse_manager_number }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>warehouse_description:</label>
                                <textarea v-model="form.warehouse_description" type="text"
                                    placeholder="Create warehouse_description" class="form-control" />
                                <div class="text-danger" v-if="form.errors.warehouse_description">
                                    {{ form.errors.warehouse_description }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="coupon_subject">status</label>

                                <select id="coupon_subject" class="form-control" type="text" v-model="form.status"
                                    required>
                                    <option value="open">open</option>
                                    <option value="closed">closed</option>
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

const searchField = ["id", "warehouse_name", "warehouse_code", "warehouse_email", "warehouse_phone", "warehouse_address", "warehouse_city", "warehouse_districk", "warehouse_area", "warehouse_manager_name", "warehouse_manager_number", "warehouse_description", "status"];
const searchValue = ref();

const page = usePage();

const items = computed(() => page.props.WareHouse || []);
const headers = [
    { text: "ID", value: "id" },
    { text: "warehouse_name", value: "warehouse_name" },
    { text: "warehouse_code", value: "warehouse_code" },
    { text: "warehouse_email", value: "warehouse_email" },
    { text: "warehouse_phone", value: "warehouse_phone" },
    { text: "warehouse_address", value: "warehouse_address" },
    { text: "warehouse_city", value: "warehouse_city" },
    { text: "warehouse_districk", value: "warehouse_districk" },
    { text: "warehouse_area", value: "warehouse_area" },
    { text: "warehouse_manager_name", value: "warehouse_manager_name" },
    { text: "warehouse_manager_number", value: "warehouse_manager_number" },
    { text: "warehouse_description", value: "warehouse_description" },
    { text: "status", value: "status" },
    { text: "Action", value: "action" },

];
const form = useForm({
    id: null,
    warehouse_name: "",
    warehouse_code: "",
    warehouse_email: "",
    warehouse_phone: "",
    warehouse_address: "",
    warehouse_city: "",
    warehouse_districk: null,
    warehouse_area: "",
    warehouse_manager_name: "",
    warehouse_manager_number: "",
    warehouse_description: "",
    status: ""
});

const submitcreate = () => {
    form.post("/WareHousePage", {
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

    swal("Good job!", "This WareHouse Page will be added", "success");
};

function edit(item) {
    form.id = item.id;
    form.warehouse_name = item.warehouse_name;
    form.warehouse_code = item.warehouse_code; 
    form.warehouse_email = item.warehouse_email;
    form.warehouse_phone = item.warehouse_phone;
    form.warehouse_address = item.warehouse_address;
    form.warehouse_city = item.warehouse_city;
    form.warehouse_districk = item.warehouse_districk;
    form.warehouse_area = item.warehouse_area;
    form.warehouse_manager_name = item.warehouse_manager_name;
    form.warehouse_manager_number = item.warehouse_manager_number;
    form.warehouse_description = item.warehouse_description;
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

        .post(`/WareHousePage/${form.id}`, {
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

    swal("Good job!", "This WareHouse Page will be updated", "success");
}

function remove(data) {

    swal({
        title: "Are you sure?",
        text: "This WareHouse Page will be deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {

        if (willDelete) {

            router.delete(`/WareHousePage/${data.id}`, {
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