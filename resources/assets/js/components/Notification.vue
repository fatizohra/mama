<template>
    <div>

    </div>
</template>

<script>
    export default {
        mounted() {
            this.listen()
        },
        props: ['user_id'],
        methods: {
            listen() {

                let channel = 'App.User.' + this.user_id;
                Echo.private(channel)
                    .notification((notification) => {
                         noty({
                                type: 'success',
                                layout: 'bottomLeft',
                                text: 'Friend request sent .'
                            });
                        this.$store.commit('add_not', notification);
                    })
            }
        }
    }
</script>