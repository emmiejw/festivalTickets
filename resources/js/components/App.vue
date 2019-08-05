<template>
  <div class="layout">
    <div v-for="ticket in tickets" :key="ticket.id">
      <Ticket
        :ticketId="ticket.id"
        :image="ticket.image"
        :event="ticket.event"
        :dateTime="ticket.dateTime"
        :description="ticket.description"
        :price="ticket.price"
      ></Ticket>
    </div>
  </div>
</template>

<script>
import axios from "axios"
import Ticket from "./Ticket.vue"
import modal from "./modal.vue"



export default {
  components: {
    Ticket,
    modal
  },
  data() {
    return {
      tickets: [],
      quantity: "",
      show: false,

    };
  },

  mounted() {
    axios.get("api/tickets").then(response => {
      this.tickets = response.data;
    });
  }
};
</script>
<style>
body {
  margin: 10%;
  background-color: #ffffff;
  height: 1024px;
  width: 1440px;
}
.layout {
  display: flex;
  justify-content: center;
  margin: 10px;
}
.content__layout {
  display: flex;
  justify-content: center;
  margin: 10px;
}
.ticket {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.05);
  background-color: #ffffff;
  border-radius: 6px;
  width: 300px;
  height: 484px;
  margin: 10px;
  font-family: arial;
}

.ticket__body {
  padding: 13px;
}
.ticket__img {
  height: 204px;
  width: 300px;
  border-top-left-radius: 6px;
  border-top-right-radius: 6px;
}

.ticket__title {
  /* padding-top: 10px; */
  color: #145d92;
  font-size: 22px;
  font-weight: bold;
  font-family: "Playfair Display", serif;
}

.ticket__desc {
  font-family: "Muli", sans-serif;
  margin-top: -30px;
}

.ticket__date,
.ticket__time {
  color: #ababab;
  font-size: 14px;
  font-family: "Muli", sans-serif;
}

.ticket:hover {
  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.05);
}

.slide-fade-enter-active {
  transition: all 0.3s ease;
}
.slide-fade-leave-active {
  transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}

@media only screen and (max-width: 600px ) {
  body {
  margin: 30px;
  background-color: #ffffff;
  max-width: 400px;
}
  
  .layout {
    display: block;
  width: 400px;

  }
  .ticket{
    margin-bottom: 30px;
  }

  .modal-container {
  width: 270px;
  height: 320px;
  margin-left:  60px;
  padding: 7px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
}
.modal-header {
  margin-top: 40px;
  padding-left: 7px;
  padding-right: 7px;

  text-align: center;
  color: #145d92;
  font-family: "Playfair Display", serif;
  font-weight: bold;
  font-size: 18px;
}
.modal-body {
  margin: 10px 0;
  text-align: center;
  font-family: "Muli", sans-serif;
  color: #333333;
  padding-left: 7px;
  padding-right: 7px;
}

.modal-default-button {
  border-radius: 6px;
  margin-left: 55px;
  margin-right: auto;
  margin-top: -40px;
  width: 168px;
  height: 38px;
  padding: 5px;
  background-color: #145d92;
  color: #ffffff;
  font-family: "Muli", sans-serif;
  text-align: center;
  stroke: #979797;
}


}

</style>



