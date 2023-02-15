<template>
    <MainLayout>
        <div class="content">

            <PageHolder title="Products" :links="links">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-sm-5">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#add-products"
                                            class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add
                                            Products</a>
                                        <div id="add-products" class="modal fade" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="standard-modalLabel">Create Stock
                                                            Product
                                                        </h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-hidden="true"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form @submit.prevent="submit" class="ps-3 pe-3">
                                                            <div class="row g-2">
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="inputEmail4"
                                                                        class="form-label">Supplier</label>
                                                                    <select class="form-select mb-3"
                                                                        v-model="form.supplier_id">
                                                                        <option selected>Open select supplier</option>
                                                                        <option :value="supplier.id"
                                                                            v-for="supplier in suppliers">
                                                                            {{ supplier.name }}</option>

                                                                    </select>
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="inputPassword4"
                                                                        class="form-label">Category</label>
                                                                    <select class="form-select mb-3"
                                                                        v-model="form.stock_category_id">
                                                                        <option selected>Open select category</option>
                                                                        <option :value="category.id"
                                                                            v-for="category in categories">
                                                                            {{ category.name }}</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Name</label>
                                                                <input class="form-control" v-model="form.name"
                                                                    type="text" id="emailaddress1" required=""
                                                                    placeholder="">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Image</label>
                                                                <input class="form-control"
                                                                    @input="form.image = $event.target.files[0]"
                                                                    type="file" id="emailaddress1" required=""
                                                                    placeholder="">
                                                            </div>

                                                            <div class="row g-2">
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="inputEmail4" class="form-label">Key
                                                                        Factor</label>
                                                                    <select class="form-select mb-3"
                                                                        v-model="form.key_factor">
                                                                        <option selected>Open select key facor</option>
                                                                        <option :value="factor.value"
                                                                            v-for="factor in factors">{{ factor.name }}
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="inputEmail4" class="form-label">Unit
                                                                        price</label>
                                                                    <input class="form-control"
                                                                        v-model="form.unit_price" type="text"
                                                                        id="emailaddress1" placeholder="">
                                                                </div>

                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="address"
                                                                    class="form-label">Description</label>
                                                                <textarea class="form-control"
                                                                    v-model="form.description" id="example-textarea"
                                                                    rows="5"></textarea>
                                                            </div>
                                                            <div class="row g-2">
                                                                <div class="mb-3 col-md-4">
                                                                    <label for="inputEmail4" class="form-label">Number
                                                                        Items Unit</label>
                                                                    <input class="form-control"
                                                                        v-model="form.number_items_unit" type="number"
                                                                        id="emailaddress1" required="" placeholder="">
                                                                </div>
                                                                <div class="mb-3 col-md-4">
                                                                    <label for="inputEmail4" class="form-label">Number
                                                                        Of Cases</label>
                                                                    <input class="form-control"
                                                                        v-model="form.number_cases" type="number"
                                                                        id="emailaddress1" required="" placeholder="">
                                                                </div>
                                                                <div class="mb-3 col-md-4">
                                                                    <label for="inputEmail4" class="form-label">Number
                                                                        Per Case</label>
                                                                    <input class="form-control"
                                                                        v-model="form.number_per_case" type="number"
                                                                        id="emailaddress1" required="" placeholder="">
                                                                </div>
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
                                                    class="mdi mdi-cog-outline"></i></button>
                                            <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                            <button type="button" class="btn btn-light mb-2">Export</button>
                                        </div>
                                    </div><!-- end col-->
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-centered w-100 dt-responsive nowrap"
                                        id="products-datatable">
                                        <thead class="table-light">
                                            <tr>

                                                <th class="all">Product</th>
                                                <th>Category</th>
                                                <th>Supplier</th>
                                                <th>Unit Price</th>
                                                <th>Number Of Units</th>
                                                <th>Key Factor</th>
                                                <th style="width: 85px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="stock in stocks">

                                                <td>
                                                    <img :src="`/images/${stock.image}`" alt="contact-img"
                                                        title="contact-img" class="rounded me-3" height="48" />
                                                    <p class="m-0 d-inline-block align-middle font-16">
                                                        <a href="#" class="text-body">{{ stock.name }}</a>
                                                        <br />

                                                    </p>
                                                </td>
                                                <td>
                                                    {{ stock.category.name }}
                                                </td>
                                                <td>
                                                    {{ stock.supplier.name }}
                                                </td>
                                                <td>
                                                    ${{ stock.unit_price }}
                                                </td>

                                                <td>
                                                    {{ stock.number_items_unit }}
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">{{ stock.key_factor }}</span>
                                                </td>

                                                <td class="table-action">
                                                    <a @click.prevent="edit(stock)" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#add-products" class="action-icon"> <i
                                                            class="mdi mdi-square-edit-outline"></i></a>
                                                    <a href="#" class="action-icon" @click.prevent="deleteStock(stock)"> <i
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
import { useForm } from '@inertiajs/inertia-vue3';
export default {
    name: 'Stock',
    props: ['stocks', 'suppliers', 'categories'],
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
                    name: 'Stock',
                    link: '/stock',
                    isActive: false
                },
                {
                    name: 'Products',
                    link: '/products',
                    isActive: true
                }
            ],
            isEdit: false,
            factors: [
                {
                    value: "kg",
                    name: "Kilogram"
                },
                {
                    value: "g",
                    name: "Gram"
                },
                {
                    value: "l",
                    name: "Liter"
                },
                {
                    value: "ml",
                    name: "Milliliter"
                },
                {
                    value: "m",
                    name: "Meter"
                },
                {
                    value: "cm",
                    name: "Centimeter"
                },
                {
                    value: "mm",
                    name: "Millimeter"
                },
                {
                    value: "m2",
                    name: "Square Meter"
                },
                {
                    value: "cm2",
                    name: "Square Centimeter"
                },
                {
                    value: "mm2",
                    name: "Square Millimeter"
                },
                {
                    value: "m3",
                    name: "Cubic Meter"
                },
                {
                    value: "cm3",
                    name: "Cubic Centimeter"
                },
                {
                    value: "mm3",
                    name: "Cubic Millimeter"
                },
                {
                    value: "piece",
                    name: "Piece"
                },
                {
                    value: "dozen",
                    name: "Dozen"
                },
                {
                    value: "pack",
                    name: "Pack"
                },
                {
                    value: "box",
                    name: "Box"
                },
                {
                    value: "bottle",
                    name: "Bottle"
                },
                {
                    value: "can",
                    name: "Can"
                },
                {
                    value: "bag",
                    name: "Bag"
                },
                {
                    value: "roll",
                    name: "Roll"
                },
                {
                    value: "set",
                    name: "Set"
                },
                {
                    value: "pair",
                    name: "Pair"
                },
                {
                    value: "bundle",
                    name: "Bundle"
                },
                {
                    value: "carton",
                    name: "Carton"
                },
                {
                    value: "pallet",
                    name: "Pallet"
                },
                {
                    value: "other",
                    name: "Other"
                },
            ],
            form: useForm({
                name: "",
                description: "",
                key_factor: "",
                unit_price: null,
                number_items_unit: null,
                number_cases: null,
                number_per_case: null,
                image: "",
                id: null,
                stock_category_id: null,
                supplier_id: null,
            })
        }
    },
    methods: {
        submit() {
            if (this.isEdit) {
                this.form.post(`/admin/stock/products/${this.form.id}`, {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.isEdit = false;
                        this.form.reset()
                        document.getElementById('cancel').click()
                    }
                })
            } else {
                this.form.post(route('stocks.store'), {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.isEdit = false;
                        this.form.reset()
                        document.getElementById('cancel').click()
                    }
                })
            }

        },
        deleteStock(stock) {
            if (confirm('Are you sure you want to delete this stock?')) {
                this.$inertia.delete(`/admin/stock/products/${stock.id}`, {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.isEdit = false;
                    }
                })
            }
        },
        edit(product) {
            this.isEdit = true;
            this.form.name = product.name;
            this.form.description = product.description;
            this.form.id = product.id;
            this.form.stock_category_id = product.stock_category_id;
            this.form.supplier_id = product.supplier_id;
            this.form.unit_price = product.unit_price;
            this.form.number_cases = product.number_cases;
            this.form.number_items_unit = product.number_items_unit;
            this.form.number_per_case = product.number_per_case;
            this.form.key_factor = product.key_factor;
            // this.form.image = store.image;
        }
    }
}
</script>