<template>
    <div class="mb-5">
        <div class="row">
            <div class="col-md-3 col-xl-3">
                <div class="card bg-pattern  shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm  rounded">
                                    <i class=" fas fa-users font-10 text-primary" style="font-size:40px;"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        <span data-plugin="counterup">
                                            {{ students ? students : 'please wait ...' }}
                                        </span>
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        Students
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-->
            </div>
            <!-- end col -->

            <div class="col-md-3 col-xl-3 px-0">
                <div class="card bg-pattern py-0 my-0">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm rounded">
                                    <i class="fas fa-money-check avatar-title font-22 text-danger" style="font-size:40px"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        <span data-plugin="counterup">12</span>
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        Paid Fees
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="col-md-3 col-xl-3">
                <div class="card bg-pattern py-0 my-0">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm rounded">
                                    <i class="fas fa-minus-square  avatar-title  text-warning" style="font-size:40px"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        <span data-plugin="counterup">87</span>
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        Unpaid Fees
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="col-md-3 col-xl-3 px-0">
                <div class="card bg-pattern py-0 my-0">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-info rounded">
                                    <i class="fe-cpu avatar-title font-22 text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        <span data-plugin="counterup"> {{ totalTool ? totalTool : 'please wait ...'  }} </span>
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        Tools
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-6">
                <div class="card">
                    <div class="card-body pb-2">
                        <div class="float-end d-none d-md-inline-block">
                            <!-- <div class="btn-group mb-2">
                                <button
                                    type="button"
                                    class="btn btn-xs btn-light"
                                >
                                    Today
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-xs btn-light"
                                >
                                    Weekly
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-xs btn-secondary"
                                >
                                    Monthly
                                </button>
                            </div> -->
                        </div>

                        <h4 class="header-title mb-2">Analytics Performance</h4>

                        <!-- <div class="d-flex text-center">
                            <div class="col-md-4">
                                <p class="text-muted mb-0 mt-0">Current Week</p>
                                <h4 class="fw-normal mb-0">
                                    <small
                                        class="mdi mdi-checkbox-blank-circle text-primary align-middle me-1"
                                    ></small>
                                    <span>$58,254</span>
                                </h4>
                            </div>
                            <div class="col-md-4">
                                <p class="text-muted mb-0 mt-0">
                                    Previous Week
                                </p>
                                <h4 class="fw-normal mb-0">
                                    <small
                                        class="mdi mdi-checkbox-blank-circle text-success align-middle me-1"
                                    ></small>
                                    <span>$69,524</span>
                                </h4>
                            </div>
                            <div class="col-md-4">
                                <p class="text-muted mb-0 mt-0">Targets</p>
                                <h4 class="fw-normal mb-0">
                                    <small
                                        class="mdi mdi-checkbox-blank-circle text-success align-middle me-1"
                                    ></small>
                                    <span>$95,025</span>
                                </h4>
                            </div>
                        </div> -->

                        <v-card flat>
                            <v-tabs color="deep-purple accent-4" right>
                                <v-tab>Students</v-tab>
                               

                                <v-tab-item key="1">
                                    <v-container fluid>
                                        <pie-chart3-d
                                            :data="registeredStudents"
                                        ></pie-chart3-d>
                                    </v-container>
                                </v-tab-item>

                                <v-tab-item key="2">
                                    <v-container fluid>
                                        <pie-chart3-d
                                            :data="finances"
                                        ></pie-chart3-d>
                                    </v-container>
                                </v-tab-item>
                            </v-tabs>
                        </v-card>
                        <div class="">
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end col-->

            <div class="col-xl-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-1">School Staffs</h4>

                         <div class="table-responsive">
                            <table
                                class="table table-centered table-nowrap table-hover mb-0"
                            >
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Identity</th>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">
                                            Departiment
                                        </th>
                                        <th class="border-top-0">Email</th>
                                        <th class="border-top-0">
                                            Registered On
                                        </th>
                                        <!-- <th class="border-top-0">Download</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="staff in staffs" :key="staff.id">
                                        <td>
                                            <img
                                                class="h-8 w-8 rounded-full object-cover"
                                                :src="
                                                    $page.props.user
                                                        .profile_photo_url
                                                "
                                                :alt="$page.props.user.name"
                                            />
                                            <!-- <img
                                                src="assets/images/users/user-2.jpg"
                                                alt="user-pic"
                                                class="rounded-circle avatar-sm bx-shadow-lg"
                                            /> -->
                                        </td>
                                        <td>
                                            <span class="text-center">
                                                {{ staff.name }}
                                            </span>
                                        </td>
                                        <td>{{ department(staff.role) }}</td>
                                        <td>{{ staff.email }}</td>
                                        <td>
                                            {{
                                                formattedDate(staff.created_at)
                                            }}
                                        </td>
                                        <!-- <td class="text-center">
                                            <v-icon size="20">mdi-eye</v-icon>
                                        </td>
                                        <td class="text-center">
                                            <v-icon size="22"
                                                >mdi-download</v-icon
                                            >
                                        </td> -->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-1">Reports</h4>

                         <div class="table-responsive">
                            <table
                                class="table table-centered table-nowrap table-hover mb-0"
                            >
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Identity</th>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">
                                            Departiment
                                        </th>
                                        <th class="border-top-0">Email</th>
                                        <th class="border-top-0">
                                            Registered On
                                        </th>
                                        <!-- <th class="border-top-0">Download</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="staff in staffs" :key="staff.id">
                                        <td>
                                            <img
                                                class="h-8 w-8 rounded-full object-cover"
                                                :src="
                                                    $page.props.user
                                                        .profile_photo_url
                                                "
                                                :alt="$page.props.user.name"
                                            />
                                            <!-- <img
                                                src="assets/images/users/user-2.jpg"
                                                alt="user-pic"
                                                class="rounded-circle avatar-sm bx-shadow-lg"
                                            /> -->
                                        </td>
                                        <td>
                                            <span class="text-center">
                                                {{ staff.name }}
                                            </span>
                                        </td>
                                        <td>{{ department(staff.role) }}</td>
                                        <td>{{ staff.email }}</td>
                                        <td>
                                            {{
                                                formattedDate(staff.created_at)
                                            }}
                                        </td>
                                        <!-- <td class="text-center">
                                            <v-icon size="20">mdi-eye</v-icon>
                                        </td>
                                        <td class="text-center">
                                            <v-icon size="22"
                                                >mdi-download</v-icon
                                            >
                                        </td> -->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
         
        </div>
        <!-- end row -->

    </div>
</template>

<script>
export default {
    mounted() {
        let recaptchaScript = document.createElement("script");
        recaptchaScript.setAttribute(
            "src",
            "assets/js/pages/ecommerce-dashboard.init.js"
        );
        document.head.appendChild(recaptchaScript);

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
