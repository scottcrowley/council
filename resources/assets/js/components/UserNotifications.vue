<template>
    <li class="nav-item dropdown" v-if="notifications.length">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <span class="oi oi-bell" aria-hidden="true"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <div class="dropdown-item" v-for="notification in notifications" :key="notification.id">
                <a :href="notification.data.link" 
                    v-text="notification.data.message" 
                    @click.prevent="markAsRead(notification)"></a>
            </div>
        </div>
    </li>
</template>

<script>
    export default {
        props: [],

        components: {},

        data() {
            return {
                notifications: false
            }
        },

        created() {
            this.fetchNotifications();
        },

        computed: {
            endpoint() {
                return `/profiles/${window.App.user.name}/notifications`;
            }
        },

        methods: {
            fetchNotifications() {
                axios.get(this.endpoint)
                  .then(response => this.notifications = response.data);
            },
            markAsRead(notification) {
                axios.delete(`${this.endpoint}/${notification.id}`)
                    .then(({data}) => {
                        this.fetchNotifications();
                        
                        document.location.replace(data.link);
                    });
            }
        }
    }
</script>