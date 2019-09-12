<template>
  <div id="vurud">
    <p :class="{hidden: hasErrors}" class="text-center alert alert-danger">
      Please fill all the fields
    </p>
    <div class="container">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" v-model="newItem.name">
      </div>
      <div class="form-group">
        <label for="">Age</label>
        <input type="Number" name="age" id="age" class="form-control" placeholder="Enter Age" v-model="newItem.age">
      </div>
      <div class="form-group">
        <label for="">Profession</label>
        <input type="text" name="profession" id="profession" class="form-control" placeholder="Enter Profession" v-model="newItem.profession">
      </div>
      <button type="submit" class="btn btn-primary" @click.prevent="createItem()">+Add</button>
  </div>
  </div>
</template>

<script>
import { log } from 'util';
export default {
  data() {
    return {
      newItem: {
        'name': '',
        'age': '',
        'profession': ''
      },
    // hasErrors: false
    }
  },
  methods: {
    createItem() {
      let input = this.newItem
      let vm = this
      
      if(input['name'] == '' ||input['age'] == ''||input['profession'] == '') {
        this.hasErrors = false;
      }
      else {
        this.hasErrors = true;
        axios.post('/storeItem', input)
          .then(res => {
            vm.newItem = {'name': '', 'age': '', 'profession': ''}
            vm.getItems();

          })
      }
    }
  }
}
</script>

<style scoped>
  body{
    background-color: black;
  }
</style>