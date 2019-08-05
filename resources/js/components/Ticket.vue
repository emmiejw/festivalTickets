<template>
  <div class="ticket">
    <img class="ticket__img" :src="image" />
    <div class="ticket__body">
      <div class="col-6 ticket__date" style="float:left; ">{{ dateTime | moment(" Do MMMM YYYY")}}</div>
      <div class="col-6 ticket__time" style="float:right;">{{dateTime| moment("ha") }}</div>
      <h5 class="text-center ticket__title">{{ event }}</h5>
      <p class="ticket__desc">{{description}}</p>
      <div class="row content__layout">
        <div v-show="!show" class="col-4 ticket__price">£{{price}}</div>
        <div v-show="!show" class="col-4 ticket__priceinfo">per ticket</div>
        <div v-show="!show" class="col-4">
          <button class="ticket__button" v-on:click="show = !show">BUY TICKETS</button>
        </div>
      </div>
      <div>
        <transition>
          <div class="row" style="margin-top:-40px;">
            <ul>
              <li>
                <select
                  id="quantity"
                  v-model="quantity"
                  name="quantity"
                  class="ticket__dropdown"
                  v-show="show"
                >
                  <option value="1">1 ticket</option>
                  <option value="2">2 tickets</option>
                  <option value="3">3 tickets</option>
                  <option value="4">4 tickets</option>
                  <option value="5">5 tickets</option>
                </select>
              </li>
              <li>
                <div v-show="show" class="ticket__price__total">
                  <p>£{{ quantity * price }}</p>
                </div>
              </li>
              <li>
                <div class="ticket__priceinfo__total" v-show="show">total cost</div>
              </li>
            </ul>

            <div class="row">
              <button
                v-show="show"
                type="submit"
                class="ticket__button__total"
              
                @click="showModal = true; submit();"
                id="show-modal" 
              >BUY TICKETS</button>
            </div>
          </div>
        </transition>
      </div>
      
    </div>
    <modal
     :event="event"
     :quantity="quantity"

     v-if="showModal" 
     @close="showModal = false"
     ></modal>
  </div>
</template>

<script>
import axios from "axios"
import modal from "./modal.vue"

export default {
  components:{
    modal
  },
  props: {
    ticketId: Number,
    image: String,
    event: String,
    dateTime: String,
    description: String,
    price: Number
  },
  data() {
    return {
      quantity: 0,
      show: false,
      showModal: false,
      order:[],
      ticket:[]
    };
  },
  methods: {
    submit() {
      axios
        .post("http://127.0.0.1:8000/api/order", {
          quantity: parseInt(this.quantity),
          ticket_id: this.ticketId,
          event: this.event
        })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    mounted() {
    axios.get("api/order" + order.id).then(response => {
      this.order = response.data;
    });
  }
    }
  }

</script>

<style>
ul {
  list-style: none;
  padding: 0;
}

li {
  display: inline-block;
  margin-left: 5px;
}

.ticket__price {
  font-family: "Playfair Display", serif;
  font-weight: bold;
  font-size: 22px;
}

.ticket__priceinfo {
  margin: 5px;
  padding-top: 5px;
  font-size: 12px;
  width: 100px;
  font-family: "Muli", sans-serif;
  color: #333333;
}
.ticket__button {
  border-radius: 6px;
  margin-left: auto;
  margin-right: auto;
  width: 128px;
  height: 38px;
  padding: 5px;
  background-color: #145d92;
  color: #ffffff;
  font-family: "Muli", sans-serif;
  text-align: center;
  stroke: #979797;
  float: right;
  cursor: default;
  font-size: 14px;
  margin-left: 10px;
}

/* Css for the transition  */

.ticket__dropdown {
  width: 126;
  height: 36;
  font-family: "Muli", sans-serif;
  color: #333333;
  background-color: #ffffff;
  padding: 7px;
  border-radius: 4px;
  /* margin-left: 5px; */
}
.ticket__price__total {
  font-family: "Playfair Display", serif;
  font-weight: bold;
  font-size: 22px;
  padding-left: 50px;
}

.ticket__priceinfo__total {
  font-size: 12px;
  font-family: "Muli", sans-serif;
  color: #333333;
  /* padding-left: 5px; */
}

.ticket__button__total {
  border-radius: 6px;
  margin-left: auto;
  margin-right: auto;
  margin-top: -40px;
  width: 268px;
  height: 38px;
  padding: 5px;
  background-color: #145d92;
  color: #ffffff;
  font-family: "Muli", sans-serif;
  text-align: center;
  stroke: #979797;
}

.ticket__button:hover {
  opacity: 0.7;
}
</style>

