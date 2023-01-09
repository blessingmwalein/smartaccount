<template>
    <MainLayout>
        <div class="content">
            <!-- Start Content-->
            <PageHolder :links="links" title="Stock Categories">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-sm-5">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#add-category"
                                            class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add
                                            Category</a>
                                        <div id="add-category" class="modal fade" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="standard-modalLabel">Create Stock
                                                            Category
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
                                                                <label for="address"
                                                                    class="form-label">Description</label>
                                                                <textarea class="form-control"
                                                                    v-model="form.description" id="example-textarea"
                                                                    rows="5"></textarea>
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

                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-centered w-100 dt-responsive nowrap"
                                        id="products-datatable">
                                        <thead class="table-light">
                                            <tr>

                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Added Date</th>
                                                <th style="width: 85px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="category in categories">

                                                <td>
                                                    {{ category.name }}
                                                </td>
                                                <td>
                                                    {{ category.description }}
                                                </td>
                                                <td>
                                                    {{ category.created_at }}
                                                </td>


                                                <td class="table-action">

                                                    <a @click.prevent="edit(category)" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#add-category" class="action-icon"> <i
                                                            class="mdi mdi-square-edit-outline"></i></a>
                                                    <a href="javascript:void(0);" class="action-icon"> <i
                                                            class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>



                                        </tbody>
                                    </table>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
            </PageHolder>


        </div>
    </MainLayout>
</template>
<script>
import MainLayout from '../Layouts/MainLayout.vue';
import PageHolder from '../Layouts/PageHolder.vue';
import { useForm, Link } from "@inertiajs/inertia-vue3";

export default {
    props: ['categories'],
    name: 'StockCategory',
    components: {
        MainLayout,
        PageHolder
    },
    data() {
        return {
            links: [{
                name: 'Stock',
                link: '/stock',
                isActive: false
            },
            {
                name: 'Category',
                link: '/stock/category',
                isActive: true
            }
            ],
            isEdit: false,
            form: useForm({
                name: "",
                description: "",
                id: null
            }),
            

        }
    },
    methods: {
        submit() {
            if (this.isEdit) {
                this.form.post(`/admin/stock/category/${this.form.id}`, {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.isEdit = false;
                        this.form.reset('name', 'description', 'id')
                        document.getElementById('cancel').click()
                    }
                })
            } else {
                this.form.post(route('categories.store'), {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.isEdit = false;
                        this.form.reset('name', 'description', 'id')
                        document.getElementById('cancel').click()
                    }
                })
            }

        },

        edit(category) {
            this.isEdit = true;
            this.form.name = category.name;
            this.form.description = category.description;
            this.form.id = category.id;
            // this.form.image = store.image;
        }
    }
}
</script>