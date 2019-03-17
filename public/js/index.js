// 0. If using a module system, call Vue.use(VueRouter)

// 1. Define route components.
// These can be imported from other files
const NewParty = Vue.component('new-party', {
    data: function () {
        return {
            game: null,
            users: []
        }
    },
    template: '#new-party',
    created: function () {
        this.users.push({nickname: ''});
    },
    methods: {
        addUser: function () {
            this.users.push({nickname: ''});
        },
        deleteUser: function (index) {
            this.users.splice(index, 1);
        },
        play: function () {
            var users = [];
            this.users.forEach(function (user) {
                users.push(user.nickname);
            });

            const params = new URLSearchParams();
            params.append('game', this.game);
            params.append('users', users);

            axios
                .post('/new-party', params)
                .then(response => {})
                .catch(e => {
                    console.log(e);
                })
        }
    }
})

// 2. Define some routes
// Each route should map to a component. The "component" can
// either be an actual component constructor created via
// Vue.extend(), or just a component options object.
// We'll talk about nested routes later.
const routes = [
    { path: '/new-party', component: NewParty },
]

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
    routes
})

// 4. Create and mount the root instance.
// Make sure to inject the router with the router option to make the
// whole app router-aware.
const app = new Vue({
    router
}).$mount('#app')

// Now the app has started!
