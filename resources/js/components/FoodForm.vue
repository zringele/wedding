<template>
    <form>
        <div class="row">
            <div class="top">
            </div>
            <div class="form" >
                <span v-if="submitted !== true">
                <div class ="info"  v-if="will_attend === null">
                    <h1>Žilvino ir Monikos</h1>
                    <h1>Vestuvės</h1>
                    <p class= "line">________________________________________</p>
                    <h2>Data</h2>
                    <p>Liepos 18, 2020</p>
                    <p>Šeštadienis</p>
                    <br>
                    <h2>Ceremonija</h2>
                    <p>14:00</p>
                    <p>Šv. Jonų bažnyčia</p>
                    <p>Šv. Jono g. 12</p>
                    <br>
                    <h2>Šventinis vakaras</h2>
                    <p>17:30</p>
                    <p>Silver sky restoranas</p>
                    <p>Savanorių pr. 1</p>
                    <p class= "line">________________________________________</p>
                    <input type="text" v-model="name" placeholder="Vardas">
                </div>
                <div  class ="info" v-else-if="will_attend === true">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">El. pašto adresas</label>
                            <input v-model="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">Šiuo pašto adresu atsiųsim priminimą</small>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="allergies">Alergijos</label>
                            <input v-model="allergies" type="text" class="form-control" id="allergies" aria-describedby="emailHelp">
                        </div>
                        <br>
                        <label>Pagrindinis patiekalas</label>
                        <h3>{{meals[meal].name}}</h3>
                        <div class="wrapper">
                            <div @click="nextImage" class="arrow right"></div>
                            <div @click="prevImage" class="arrow left"></div>
                            <img width="380px" class="image" :src="meals[meal].src">
                        </div>
                        <span  @click="submit">
                            <div class="submit button">Pateikti</div>
                        </span>
                    </form>
                </div>
                <div v-if="will_attend === false">
                    <div v-else class="lauksim">
                    <h1>Labai liūdna </h1>
                </div>
                </div>
                <div v-if="will_attend === null">
                    <span  @click="going(1)">
                        <div class="accept button">Dalyvausiu</div>
                    </span>
                    <span  @click="regretting">
                        <div class="regret button">Negalėsiu</div>
                    </span>
                </div>
                </span>
                <div v-else class="lauksim">
                    <h1>Nekantriai lauksime jūsų šventėje!</h1>
                </div>
            </div>

        </div>
    </form>
</template>

<script>
    export default {
        name: "FoodForm",
        data() {
            return {
                name: '',
                email: '',
                surname: '',
                will_attend: null,
                submitted: false,
                meal: 0,
                meals: [
                    {
                        name: 'Antienos confit',
                        src: '/duck.JPG',
                    },
                    {
                        name: 'Ėriuko koja',
                        src: '/lamb.JPG',
                    },
                    {
                        name: 'Štrudelis',
                        src: '/vegan.JPG',
                    },
                ],
                allergies: '',
                plusOne: false,
            }
        },
        methods: {
            regretting() {
                this.will_attend = false;
            },
            going() {
                this.will_attend = true;
            },
            submit() {
                axios.post('/api/guest', {
                    meal: this.meals[this.meal].name,
                    email: this.email,
                    will_attend: this.will_attend,
                    name: this.name,
                    allergies: this.allergies
                });
                this.submitted = true;
            },
            nextImage() {
                this.meal = this.meal === 2 ? 0 : this.meal + 1;
            },
            prevImage() {
                this.meal = this.meal === 0 ? 2 : this.meal - 1;
            }
        }
    }
</script>

<style scoped>
    .form {
        max-width: 100vW;
    }
    .lauksim {
        padding: 50px 10px;
    }
    .image {
        border-radius: 10px;
    }
    .wrapper {
        position: relative;
    }
    .arrow {
        cursor: pointer;
        opacity: 0.5;
        position: absolute;
        top: 50%;
        right: 0;
        width: 40px;
        height: 60px;
        transform: translateY(-50%);
        background-image: url("/arrow.png");
        background-position: center;
        background-size: cover;
    }
    @media only screen and (max-width: 400px) {
        .button {
            width: calc(100vW - 55px) !important;
        }
    }
    .arrow.left {
        left: 0;
        transform: rotate(180deg) translateY(50%);
    }
</style>