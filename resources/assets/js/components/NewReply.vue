<template>
    <div class="new-reply">
        <div v-if="signedIn">
            <div class="form-group">
                <wysiwyg name="body" v-model="body" placeholder="Have something to say?"></wysiwyg>
            </div>
            <div class="form-group">
                <button type="submit" 
                    class="btn btn-outline-secondary" 
                    @click="addReply">Post</button>
            </div>
        </div>
        <p class="text-center" v-else>
            Please <a href="/login">sign in</a> to participate in this discussion.
        </p>
    </div>
</template>

<script>
    import 'jquery.caret';
    import 'at.js';

    export default {
        data() {
            return {
                body: ''
            }
        },

        mounted() {
            $('#app').atwho({
                at: "@",
                delay: 750,
                callbacks: {
                    remoteFilter: function(query, callback) {
                        $.getJSON("/api/users", { name: query}, function(usernames) {
                            callback(usernames);
                        });
                    }
                }
            });
        },

        methods: {
            addReply() {
                axios.post(location.pathname + '/replies', { body: this.body })
                    .then(({data}) => {
                        this.body = '';

                        flash('Your reply has been posted');

                        this.$emit('created', data);
                    })
                    .catch(error => {
                        flash(error.response.data, 'danger');
                    });
            }
        }
    }
</script>

<style scoped>
    .new-reply {
        padding: 15px;
        background-color: #fff;
        border: 1px solid #e3e3e3;
    }
</style>
