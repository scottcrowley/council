<template>
    <button type="submit" :class="classes" @click="toggle">
        <span class="oi oi-heart" aria-hidden="true"></span>
        <span v-text="count"></span>
    </button>
</template>

<script>
    export default {
        props: ['reply'],

        data() {
            return {
                count: this.reply.favoritesCount,
                active: this.reply.isFavorited
            }            
        },

        computed: {
            classes() {
                return ['btn', this.active ? 'btn-outline-primary' : 'btn-outline-secondary'];
            },
            endpoint() {
                return '/replies/' +this.reply.id + '/favorites';
            }
        }, 

        methods: {
            toggle() {
                return this.active ? this.destroy() : this.create();
            },
            create() {
                axios.post(this.endpoint);

                this.active = true;
                this.count++;

                flash('Item is favorited');
            },
            destroy() {
                axios.delete(this.endpoint);

                this.active = false;
                this.count--;

                flash('Item is unfavorited');
            }
        }
    }
</script>
