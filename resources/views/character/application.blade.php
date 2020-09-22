<style>
    .group {
        padding: .25rem;
    }
    
    .group label {
        display:block;
        padding: .25rem;
    }
    
    .group small {
        display: block;
        padding: .25rem;
    }
    
    .group input[type=text], .group input[type=number], .group select {
        padding: .25rem;
        width: 100%;
    }
    
    .group textarea {
        padding: .25rem;
        width: 100%;
        height: 100px;
    }
    
    .group textarea.large {
        height: 400px;
    }
    
    .row {
        display: flex;
        width: 80%;
    }
    
    .row div {
        flex-grow: 1;
    }
    
    button {
        border: 1px solid black;
        background: black;
        color: white;
        padding: .5rem;
    }
    .loading {
        padding: 1rem;
        background: #a3d1d0;
        color: #075250;
        border: 1px solid #075250;
        margin: 1rem;
    }
    
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">

<div id="app">
    <div class="sent" v-if="sent">
        Your application was sent.
    </div>
    <div class="loading" v-if="loading">
        Sending...
    </div>
    <template v-else="loading">
        <div class="row">
            <div class="group">
                <label>First Name</label>
                <input type="text" v-model="first_name"/>
            </div>

            <div class="group">
                <label>Last Name</label>
                <input type="text" v-model="last_name"/>
            </div>
        </div>

        <div class="row">
            <div class="group">
                <label>Username on forums</label>
                <input type="text" v-model="username"/>
                <small>You will be contacted by Admin via private message regarding your character's approval.</small>
            </div>
        </div>

        <div class="row">
            <div class="group">
                <label>Age</label>
                <input type="text" v-model="age"/>
            </div>

            <div class="group">
                <label>Origin</label>
                <input type="text" v-model="origin"/>
                <small>Your current residence or country of origin</small>
            </div>
        </div>

        <div class="row">
            <div class="group">
                <label>Occupation</label>
                <textarea v-model="occupation"></textarea>
                <small>Describe your profession, job, career, rank, position, etc.</small>
            </div>
        </div>

        <div class="row">
            <div class="group">
                <label>Psychological description</label>
                <textarea v-model="psychological"></textarea>
                <small>Personality, temperment, etc</small>
            </div>
        </div>

        <div class="row">
            <div class="group">
                <label>Physical description</label>
                <textarea v-model="description"></textarea>
                <small>Appearance, style, body composition, etc</small>
            </div>
        </div>

        <div class="row">
            <div class="group">
                <label>Supernatural Powers</label>
                <textarea v-model="powers"></textarea>
                <small>Describe if you are a channeler or have any other supernatural powers. Pending approval.</small>
            </div>
        </div>

        <div class="row">
            <div class="group">
                <label>
                    Can you channel?
                    <input type="checkbox" v-model="i_can_channel"/>
                </label>
            </div>
        </div>


        <template v-if="canChannel()">
            <div class="row">
                <div class="group">
                    <label>One Power Gender</label>
                    <label><input type="radio" v-model="gender" value="n/a"/>I don't channel</label>
                    <label><input type="radio" v-model="gender" value="male"/>Male</label>
                    <label><input type="radio" v-model="gender" value="femail"/>Female</label>
                    <small>Female 1 -38; Males 1-42 limits</small>
                </div>
                <div class="group">
                    <label>Current Strength</label>
                    <input type="number" v-model="current_strength"/>
                    <small>Your character's current strength in the Power. Pending approval.</small>
                </div>

                <div class="group">
                    <label>Potential Strength</label>
                    <input type="number" v-model="potential_strength"/>
                    <small>Your strength when you reach the peak of your powers. Pending approval.</small>
                </div>
            </div>

            <div class="row">
                <div class="group">
                    <label>Channeler Experience</label>
                    <select v-model="experience">
                        <option value="n/a">N/A</option>
                        <option value="new">New</option>
                        <option value="adept">Adept</option>
                        <option value="expert">Expert</option>
                        <option value="master">Master</option>
                    </select>
                    <small>Pending approval.</small>
                </div>
                <div class="group">
                    <label>Are you a reborn god?</label>
                    <label><input type="radio" v-model="reborn_god" value="n/a"/>N/A</label>
                    <label><input type="radio" v-model="reborn_god" value="yes"/>Yes</label>
                    <label><input type="radio" v-model="reborn_god" value="no"/>No</label>
                </div>

                <div class="group" v-if="isAGod()">
                    <label>What god/goddess?</label>
                    <input type="text" v-model="who_god"/>
                    <small>Pending approval.</small>
                </div>
            </div>
        </template>

        <div class="row">
            <div class="group">
                <label>Biography</label>
                <textarea v-model="biography" class="large"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="group">
                <label>Who is the author of the book series The First Age is based on?</label>
                <input type="text" v-model="series_author_name"/>
                <small>If you beleive a value should be possible please post a message on the fourms.</small>
            </div>

            <div class="group" style="display:none">
                <label>Rate Us</label>
                <input type="text" v-model="rate_us"/>
                <small>Give us a rating.</small>
            </div>
        </div>

        <div class="row">
            <button @click.prevent="send">
                Submit Application
            </button>
        </div>
    </template>     
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script> 
    window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    let token = document.head.querySelector('meta[name="csrf-token"]');

    if (token) {
        window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
    } else {
        console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
    }
    
    let app = new Vue({
        el: '#app',
        data: {
            loading: false,
            sent: false,
            token,
            first_name: '',
            last_name: '',
            username: '',
            age: '',
            origin: '',
            occupation:'',
            psychological: '',
            description: '',
            powers: '',
            current_strength: '',
            potential_strength: '',
            reborn_god: 'n/a',
            who_god: '',
            experience: 'n/a',
            biography: '',
            i_can_channel: false,
            gender: 'n/a',
            series_author_name: '',
            rate_us: '',
        },
        methods: {
            canChannel() {
                return this.i_can_channel;
            },
            isAGod() {
                return this.reborn_god === 'yes';
            },
            send() {
                this.loading = true;
                
                let data = {
                    
                };
                
                window.axios.post('application', data)
                    .then((response) => {
                        console.log(response);
                        this.loading = false;
                        this.sent = true;
                    })
                    .catch((error) => {
                        console.log(error);
                        this.loading = false;
                        this.error = true;
                    });
                
            }
        }
    });
</script>