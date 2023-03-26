import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import axios from "axios";

import "./assets/main.css";

/* import the fontawesome core */
import { library } from "@fortawesome/fontawesome-svg-core";

/* import font awesome icon component */
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

/* import specific icons */
import { faBars } from "@fortawesome/free-solid-svg-icons";
import { faInstagram } from "@fortawesome/free-brands-svg-icons";
import { faTelegram } from "@fortawesome/free-brands-svg-icons";
import { faVk } from "@fortawesome/free-brands-svg-icons";

/* add icons to the library */
library.add(faBars, faInstagram, faTelegram, faVk);

const app = createApp(App);

app.config.globalProperties.axios = axios;

app.use(router).component("font-awesome-icon", FontAwesomeIcon).mount("#app");
