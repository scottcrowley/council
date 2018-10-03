<template>
    <button :class="classes"
        @click="subscribe">
        Subscribe
    </button>
</template>

<script>
    export default {
        props: ['activeSubscriber'],

        components: {},

        data() {
            return {
                isActive: this.activeSubscriber
            }
        },

        computed: {
            classes() {
                return ['btn', this.isActive ? 'btn-primary' : 'btn-outline-secondary'];
            }
        },

        methods: {
            subscribe() {
                axios[(this.isActive ? 'delete' : 'post')](location.pathname + '/subscriptions');

                this.isActive = ! this.isActive;
            }
        }
    }
</script>