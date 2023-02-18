<template>
    <div class="">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Invoice of xxxxx Invoice of xxxxx</h4>
                    <p class="sub-header">
                        Invoice of xxxxx Invoice of xxxxx Invoice of xxxxx Invoice of xxxxx Invoice of xxxxx.
                    </p>

                    <div class="mb-2">
                        <div
                            class="row row-cols-sm-auto g-2 align-items-center"
                        >
                            <div class="col-3 text-sm-center">
                                <select
                                    id="demo-foo-filter-status"
                                    class="form-select form-select-sm"
                                >
                                    <option value="">Show all</option>
                                    <option value="active">Active</option>
                                    <option value="disabled">
                                        Disabled
                                    </option>
                                    <option value="suspended">
                                        Suspended
                                    </option>
                                </select>
                            </div>
                            <div class="col-3">
                                <input
                                    id="demo-foo-search"
                                    type="text"
                                    placeholder="Search"
                                    class="form-control form-control-sm"
                                    autocomplete="on"
                                />
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table
                            id="demo-foo-filtering"
                            class="table table-bordered toggle-circle mb-0"
                            data-page-size="10"
                        >
                            <thead>
                                <tr>
                                    <th data-toggle="true">Invoice Id</th>
                                    <th>xxxx</th>
                                    <th data-hide="phone">xxxx</th>
                                    <th data-hide="phone">xxxx</th>
                                    <th data-hide="phone">xxxx</th>
                                    <th data-hide="phone, tablet">Date</th>
                                    <th data-hide="phone, tablet">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody v-for="index in 9" key="index">
                                <tr>
                                    <td>hu6y8jj9</td>
                                    <td>Boudreaux</td>
                                    <td>Traffic Court Referee</td>
                                    <td>Traffic Court</td>
                                    <td>Traffic</td>
                                    <td>22 Jun 1972</td>
                                    <td>
                                        <span
                                            class="badge label-table bg-success"
                                            >Active</span
                                        >
                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="active">
                                    <td colspan="5">
                                        <div class="text-end">
                                            <ul
                                                class="pagination pagination-rounded justify-content-end footable-pagination mb-0"
                                            ></ul>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- end .table-responsive-->
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>
</template>

<script>

export default {

    mounted() {
        // Receiving broadicasting
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                console.log(e);
            }
        );
    },

    data() {
        return { echo: null };
    },
    computed: {
        //Add computed properties
    },
    watch: {
        //Add watchers...
    },
    methods: {
        //Add methods...
    },
};
</script>
