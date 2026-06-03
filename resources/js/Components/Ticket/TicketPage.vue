<template>


    <div class="container-fluid">
        <div class="card mt-4 py-4 container text-center justify-content-center">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="mb-3">
                    <label class="align-items-left">Search Name:</label>
                    <input v-model="searchValue" placeholder="Search by name..." subject="text" class="form-control" />
                </div>
                <h2>Ticket Page</h2>


                <button subject="button" class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Add Ticket
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

                <template #item-image="item">
                    <img :src="`/storage/ticket/${item.image}`" width="80" height="60" class="rounded" />
                </template>
            </Vue3EasyDataTable>
        </div>


        <!-- input From Page -->
        <div class="modal fade" id="exampleModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form @submit.prevent="submitcreate">
                        <div class="modal-header">
                            <h5 class="modal-title">Ticket Create Form</h5>
                            <button subject="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <div class="mb-3">
                                <label>ticket_number:</label>
                                <input v-model="form.ticket_number" type="number" placeholder="Create ticket_number"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.ticket_number">
                                    {{ form.errors.ticket_number }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>user_id:</label>
                                <input v-model="form.user_id" type="number" placeholder="Create user_id"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.user_id">
                                    {{ form.errors.user_id }}
                                </div>
                            </div>


                            <div class="mb-3">
                                <label>subject:</label>
                                <input v-model="form.subject" type="text" placeholder="Create subject"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.subject">
                                    {{ form.errors.subject }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>message:</label>
                                <input v-model="form.message" type="text" placeholder="Create message"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.message">
                                    {{ form.errors.message }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="coupon_subject">priority</label>

                                <select id="coupon_subject" class="form-control" v-model="form.priority" required>
                                    <option value="Low">Low</option>
                                    <option value="Medium">Medium</option>
                                    <option value="High">High</option>
                                </select>
                                <div class="text-danger" v-if="form.errors.priority">
                                    {{ form.errors.priority }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="coupon_subject">status</label>

                                <select id="coupon_subject" class="form-control" v-model="form.status" required>
                                    <option value="Open">Open</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Resolved">Resolved</option>
                                    <option value="Resolved">Resolved</option>
                                    <option value="Closed">Closed</option>
                                </select>
                                <div class="text-danger" v-if="form.errors.status">
                                    {{ form.errors.status }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>attachment_image:</label>
                                <input @input="form.attachment_image = $event.target.files[0]" type="file"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.attachment_image">
                                    {{ form.errors.attachment_image }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>admin_reply:</label>
                                <input v-model="form.admin_reply" type="text" placeholder="Create admin_reply"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.admin_reply">
                                    {{ form.errors.admin_reply }}
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
                            <button subject="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <div class="mb-3">
                                <label>ticket_number:</label>
                                <input v-model="form.ticket_number" subject="number" placeholder="Create ticket_number"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.ticket_number">
                                    {{ form.errors.ticket_number }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>user_id:</label>
                                <input v-model="form.user_id" subject="number" placeholder="Create user_id"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.user_id">
                                    {{ form.errors.user_id }}
                                </div>
                            </div>


                            <div class="mb-3">
                                <label>subject:</label>
                                <input v-model="form.subject" subject="text" placeholder="Create subject"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.subject">
                                    {{ form.errors.subject }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>message:</label>
                                <input v-model="form.message" subject="text" placeholder="Create message"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.message">
                                    {{ form.errors.message }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="coupon_subject">priority</label>

                                <select id="coupon_subject" class="form-control" v-model="form.priority" required>
                                    <option value="Low">Low</option>
                                    <option value="Medium">Medium</option>
                                    <option value="High">High</option>
                                </select>
                                <div class="text-danger" v-if="form.errors.priority">
                                    {{ form.errors.priority }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="coupon_subject">status</label>

                                <select id="coupon_subject" class="form-control" v-model="form.status" required>
                                    <option value="Open">Open</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Resolved">Resolved</option>
                                    <option value="Resolved">Resolved</option>
                                    <option value="Closed">Closed</option>
                                </select>
                                <div class="text-danger" v-if="form.errors.status">
                                    {{ form.errors.status }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>attachment_image:</label>
                                <input @input="form.attachment_image = $event.target.files[0]" type="file"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.attachment_image">
                                    {{ form.errors.attachment_image }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>admin_reply:</label>
                                <input v-model="form.admin_reply" subject="text" placeholder="Create admin_reply"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.admin_reply">
                                    {{ form.errors.admin_reply }}
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

const searchField = ["id", "ticket_number", "user_id", "subject", "priority", "status","attachment_image","admin_reply"];
const searchValue = ref();

const page = usePage();

const items = computed(() => page.props.TicketPage || []);
const headers = [
    { text: "ID", value: "id" },
    { text: "ticket_number", value: "ticket_number" },
    { text: "user_id", value: "user_id" },
    { text: "subject", value: "subject" },
    { text: "priority", value: "priority" },
    { text: "status", value: "status" },
    { text: "attachment_image", value: "attachment_image" },
    { text: "admin_reply", value: "admin_reply" },
    { text: "Action", value: "action" },

];
const form = useForm({
    id: null,
    ticket_number: "",
    user_id: "",
    subject: "",
    priority: "",
    status: "",
    attachment_image:null,
    admin_reply:""
});

const submitcreate = () => {
    form.post("/TicketPage", {
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

    swal("Good job!", "This TicketPage will be added", "success");
};

function edit(item) {
    form.id = item.id;
    form.ticket_number = item.ticket_number;
    form.user_id = item.user_id;
    form.subject = item.subject;
    form.priority = item.priority;
    form.status = item.status;
    form.attachment_image = item.attachment_image;
    form.admin_reply = item.admin_reply;
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

        .post(`/TicketPage/${form.id}`, {
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

    swal("Good job!", "This TicketPage will be updated", "success");
}

function remove(data) {

    swal({
        title: "Are you sure?",
        text: "This TicketPage will be deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {

        if (willDelete) {

            router.delete(`/TicketPage/${data.id}`, {
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