<template>
  <transition name="modal" v-bind:class="{'is-active': modalState}"
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container">
          <button
            style="float:right; background-color:white; border: none;"
            @click="$emit('close')"
          >X</button>
          <div class="modal-header">
            <slot name="header">
              <h3>Thank you for purchasing {{ this.quantity}} tickets for {{ this.event}}</h3>
            </slot>
          </div>

          <div class="modal-body">
            <slot name="body">
              <p>You'll recieve an email shortly containing your booking receipt. We look forward to seeing you there!</p>
              
            </slot>
          </div>
          <br />
          <div class="modal-footer">
            <slot name="footer">
              <button class="modal-default-button" @click="$emit('close')">OKAY, GOT IT!</button>
            </slot>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
import axios from "axios";

export default {
  props: [
    'event',
    'quantity'
  ],
  data() {
    return {
      order: [],
      modalState: false
    };
  }
};
</script>

<style>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 509px;
  height: 347px;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
}

.modal-header {
  margin-top: 70px;
  text-align: center;
  color: #145d92;
  font-family: "Playfair Display", serif;
  font-weight: bold;
  font-size: 24px;
}

.modal-body {
  margin: 20px 0;
  text-align: center;
  font-family: "Muli", sans-serif;
  color: #333333;
}

.modal-default-button {
  border-radius: 6px;
  margin-left: 120px;
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

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>

