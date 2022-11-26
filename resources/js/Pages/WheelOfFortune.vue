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

    <div class="bg-slate-800 bg-opacity-50 flex justify-center items-center absolute top-0 right-0 bottom-0 left-0" v-if="!squadFull && showWinner">
      <div class="bg-white px-16 py-14 rounded-md text-center">
        <h1 class="text-xl mb-4 font-bold text-slate-500">{{winnerName}}</h1>
        <button class="bg-indigo-500 px-7 py-2 ml-2 rounded-md text-md text-white font-semibold" @click="getNewData">Next</button>
      </div>
    </div>

    <div class="bg-slate-800 bg-opacity-50 flex justify-center items-center absolute top-0 right-0 bottom-0 left-0" v-if="squadFull && showWinner">
      <div class="bg-white px-16 py-14 rounded-md text-center">
        <p class="text-xl mb-4 font-bold text-slate-500" v-for="name in squad">{{name}}</p>
        <button class="bg-indigo-500 px-7 py-2 ml-2 rounded-md text-md text-white font-semibold" @click="getNewData">New game</button>
      </div>
    </div>
</template>

<script setup>
import { Wheel } from "vue3-fortune-wheel";
import {ref} from "vue"; import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    nextPlayer: Number,
    players: Array,
    squadFull: Boolean,
    squad: Array
});

const showWinner = ref(false);

const winnerName = props.players.find(player => player.id === props.nextPlayer).value

const wheel = ref(null);

const animDuration = ref(randomDuration());

const logo = ref({
    width: 100,
    height: 120,
    src: "https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Vue.js_Logo_2.svg/2367px-Vue.js_Logo_2.svg.png",
})

function done() {
    showWinner.value = true
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
