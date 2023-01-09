<template>
    <MainLayout>
        <div class="content">
            <PageHolder title="Dashboard" :links="links">
                <div class="row">
                    <div class="col-xl-5 col-lg-6">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card widget-flat">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="mdi mdi-account-multiple widget-icon"></i>
                                        </div>
                                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Net Profit
                                        </h5>
                                        <h3 class="mt-3 mb-3">36,254</h3>
                                        <p class="mb-0 text-muted">
                                            <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>
                                                5.27%</span>
                                            <span class="text-nowrap">% Increase Since last month</span>
                                        </p>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-sm-6">
                                <div class="card widget-flat">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="mdi mdi-cart-plus widget-icon"></i>
                                        </div>
                                        <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Cost Goods Sold
                                        </h5>
                                        <h3 class="mt-3 mb-3">5,543</h3>
                                        <p class="mb-0 text-muted">
                                            <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i>
                                                1.08%</span>
                                            <span class="text-nowrap">% Increase Since last month</span>
                                        </p>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card widget-flat">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="mdi mdi-currency-usd widget-icon"></i>
                                        </div>
                                        <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Income</h5>
                                        <h3 class="mt-3 mb-3">$6,254</h3>
                                        <p class="mb-0 text-muted">
                                            <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i>
                                                7.00%</span>
                                            <span class="text-nowrap">% Increase Since last month</span>
                                        </p>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-sm-6">
                                <div class="card widget-flat">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="mdi mdi-pulse widget-icon"></i>
                                        </div>
                                        <h5 class="text-muted fw-normal mt-0" title="Growth">Expenses</h5>
                                        <h3 class="mt-3 mb-3">+ 30.56%</h3>
                                        <p class="mb-0 text-muted">
                                            <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>
                                                4.87%</span>
                                            <span class="text-nowrap">% Increase Since last month</span>
                                        </p>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div> <!-- end row -->

                    </div> <!-- end col -->

                    <div class="col-xl-7 col-lg-6">
                        <div class="card card-h-100">
                            <div class="d-flex card-header justify-content-between align-items-center">
                                <h4 class="header-title">Sales By Month</h4>
                                <div class="dropdown">
                                    <Link href="#" class="dropdown-toggle arrow-none card-drop"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                    </Link>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <Link href="javascript:void(0);" class="dropdown-item">Sales Report</Link>
                                        <!-- item-->
                                        <Link href="javascript:void(0);" class="dropdown-item">Export Report</Link>
                                        <!-- item-->
                                        <Link href="javascript:void(0);" class="dropdown-item">Profit</Link>
                                        <!-- item-->
                                        <Link href="javascript:void(0);" class="dropdown-item">Action</Link>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <vue-bar-graph :points="[3, 5, 2, 5, 4, 3, 5, 2, 5, 45, 56]"
                                    :labels="['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dec']"
                                    :width="600" :height="300" :show-y-axis="false" :show-x-axis="true"
                                    :show-values="true" :use-custom-labels="true" />
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
import VueBarGraph from 'vue-bar-graph';

export default {
    components: {
        MainLayout,
        PageHolder,
        VueBarGraph
    },
    data() {
        return {
            links: [
                {
                    name: 'Home',
                    link: '/admin/dashboard',
                    isActive: false
                },
                {
                    name: 'Dashboard',
                    link: '/dashboard',
                    isActive: true
                }
            ]
        };
    },
}

</script>