<template>
    <div class="wheel_wrap">
        <h1>Easier vue-wheel</h1>
        <Wheel
            ref="wheel"
            :gift="gift"
            :data="data"
            @done="done"
            :imgParams="logo"
            @click="spinTheWheel"
        />
    </div>
</template>

<script>
import { Wheel } from "vue3-fortune-wheel";

export default {
    name: "App",
    components: {
        Wheel,
    },
    data() {
        return {
            gift: 1,
            logo: {
                width: 100,
                height: 120,
                src:
                    "https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Vue.js_Logo_2.svg/2367px-Vue.js_Logo_2.svg.png",
            },
            data: [
                {
                    id: 1,
                    value: "Paulius",
                    bgColor: "#7d7db3",
                    color: "#ffffff",
                },
                {
                    id: 2,
                    value: "Pranas",
                    bgColor: "#ffffff",
                    color: "#000000",
                },
                {
                    id: 3,
                    value: "Jurgis",
                    bgColor: "#c92729",
                    color: "#ffffff",
                },
                {
                    id: 4,
                    value: "Laura",
                    bgColor: "#7d7db3",
                    color: "#ffffff",
                },
                {
                    id: 5,
                    value: "Augustinas",
                    bgColor: "#ffffff",
                    color: "#000000",
                },
                {
                    id: 6,
                    value: "Justė",
                    bgColor: "#c92729",
                    color: "#ffffff",
                },
                {
                    id: 7,
                    value: "Mantas",
                    bgColor: "#ffffff",
                    color: "#000000",
                },
            ],
        };
    },
    methods: {
        done(params) {
            this.$refs.wheel.clicked = false;
            this.gift = this.randomGift();
        },
        spinTheWheel() {
            this.$refs.wheel.spin();
        },
        randomGift() {
            return Math.floor(Math.random() * this.data.length) + 1
        }
    },
};
</script>

<style>
.wheel_wrap {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
</style>
