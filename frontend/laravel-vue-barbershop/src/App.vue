<template>
    <div id="app">
        <navbar-component></navbar-component>
        <router-view />
        <footer-component></footer-component>
    </div>
</template>

<script>
import NavbarComponent from "./components/Navbar.vue";
import FooterComponent from "./components/Footer.vue";

export default {
    name: "App",
    components: {
        NavbarComponent,
        FooterComponent
    }
}
</script>
