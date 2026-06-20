<template>


    <div class="container-fluid">
        <div class="card mt-4 px-4 py-4 container text-center justify-content-center">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="mb-3">
                    <label class="align-items-left">Search Name:</label>
                    <input v-model="searchValue" placeholder="Search by name..." type="text" class="form-control" />
                </div>
                <h2>Just-Arrived Page</h2>


                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Add Just-Arrived
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

                <template #item-image="item">
                    <img :src="`/storage/justarrived/${item.image}`" width="80" height="60" class="rounded" />
                </template>

            </Vue3EasyDataTable>
        </div>


        <!-- input From Page -->
        <div class="modal fade" id="exampleModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form @submit.prevent="submitcreate">
                        <div class="modal-header">
                            <h5 class="modal-title">Just-Arrived Create Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Image:</label>
                                <input @input="form.image = $event.target.files[0]" type="file" class="form-control" />
                                <div class="text-danger" v-if="form.errors.image">
                                    {{ form.errors.image }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Heading:</label>
                                <input v-model="form.heading" type="text" placeholder="Create Heading"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.heading">
                                    {{ form.errors.heading }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Title:</label>
                                <input v-model="form.title" type="text" placeholder="Create Title"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.title">
                                    {{ form.errors.title }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Prize:</label>
                                <input v-model="form.prize" type="number" placeholder="Create Prize"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.prize">
                                    {{ form.errors.prize }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>CancelPrize:</label>
                                <input v-model="form.cancelprize" type="number" placeholder="Create Cancel Prize"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.cancelprize">
                                    {{ form.errors.cancelprize }}
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
                            <h5 class="modal-title">Just-Arrived Edit Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Image:</label>
                                <input @input="form.image = $event.target.files[0]" type="file" class="form-control" />
                                <div class="text-danger" v-if="form.errors.image">
                                    {{ form.errors.image }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Heading:</label>
                                <input v-model="form.heading" type="text" placeholder="Create Heading"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.heading">
                                    {{ form.errors.heading }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Title:</label>
                                <input v-model="form.title" type="text" placeholder="Create Title"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.title">
                                    {{ form.errors.title }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Prize:</label>
                                <input v-model="form.prize" type="number" placeholder="Create Prize"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.prize">
                                    {{ form.errors.prize }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>CancelPrize:</label>
                                <input v-model="form.cancelprize" type="number" placeholder="Create Cancel Prize"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.cancelprize">
                                    {{ form.errors.cancelprize }}
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

const searchField = ["id", "image","heading","title","prize","cancelprize"];
const searchValue = ref();

const page = usePage();

const items = computed(() => page.props.justarriveds || []);
const headers = [
    { text: "ID", value: "id" },
    { text: "Image", value: "image" }, 
    { text: "Heading", value: "heading" },
    { text: "Title", value: "title" },
    { text: "Prize", value: "prize" },
    { text: "Cancel Prize", value: "cancelprize" },
    { text: "Action", value: "action" },

];
const form = useForm({
    id: null,
    image: null, 
    heading: "",
    title: "",
    prize: "",
    cancelprize: "",
    // image: null,
});

const submitcreate = () => {
    form.post("/admin/justarrived", {
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

    swal("Good job!", "This JustArrived will be added", "success");
};

function edit(item) {
    form.id = item.id;
    form.image = null; 
    form.heading = item.heading;
    form.title = item.title;
    form.prize = item.prize;
    form.cancelprize = item.cancelprize;
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

        .post(`/admin/justarrived/${form.id}`, {
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

    swal("Good job!", "This justarrived will be updated", "success");
}

function remove(data) {

    swal({
        title: "Are you sure?",
        text: "This Collection will be deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {

        if (willDelete) {

            router.delete(`/admin/justarrived/${data.id}`, {
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