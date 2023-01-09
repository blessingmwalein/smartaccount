<template>
    <MainLayout>
        <div class="content">

            <!-- Start Content-->
            <PageHolder title="Stores" :links="links">
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
                                        <input class="form-control" v-model="form.name" type="text" id="emailaddress1"
                                            required="" placeholder="Shop 1">
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input class="form-control" type="text" v-model="form.phone" required=""
                                            id="password1" placeholder="Phone Number">
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea class="form-control" v-model="form.address" id="example-textarea"
                                            rows="5"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Image</label>
                                        <input class="form-control" @input="form.image = $event.target.files[0]"
                                            type="file" required="" id="password1">
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
                <div id="add-stock" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="standard-modalLabel">Allocate Stock</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-hidden="true"></button>
                            </div>
                            <div class="modal-body">

                                <form @submit.prevent="submitAllocate" class="ps-3 pe-3">

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Product</label>
                                        <select class="form-select mb-3" v-model="allocateStockForm.stock_id"
                                            @change="selectProduct">
                                            <option selected>Open this select product</option>
                                            <option :value="product.id" v-for="product in stocks">{{ product.name }}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Availablr units</label>
                                        <input class="form-control" type="text" v-model="available_units" disabled
                                            required="" id="password1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Number Of Units</label>
                                        <input class="form-control" type="text"
                                            v-model="allocateStockForm.number_items_unit" required="" id="password1">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" id="cancelStock"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>

                                </form>

                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
                <div class="row">
                    <div class="col-xxl-12 col-lg-6">

                        <div class="card d-block">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h3 class="">{{ store.name }}</h3>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#add-store"
                                                class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>

                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="mdi mdi-delete me-1"></i>Delete</a>

                                            <a href="#" data-bs-toggle="modal" data-bs-target="#add-stock"
                                                class="dropdown-item"><i class="mdi mdi-email-outline me-1"></i>Allocate
                                                Stock</a>

                                        </div>
                                    </div>
                                    <!-- project title-->
                                </div>
                                <div class="badge bg-secondary text-light mb-3">Open</div>


                                <p class="text-muted mb-2">
                                    <img class="card-img-top" :src="`/images/${store.image}`" alt="project image cap">

                                </p>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <h5>Phone</h5>
                                            <p>{{ store.phone }} </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <h5>Address</h5>
                                            <p>{{ store.address }} </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <h5>Stock Allocated Units</h5>
                                            <p>{{ store.stock_allocations.length }}</p>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- end card-body-->

                        </div> <!-- end card-->

                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 mb-3">Stock (258)</h4>

                                <div class="table-responsive">
                                    <table class="table table-centered w-100 dt-responsive nowrap"
                                        id="products-datatable">
                                        <thead class="table-light">
                                            <tr>

                                                <th class="all">Product</th>
                                                <th>Category</th>
                                                <th>Supplier</th>
                                                <th>Unit Price</th>
                                                <th>Allocated Units</th>
                                                <th>Key Factor</th>
                                                <th style="width: 85px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="stock in store.stock_allocations">
                                                <td>
                                                    <img :src="`/images/${stock.stock.image}`" alt="contact-img"
                                                        title="contact-img" class="rounded me-3" height="48" />
                                                    <p class="m-0 d-inline-block align-middle font-16">
                                                        <a href="#" class="text-body">{{ stock.name }}</a>
                                                        <br />

                                                    </p>
                                                </td>
                                                <td>
                                                    {{ stock.stock.category.name }}
                                                </td>
                                                <td>
                                                    {{ stock.stock.supplier.name }}
                                                </td>
                                                <td>
                                                    ${{ stock.stock.unit_price }}
                                                </td>
                                                <td>
                                                    {{ stock.number_items_unit }}
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">{{ stock.stock.key_factor }}</span>
                                                </td>
                                                <td class="table-action">
                                                    <a @click.prevent="edit(stock)" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#add-store" class="action-icon"> <i
                                                            class="mdi mdi-square-edit-outline"></i></a>
                                                    <a href="javascript:void(0);" class="action-icon"> <i
                                                            class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> <!-- end card-body-->
                        </div>
                        <!-- end card-->
                    </div> <!-- end col -->


                </div>
            </PageHolder>

        </div> <!-- content -->

    </MainLayout>
</template>
<script>
import MainLayout from '../Layouts/MainLayout.vue';
import PageHolder from '../Layouts/PageHolder.vue';
import { useForm, Link } from "@inertiajs/inertia-vue3";

export default {
    name: 'StoreDetail',
    props: ['store', 'stocks'],
    components: {
        MainLayout,
        PageHolder
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
                {
                    name: this.store.name,
                    isActive: true
                },
            ],
            isEdit: false,
            form: useForm({
                name: this.store.name,
                phone: this.store.phone,
                address: this.store.address,
                image: this.store.image,
                id: this.store.id
            }),
            available_units: null,
            allocateStockForm: useForm({
                stock_id: null,
                store_id: this.store.id,
                number_cases: null,
                number_items_unit: "",
            })
        }
    },
    methods: {
        submit() {

            this.form.post(`/admin/stores/${this.form.id}`, {
                preserveScroll: true,
                onSuccess: () => {
                    this.isEdit = false;
                    this.form.reset('name', 'phone', 'address', 'image', 'id')
                    document.getElementById('cancel').click()
                }
            })

        },
        submitAllocate() {
            this.allocateStockForm.post(`/admin/stores/${this.allocateStockForm.store_id}/allocate`, {
                preserveScroll: true,
                onSuccess: () => {
                    this.isEdit = false;
                    this.form.reset()
                    document.getElementById('cancelStock').click()
                }
            })

        },

        selectProduct() {
            const id = this.allocateStockForm.stock_id;
            const stock = this.stocks.find(stock => stock.id == id);
            this.allocateStockForm.number_cases = stock.number_cases;
            this.available_units = stock.number_items_unit;
        }


    }
}
</script>