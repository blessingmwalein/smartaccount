<template>
    <MainLayout>
        <div class="content">

            <!-- Start Content-->
            <PageHolder title="Stores" :links="links">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#add-store"
                            class="btn btn-danger rounded-pill mb-3"><i class="mdi mdi-plus"></i> Add Store</a>
                        <!-- Signup modal-->


                        <div id="add-store" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="standard-modalLabel">Create Store</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form @submit.prevent="submit" class="ps-3 pe-3">

                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input class="form-control" v-model="form.name" type="text"
                                                    id="emailaddress1" required="" placeholder="Shop 1">
                                            </div>

                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone Number</label>
                                                <input class="form-control" type="text" v-model="form.phone" required=""
                                                    id="password1" placeholder="Phone Number">
                                            </div>
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address</label>
                                                <textarea class="form-control" v-model="form.address"
                                                    id="example-textarea" rows="5"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Image</label>
                                                <input class="form-control" @input="form.image = $event.target.files[0]"
                                                    type="file" id="password1">
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" id="cancel"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>

                                        </form>

                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>

                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">

                            <div class="btn-group mb-3 ms-2 d-none d-sm-inline-block">
                                <button type="button" class="btn btn-secondary"><i
                                        class="ri-function-line"></i></button>
                            </div>
                            <div class="btn-group mb-3 d-none d-sm-inline-block">
                                <button type="button" class="btn btn-link text-muted"><i
                                        class="ri-list-check-2"></i></button>
                            </div>
                        </div>
                    </div><!-- end col-->
                </div>


                <div class="row">
                    <div class="col-md-6 col-xxl-3" v-for="store in stores">
                        <!-- project card -->
                        <div class="card d-block">
                            <!-- project-thumbnail -->
                            <img class="card-img-top" :src="`/images/${store.image}`" alt="project image cap">

                            <div class="card-body position-relative">
                                <div class="dropdown card-widgets">
                                    <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="ri-more-fill"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a @click.prevent="edit(store)" href="#" data-bs-toggle="modal"
                                            data-bs-target="#add-store" class="dropdown-item"><i
                                                class="mdi mdi-pencil me-1"></i>Edit</a>
                                        <!-- item-->
                                        <a href="#" class="dropdown-item" @click.prevent="deleteStore(store)"><i
                                                class="mdi mdi-delete me-1"></i>Delete</a>
                                    </div>
                                </div>
                                <!-- project title-->
                                <h4 class="mt-0">
                                    <Link :href="`/admin/stores/${store.id}`" class="text-title">{{ store.name }}</Link>
                                </h4>

                                <p class="text-muted font-13 my-3">Address:{{ store.address }}
                                </p>
                                <p class="text-muted font-13 my-3">Phone:{{ store.phone }}
                                </p>
                                <p class="mb-1">
                                    <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                        <b>{{ store.stock_allocations.length }}</b> Stock Allocated
                                    </span>

                                </p>

                                <!-- <p class="mb-2 fw-bold">Stock Left <span class="float-end">45%</span></p>
                                <div class="progress progress-sm">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0"
                                        aria-valuemax="100" style="width: 45%;">
                                    </div>
                                </div> -->
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->

                </div>
                <!-- end row-->
            </PageHolder>


        </div> <!-- content -->

    </MainLayout>
</template>
<script>
import MainLayout from '../Layouts/MainLayout.vue';
import PageHolder from '../Layouts/PageHolder.vue';
import { useForm, Link } from "@inertiajs/inertia-vue3";

export default {
    name: 'Store',
    props: ['stores', 'stocks'],
    components: {
        MainLayout,
        PageHolder, Link
    },
    data() {
        return {
            links: [
                {
                    name: "Home",
                    isActive: false
                },
                {
                    name: "Stores",
                    isActive: true
                },
            ],
            isEdit: false,
            form: useForm({
                name: "",
                phone: "",
                address: "",
                image: null,
                id: null
            }),

        }
    },
    methods: {
        submit() {
            if (this.isEdit) {
                this.form.post(`/admin/stores/${this.form.id}`, {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.isEdit = false;
                        this.form.reset('name', 'phone', 'address', 'image', 'id')
                        document.getElementById('cancel').click()
                    }
                })
            } else {
                this.form.post(route('stores.store'), {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.isEdit = false;
                        this.form.reset('name', 'phone', 'address', 'image', 'id')
                        document.getElementById('cancel').click()
                    }
                })
            }

        },

        //submit delete store request
        deleteStore(store) {
            if (confirm('Are you sure you want to delete this store?')) {
                this.$inertia.delete(`/admin/stores/${store.id}`, {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.isEdit = false;
                    }
                })
            }
        },

        edit(store) {
            this.isEdit = true;
            this.form.name = store.name;
            this.form.address = store.address;
            this.form.phone = store.phone;
            this.form.id = store.id;
            // this.form.image = store.image;
        }
    }
}
</script>