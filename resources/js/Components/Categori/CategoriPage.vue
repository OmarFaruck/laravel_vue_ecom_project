<template>
    <div class="container-fluid">
        <div class="card mt-4 px-4 py-4 container text-center justify-content-center">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="/">
                    <h2>Return Page</h2>
                </a>
                <h2>Categori Pages</h2>


                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Add Categori Page
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

                <tbody v-if="Categori && Categori.length">
                    <tr v-for="categori in Categori" :key="categori.id">
                        <td>{{ categori.id }}</td>
                        <!-- <td>
                        <img v-if="categori.image" :src="imgUrl(categori.image)" width="50" height="50"
                            style="object-fit: cover; border-radius: 10px" />
                    </td> -->
                        <td>{{ categori.name }}</td>
                        <td>{{ categori.description }}</td>
                        <td>
                            <button @click="edit(categori)" class="btn btn-outline-success me-2">
                                <SquarePen /> Edit
                            </button>
                            <button @click="remove(categori)" class="btn btn-sm btn-danger">
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
                            <h5 class="modal-title">Categori Form</h5>
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

<script>
import { useForm } from "@inertiajs/vue3";
import { Modal } from "bootstrap";


export default {
    setup() {
        const form = useForm({
            name: "",
            description: "",
        });

        function submitcreate() {
            form.post("/category", {
                onSuccess: () => {
                    form.reset();

                    const modalElement = document.getElementById("exampleModal");
                    const modal =
                        Modal.getInstance(modalElement) ||
                        new Modal(modalElement);

                    modal.hide();

                    document.body.classList.remove("modal-open");
                    document
                        .querySelectorAll(".modal-backdrop")
                        .forEach((el) => el.remove());
                },
            });
        }

        return {
            form,
            submitcreate,
        };
    },

    data() {
        return {
            Categori: [],
        };
    },
};





</script>