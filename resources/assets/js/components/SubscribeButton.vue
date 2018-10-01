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
                active: this.activeSubscriber
            }
        },

        computed: {
            classes() {
                return ['btn', this.active ? 'btn-primary' : 'btn-outline-secondary'];
            }
        },

        methods: {
            subscribe() {
                axios[(this.active ? 'delete' : 'post')](location.pathname + '/subscriptions');

                this.active = ! this.active;
            }
        }
    }
</script>