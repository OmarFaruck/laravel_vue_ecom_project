<template>
  

    <div class="container-fluid">
        <div class="card mt-4 px-4 py-4 container text-center justify-content-center">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="/admin/dashboard">
                    <h2>Return Page</h2>
                </a>
                <h2>Category Pages</h2>


                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Add Category Page
                </button>


            </div>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody v-if="Category && Category.length">
                    <tr v-for="category in Category" :key="category.id">
                        <td>{{ category.id }}</td>
                        <!-- <td>
                        <img v-if="category.image" :src="imgUrl(category.image)" width="50" height="50"
                            style="object-fit: cover; border-radius: 10px" />
                    </td> -->
                        <td>{{ category.name }}</td>
                        <td>{{ category.description }}</td>
                        <td>
                            <button @click="edit(category)" class="btn btn-outline-success me-2">
                                <SquarePen /> Edit
                            </button>
                            <button @click="remove(category)" class="btn btn-sm btn-danger">
                                <Trash2 /> Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <!-- input From Page -->
        <div class="modal fade" id="exampleModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form @submit.prevent="submitcreate">
                        <div class="modal-header">
                            <h5 class="modal-title">Category Form</h5>
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
                                <label>Description:</label>
                                <input v-model="form.description" type="text" class="form-control" />
                                <div class="text-danger" v-if="form.errors.description">
                                    {{ form.errors.description }}
                                </div>
                            </div>

                            <!-- <div class="mb-3">
                            <label>Image:</label>
                            <input type="file" @change="uploadImage" class="form-control" />
                            <div class="text-danger" v-if="form.errors.image">
                                {{ form.errors.image }}
                            </div>
                        </div> -->
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
                            <h5 class="modal-title">Category Form</h5>
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
                                <label>Description:</label>
                                <input v-model="form.description" type="text" class="form-control" />
                                <div class="text-danger" v-if="form.errors.description">
                                    {{ form.errors.description }}
                                </div>
                            </div>

                            <!-- <div class="mb-3">
                            <label>Image:</label>
                            <input type="file" @change="uploadImage" class="form-control" />
                            <div class="text-danger" v-if="form.errors.image">
                                {{ form.errors.image }}
                            </div>
                        </div> -->
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
import { useForm } from "@inertiajs/vue3";
import { Modal } from "bootstrap";
 import { SquarePen, Trash2 } from '@lucide/vue';
const form = useForm({
    name: "",
    description: "",
    // image: null,
});

const submitcreate = () => {
    form.post("/category", {
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


function edit(category) {
    form.id = category.id;
    form.name = category.name;
    form.description = category.description;
    const editModal = new Modal(document.getElementById("editModal"));
    editModal.show();
}

function submitUpdate() {



     const ModelEI = document.getElementById("editModal");
    const editModal = Modal.getInstance(ModelEI);
    editModal.hide();

    form.transform((data) => ({
        ...data,
        _method: "put",
    }))

    .post(`/category/${form.id}`, {
        ForceFormData:true,
        onfinish:()=>{
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

function remove(category) {
    swal({
        title: "Are you sure?",
        text: "This category will be deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {

        if (willDelete) {
            form.delete(`/category/${category.id}`, {
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
 defineProps({
    Category: Array,
});

</script>