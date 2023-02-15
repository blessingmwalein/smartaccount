<template>
    <MainLayout>
        <div class="content">
            <PageHolder title="Users" :links="links">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-sm-5">
                                        <a data-bs-toggle="modal" data-bs-target="#add-user"
                                            class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add
                                            User</a>
                                        <div id="add-user" class="modal fade" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="standard-modalLabel">Create User
                                                        </h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-hidden="true"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form @submit.prevent="submit" class="ps-3 pe-3">

                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Name</label>
                                                                <input class="form-control" v-model="form.name"
                                                                    type="text" id="emailaddress1" required="">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Role</label>
                                                                <select class="form-select mb-3" v-model="form.role">
                                                                    <option selected>Open select role</option>
                                                                    <option value="admin">
                                                                        Admin</option>
                                                                    <option value="user">
                                                                        User</option>

                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Store</label>
                                                                <select class="form-select mb-3"
                                                                    v-model="form.store_id">
                                                                    <option selected>Open select store</option>
                                                                    <option v-for="store in stores" :value="store.id">
                                                                        {{ store.name }}</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Email</label>
                                                                <input class="form-control" v-model="form.email"
                                                                    type="email" id="emailaddress1" required="">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Password</label>
                                                                <input class="form-control" v-model="form.password"
                                                                    type="password" id="emailaddress1" required="">
                                                            </div>



                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" id="cancel"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>

                                                        </form>

                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="text-sm-end">
                                            <button type="button" class="btn btn-success mb-2 me-1"><i
                                                    class="mdi mdi-cog"></i></button>
                                            <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                            <button type="button" class="btn btn-light mb-2">Export</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table
                                        class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap"
                                        id="products-datatable">
                                        <thead class="table-light">
                                            <tr>

                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Create Date</th>
                                                <th style="width: 75px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="user in users">

                                                <td class="table-user">
                                                    <img src="/images/user.jpg" alt="table-user"
                                                        class="me-2 rounded-circle">
                                                    <a href="javascript:void(0);" class="text-body fw-semibold">{{
                                                        user.name
                                                    }}</a>
                                                </td>

                                                <td>
                                                    <span class="fw-semibold">{{ user.email }}</span>
                                                </td>
                                                <td>
                                                    <span class="fw-semibold">{{ user.role }}</span>
                                                </td>

                                                <td>
                                                    {{ user.created_at }}
                                                </td>

                                                <td>
                                                    <a @click.prevent="edit(user)" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#add-user" class="action-icon"> <i
                                                            class="mdi mdi-square-edit-outline"></i></a>
                                                    <a href="#" class="action-icon" @click.prevent="deleteUser(user)">
                                                        <i class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </PageHolder>

        </div>
    </MainLayout>
</template>
<script lang="js">
import MainLayout from '../Layouts/MainLayout.vue';
import PageHolder from '../Layouts/PageHolder.vue';
import { useForm, Link } from "@inertiajs/inertia-vue3";

export default {
    name: 'User',
    props: ['users', 'stores'],
    components: {
        MainLayout,
        PageHolder
    },
    data() {
        return {
            links: [
                {
                    name: 'Dashboard',
                    link: '/dashboard',
                    isActive: false
                },
                {
                    name: 'Users',
                    link: '/users',
                    isActive: true
                }
            ],
            isEdit: false,
            form: useForm({
                name: "",
                email: "",
                role: "",
                password: "",
                id: null,
                store_id: null
            })
        }
    },
    methods: {
        submit() {
            if (this.isEdit) {
                this.form.post(`/admin/users/${this.form.id}`, {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.isEdit = false;
                        this.form.reset()
                        document.getElementById('cancel').click()
                    }
                })
            } else {
                this.form.post(route('users.store'), {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.isEdit = false;
                        this.form.reset()
                        document.getElementById('cancel').click()
                    }
                })
            }

        },
        deleteUser(user) {
            if (confirm('Are you sure you want to delete this user?')) {
                this.$inertia.delete(`/admin/users/${user.id}`, {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.isEdit = false;
                    }
                })
            }
        },

        edit(user) {
            this.isEdit = true;
            this.form.name = user.name;
            this.form.role = user.role;
            this.form.email = user.email;
            this.form.id = user.id;
            this.form.store_id = user.store_id
            // this.form.image = store.image;
        }
    }
}
</script>