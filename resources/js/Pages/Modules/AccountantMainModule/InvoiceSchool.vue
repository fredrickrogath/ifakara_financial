<template>
    <div data-app>
      <div class="h-screen p-0">
        <!-- <transition-group name="fade"> -->
          <div v-show="!getCurrentTabInvoices">
            <invoices></invoices>
          </div>
          <div v-show="getCurrentTabInvoices">
            <schools v-show="!getInvoiceSchoolView"></schools>
            <invoices-school v-show="getInvoiceSchoolView"></invoices-school>
          </div>
        <!-- </transition-group> -->
      </div>
    </div>
  </template>
  

<script>
import Invoices from "./Invoices/Invoices.vue";
import Schools from "./InvoicesSchool/Schools.vue";
import InvoicesSchool from "./InvoicesSchool/Invoices.vue";

export default {
    components: {
        Invoices,
        Schools,
        InvoicesSchool,
    },

    mounted() {
    },

    data() {
        return {
        };
    },
    computed: {
        getCurrentTabInvoices() {
            return this.$store.getters[
                "AccountantInvoiceModule/getCurrentTabInvoices"
            ];
        },

        getInvoiceSchoolView() {
            return this.$store.getters["AccountantInvoiceModule/getInvoiceSchoolView"];
        },
    },
    watch: {
    },
    methods: {
    },
};
</script>

<style scoped>
</style>
