<template>
    <div class="wheel_wrap">
        <h1>Wheel of fortune</h1>
        <Wheel
            ref="wheel"
            :gift="nextPlayer"
            :data="players"
            @done="done"
            :imgParams="logo"
            :animDuration="animDuration"
            @click="spinTheWheel"
        />
    </div>
</template>

<script setup>
import { Wheel } from "vue3-fortune-wheel";
import {ref} from "vue"; import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    nextPlayer: Object,
    players: Array,
});

const wheel = ref(null);

const animDuration = ref(randomDuration());

const logo = ref({
    width: 100,
    height: 120,
    src: "https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Vue.js_Logo_2.svg/2367px-Vue.js_Logo_2.svg.png",
})

function done() {
    wheel.value.clicked = false;
    animDuration.value = randomDuration();
    getNewData()
}
function spinTheWheel() {
    wheel.value.spin();
}

function randomDuration() {
    return 1000 + (Math.random() * 10000);
}

function getNewData(){
    Inertia.get(route('wheel'))
}
</script>

<style>
.wheel_wrap {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
</style>
