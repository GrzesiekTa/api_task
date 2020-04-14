<template>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div
          class="alert alert-success spacing"
          role="alert"
          v-show="successMessage"
        >{{successMessage}}</div>
        <div class="alert alert-danger spacing" role="alert" v-show="errorMessage">{{errorMessage}}</div>
      </div>

      <div class="col-12">
        <h1>Prezentacja</h1>
        <hr />
        <div>
          <p v-show="editableFields.name" @click="switchNameTag('name')">
            Imie:
            <b>{{person.name}}</b>
          </p>
          <input
            class="form-control"
            v-show="!editableFields.name"
            @keyup.enter="switchNameTag('name')"
            v-model="person.name"
          />
        </div>
        <hr />
        <div>
          <p v-show="editableFields.gender" @click="switchNameTag('gender')">
            Płeć:
            <b>{{person.gender}}</b>
          </p>
          <select
            v-show="!editableFields.gender"
            id="gender"
            class="form-control"
            v-model="person.gender"
            @change="switchNameTag('gender')"
          >
            <option valeu="Female">Female</option>
            <option valeu="Male">Male</option>
          </select>
        </div>
        <hr />
        <div>
          <p v-show="editableFields.culture" @click="switchNameTag('culture')">
            Kultura:
            <b>{{person.culture}}</b>
          </p>
          <input
            class="form-control"
            v-show="!editableFields.culture"
            @keyup.enter="switchNameTag('culture')"
            v-model="person.culture"
          />
        </div>
        <hr />
        <div>
          Urodzony:
          <b>{{person.born}}</b>
        </div>
        <hr />
        <div>
          Zmarły:
          <b>{{person.died}}</b>
        </div>
        <hr />
        <div>
          Pleneta:
          <b>{{person.planet}}</b>
        </div>
        <hr />
        <div>
          Gatunek:
          <b>{{person.type}}</b>
        </div>
        <hr />
        <div v-show="person.usedVehicles">
          <p>Używane pojazdy :</p>
          <div v-for="vehicle in person.usedVehicles">
            <span>
              <b>{{vehicle}}</b>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      person: {},
      errors: [],
      errorMessage: null,
      successMessage: null,
      editableFields: {
        name: true,
        culture: true,
        gender: true
      }
    };
  },
  created() {
    let uri = `/api/persons/${this.$route.params.id}`;
    this.axios.get(uri).then(response => {
      this.person = response.data;
    });
  },
  methods: {
    switchNameTag: function(fieldName) {
      console.log(fieldName);
      this.editableFields[fieldName] = !this.editableFields[fieldName];

      if (this.editableFields[fieldName]) {
        this.updatePerson();
      }
    },
    updatePerson() {
      this.successMessage = null;
      let uri = `/api/persons/${this.$route.params.id}`;
      this.axios
        .put(uri, this.person)
        .then(response => {
          this.showSuccessMessageAndHideAfterTime(
            3000,
            "Success! Zaktualizowano dane"
          );
        })
        .catch(error => {
          if (error.response.status === 422) {
            this.errors = [];
            const errors = error.response.data.errors;
            for (var key in errors) {
              this.errors[key] = errors[key][0];
            }
            return;
          }

          if (error.response.data.message != "undefined") {
            this.errorMessage = error.response.data.message;
          }
        });
    },

    showSuccessMessageAndHideAfterTime(time, message) {
      this.successMessage = message;
      this.errorMessage = null;
      this.errors = [];

      setTimeout(() => {
        this.successMessage = null;
      }, time);
    }
  }
};
</script>
