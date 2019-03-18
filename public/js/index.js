const newParty = Vue.component('new-party', {
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
                .then(response => {
                    router.push('/play-party')
                })
                .catch(e => {
                    console.log(e);
                })
        }
    }
})

const playParty = Vue.component('play-party', {
    data: function () {
        return {
        }
    },
    template: '#play-party',
    methods: {
    }
})

const routes = [
    { path: '/new-party', component: newParty },
    { path: '/play-party', component: playParty },
]

const router = new VueRouter({routes})

const app = new Vue({
    router
}).$mount('#app')
