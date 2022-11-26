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
import {onBeforeMount, ref} from "vue";

const wheel = ref(null);
const nextPlayer = ref(1);
const animDuration = ref(randomDuration());
const logo = ref({
    width: 100,
    height: 120,
    src: "https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Vue.js_Logo_2.svg/2367px-Vue.js_Logo_2.svg.png",
})

const players = ref(null)

onBeforeMount(() => {
    getData()
})

function done() {
    getData()
    wheel.value.clicked = false;
    animDuration.value = randomDuration();
}
function spinTheWheel() {
    wheel.value.spin();
}

function randomDuration() {
    return 1000 + (Math.random() * 10000);
}

function getData() {
    axios.post(route('wheel-data'))
    .then((response) => {
        players.value = response.data.players
        nextPlayer.value = response.data.next
    });
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
