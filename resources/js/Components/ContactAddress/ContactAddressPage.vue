<template>


    <div class="container-fluid">
        <div class="card mt-4 py-4 container text-center justify-content-center">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="mb-3">
                    <label class="align-items-left">Search Name:</label>
                    <input v-model="searchValue" placeholder="Search by name..." type="text" class="form-control" />
                </div>
                <h2>Contact Address Page</h2>


                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Add Contact Address
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
                            <h5 class="modal-title">Contact Address Create Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body"> 

                            <div class="mb-3">
                                <label>Heading:</label>
                                <input v-model="form.heading" type="text" placeholder="Create Heading"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.heading">
                                    {{ form.errors.heading }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Message:</label>
                                <input v-model="form.message" type="text" placeholder="Create Message"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.message">
                                    {{ form.errors.message }}
                                </div>
                            </div> 

                            <div class="mb-3">
                                <label>Address_1:</label>
                                <input v-model="form.address_1" type="text" placeholder="Create Address_1"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.address_1">
                                    {{ form.errors.address_1 }}
                                </div>
                            </div> 

                            <div class="mb-3">
                                <label>Our Email_1:</label>
                                <input v-model="form.ouremail_1" type="email" placeholder="Create Our Email 1" class="form-control" />
                                <div class="text-danger" v-if="form.errors.ouremail_1">
                                    {{ form.errors.ouremail_1 }}
                                </div>
                            </div>  

                            <div class="mb-3">
                                <label>Phone 1:</label>
                                <input v-model="form.phone_1" type="text" placeholder="Create Phone" class="form-control" />
                                <div class="text-danger" v-if="form.errors.phone_1">
                                    {{ form.errors.phone_1 }}
                                </div>
                            </div>  

                            <div class="mb-3">
                                <label>Address 2:</label>
                                <input v-model="form.address_2" type="text" placeholder="Create Address 2" class="form-control" />
                                <div class="text-danger" v-if="form.errors.address_2">
                                    {{ form.errors.address_2 }}
                                </div>
                            </div>  
                            <div class="mb-3">
                                <label>Our Email 2:</label>
                                <input v-model="form.ouremail_2" type="email" placeholder="Create Our Email 2" class="form-control" />
                                <div class="text-danger" v-if="form.errors.ouremail_2">
                                    {{ form.errors.ouremail_2 }}
                                </div>
                            </div>  
                            <div class="mb-3">
                                <label>Phone 2:</label>
                                <input v-model="form.phone_2" type="text" placeholder="Create Phone 2" class="form-control" />
                                <div class="text-danger" v-if="form.errors.phone_2">
                                    {{ form.errors.phone_2 }}
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
                                <label>Heading:</label>
                                <input v-model="form.heading" type="text" placeholder="Create Heading"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.heading">
                                    {{ form.errors.heading }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Message:</label>
                                <input v-model="form.message" type="text" placeholder="Create Message"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.message">
                                    {{ form.errors.message }}
                                </div>
                            </div> 

                            <div class="mb-3">
                                <label>Address 1:</label>
                                <input v-model="form.address_1" type="text" placeholder="Create Address 1"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.address_1">
                                    {{ form.errors.address_1 }}
                                </div>
                            </div> 

                            <div class="mb-3">
                                <label>Our Email 1:</label>
                                <input v-model="form.ouremail_1" type="email" placeholder="Create Email" class="form-control" />
                                <div class="text-danger" v-if="form.errors.ouremail_1">
                                    {{ form.errors.ouremail_1 }}
                                </div>
                            </div>  

                            <div class="mb-3">
                                <label>Phone 1:</label>
                                <input v-model="form.phone_1" type="number" placeholder="Create Phone" class="form-control" />
                                <div class="text-danger" v-if="form.errors.phone_1">
                                    {{ form.errors.phone_1 }}
                                </div>
                            </div>  

                            <div class="mb-3">
                                <label>Address 2:</label>
                                <input v-model="form.address_2" type="text" placeholder="Create Address 2" class="form-control" />
                                <div class="text-danger" v-if="form.errors.address_2">
                                    {{ form.errors.address_2 }}
                                </div>
                            </div>  
                            <div class="mb-3">
                                <label>Our Email 2:</label>
                                <input v-model="form.ouremail_2" type="email" placeholder="Create Our Email 2" class="form-control" />
                                <div class="text-danger" v-if="form.errors.ouremail_2">
                                    {{ form.errors.ouremail_2 }}
                                </div>
                            </div>  
                            <div class="mb-3">
                                <label>Phone 2:</label>
                                <input v-model="form.phone_2" type="number" placeholder="Create Phone 2" class="form-control" />
                                <div class="text-danger" v-if="form.errors.phone_2">
                                    {{ form.errors.phone_2 }}
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

const searchField = ["id", "heading","message", "address_1", "ouremail_1", "phone_1", "address_2", "ouremail_2", "phone_2"];
const searchValue = ref();

const page = usePage();

const items = computed(() => page.props.ContactAddress || []);
const headers = [
    { text: "ID", value: "id" }, 
    { text: "Heading", value: "heading" },
    { text: "Message", value: "message" }, 
    { text: "Address 1", value: "address_1" }, 
    { text: "Our Email 1", value: "ouremail_1" }, 
    { text: "Phone 1", value: "phone_1" }, 
    { text: "Address 2", value: "address_2" }, 
    { text: "Our Email 2", value: "ouremail_2" }, 
    { text: "Phone 2", value: "phone_2" }, 
    { text: "Action", value: "action" },

];
const form = useForm({
    id: null,
    heading: "",
    message: "",
    address_1: "",
    ouremail_1: "",
    phone_1: "",
    address_2: "",
    ouremail_2: "",
    phone_2: ""
});

const submitcreate = () => {
    form.post("/admin/contactaddress", {
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

    swal("Good job!", "This contact address will be added", "success");
};

function edit(item) {
    form.id = item.id; 
    form.heading = item.heading;
    form.message = item.message;
    form.address_1 = item.address_1;
    form.ouremail_1 = item.ouremail_1;
    form.phone_1 = item.phone_1;
    form.address_2 = item.address_2;
    form.ouremail_2 = item.ouremail_2;
    form.phone_2 = item.phone_2;
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

        .post(`/admin/contactaddress/${form.id}`, {
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

    swal("Good job!", "This contact address will be updated", "success");
}

function remove(data) {

    swal({
        title: "Are you sure?",
        text: "This contact address will be deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {

        if (willDelete) {

            router.delete(`/admin/contactaddress/${data.id}`, {
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