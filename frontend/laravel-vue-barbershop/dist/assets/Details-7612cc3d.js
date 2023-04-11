import{_ as c,o as n,c as i,b as t,f as s,t as a,F as d,d as u}from"./index-c703d499.js";const g={name:"Details",data(){return{reservation:{name:null,email:null,master:null,services:[],date:null,time:null}}},mounted(){this.getReservation()},methods:{getReservation(){this.axios.get(`http://localhost:8876/api/reservation/${this.$router.currentRoute.value.params.email}`).then(l=>{this.reservation=l.data.data;var e=l.data.data.date;e=e.split("-");var e=new Date(e[0],--e[1],e[2]),o={year:"numeric",month:"long",day:"numeric",weekday:"long"};this.reservation.date=e.toLocaleString("ru",o)})}}},h=t("div",{class:"bg-zinc-900 lg:pb-24 pb-20"},null,-1),_={class:"pb-20 bg-neutral-200"},m={class:"container relative mx-auto"},x={class:"w-full lg:w-4/6 px-4 ml-auto mr-auto text-center"},v={class:"pt-20"},p=t("h1",{class:"text-neutral-900 font-normal lg:text-5xl text-4xl"}," Ваша запись ",-1),f={class:"mt-10 font-light lg:text-lg text-lg text-neutral-900"},b={class:"mt-10 font-light lg:text-lg text-lg text-neutral-900"},$={class:"mt-10 font-light lg:text-lg text-lg text-neutral-900"},w={class:"mt-10 font-light lg:text-lg text-lg text-neutral-900"},y={class:"mt-10 font-light lg:text-lg text-lg text-neutral-900"},D={class:"mt-10 font-light lg:text-lg text-lg text-neutral-900"};function k(l,e,o,B,R,E){return n(),i("div",null,[h,t("section",_,[t("div",m,[t("div",x,[t("div",v,[p,t("p",f,[s(" Имя: "),t("div",null,a(this.reservation.name),1)]),t("p",b,[s(" Email: "),t("div",null,a(this.reservation.email),1)]),t("p",$,[s(" Услуги: "),(n(!0),i(d,null,u(this.reservation.services,r=>(n(),i("div",null,a(r),1))),256))]),t("p",w,[s(" Мастер: "),t("div",null,a(this.reservation.master),1)]),t("p",y,[s(" Дата: "),t("div",null,a(this.reservation.date),1)]),t("p",D,[s(" Время: "),t("div",null,a(this.reservation.time)+":00",1)])])])])])])}const L=c(g,[["render",k]]);export{L as default};