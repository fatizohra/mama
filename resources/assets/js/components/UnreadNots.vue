<template>
        <a href="/notifications" title="notifications">
            <i class="fa fa-bell"></i> <span>Notifications</span>
             <span class="badge" v-if="all_nots_count > 0" style="background:red; position: relative; top: -15px; left:-10px">{{ all_nots_count }}</span>
        </a>
</template>

<script>
    export default {
        mounted() {
            this.get_unread()
        },
        methods: {

            get_unread() {
                axios.get( '/get_unread')
                    .then( (nots) => {

                           nots.data.forEach((not) => {
                                this.$store.commit('add_not', not)
                            })
                    })
            }
        },
        computed: {
            all_nots_count() {
                return this.$store.getters.all_nots_count
            }
        }
    }
</script>
