<template>
    <MainLayout>
        <div class="content">
            <PageHolder title="Customers" :links="links">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-sm-5">
                                        <a data-bs-toggle="modal" data-bs-target="#add-customer"
                                            class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add
                                            Customer</a>
                                        <div id="add-customer" class="modal fade" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="standard-modalLabel">Create Customer
                                                        </h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-hidden="true"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form @submit.prevent="submit" class="ps-3 pe-3">

                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Name</label>
                                                                <input class="form-control" v-model="form.name"
                                                                    type="text" id="emailaddress1" required=""
                                                                    placeholder="Category">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Phone</label>
                                                                <input class="form-control" v-model="form.phone"
                                                                    type="text" id="emailaddress1" required=""
                                                                    placeholder="Category">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Email</label>
                                                                <input class="form-control" v-model="form.email"
                                                                    type="email" id="emailaddress1" required=""
                                                                    placeholder="Category">
                                                            </div>


                                                            <div class="mb-3">
                                                                <label for="address" class="form-label">Address</label>
                                                                <textarea class="form-control" v-model="form.address"
                                                                    id="example-textarea" rows="5"></textarea>
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
                                                <th>Address</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Create Date</th>
                                                <th style="width: 75px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="customer in customers">

                                                <td class="table-user">
                                                    <img src="/images/user.jpg" alt="table-user"
                                                        class="me-2 rounded-circle">
                                                    <a href="javascript:void(0);"
                                                        class="text-body fw-semibold">{{ customer.name }}</a>
                                                </td>
                                                <td>
                                                    {{ customer.address }}
                                                </td>
                                                <td>
                                                    <span class="fw-semibold">{{ customer.email }}</span>
                                                </td>
                                                <td>
                                                    <span class="fw-semibold">{{ customer.phone }}</span>
                                                </td>

                                                <td>
                                                    {{ customer.created_at }}
                                                </td>

                                                <td>
                                                    <a @click.prevent="edit(customer)" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#add-customer" class="action-icon"> <i
                                                            class="mdi mdi-square-edit-outline"></i></a>
                                                    <a href="javascript:void(0);" class="action-icon"> <i
                                                            class="mdi mdi-delete"></i></a>
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
    name: 'Customer',
    props: ['customers'],
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
                    name: 'Customers',
                    link: '/customers',
                    isActive: true
                }
            ],
            isEdit: false,
            form: useForm({
                name: "",
                email: "",
                phone: "",
                address: "",
                id: null
            })
        }
    },
    methods: {
        submit() {
            if (this.isEdit) {
                this.form.post(`/admin/customers/${this.form.id}`, {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.isEdit = false;
                        this.form.reset('name', 'address','email','phone', 'id')
                        document.getElementById('cancel').click()
                    }
                })
            } else {
                this.form.post(route('customers.store'), {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.isEdit = false;
                        this.form.reset('name', 'address','email','phone', 'id')
                        document.getElementById('cancel').click()
                    }
                })
            }

        },

        edit(customer) {
            this.isEdit = true;
            this.form.name = customer.name;
            this.form.phone = customer.phone;
            this.form.email = customer.email;
            this.form.address = customer.address;
            this.form.id = customer.id;
            // this.form.image = store.image;
        }
    }
}
</script>