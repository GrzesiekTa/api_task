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
        <p>
          <span class="attention">*</span>Kliknij dwa razy aby edytować.
        </p>
        <h1>Szczegóły postaci</h1>
        <hr />
        <div>
          <p v-show="editableFields.name" class="cursor-pointer" @dblclick="switchNameTag('name')">
            Imie:
            <span class="attention">*</span>
            <b>{{person.name}}</b>
          </p>
          <input
            required
            class="form-control"
            v-show="!editableFields.name"
            @keyup.enter="switchNameTag('name')"
            v-model="person.name"
          />
          <div class="input-error" v-if="fieldsErrors.name">{{fieldsErrors.name}}</div>
        </div>
        <hr />
        <div>
          <p
            v-show="editableFields.gender"
            class="cursor-pointer"
            @dblclick="switchNameTag('gender')"
          >
            Płeć:
            <span class="attention">*</span>
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
          <div class="input-error" v-if="fieldsErrors.gender">{{fieldsErrors.gender}}</div>
        </div>
        <hr />
        <div>
          <p
            v-show="editableFields.culture"
            class="cursor-pointer"
            @dblclick="switchNameTag('culture')"
          >
            Kultura:
            <span class="attention">*</span>
            <b>{{person.culture}}</b>
          </p>
          <input
            class="form-control"
            v-show="!editableFields.culture"
            @keyup.enter="switchNameTag('culture')"
            v-model="person.culture"
          />
          <div class="input-error" v-if="fieldsErrors.culture">{{fieldsErrors.culture}}</div>
        </div>
        <hr />
        <div>
          <p v-show="editableFields.born" class="cursor-pointer" @dblclick="switchNameTag('born')">
            Urodzony:
            <span class="attention">*</span>
            <b>{{person.born}}</b>
          </p>
          <input
            class="form-control"
            v-show="!editableFields.born"
            @keyup.enter="switchNameTag('born')"
            v-model="person.born"
          />
          <div class="input-error" v-if="fieldsErrors.born">{{fieldsErrors.born}}</div>
        </div>
        <hr />
        <div>
          <p v-show="editableFields.died" class="cursor-pointer" @dblclick="switchNameTag('died')">
            Zmarły:
            <span class="attention">*</span>
            <b>{{person.died}}</b>
          </p>
          <input
            class="form-control"
            v-show="!editableFields.died"
            @keyup.enter="switchNameTag('died')"
            v-model="person.died"
          />
          <div class="input-error" v-if="fieldsErrors.died">{{fieldsErrors.died}}</div>
        </div>
        <hr />
        <div v-if="person.planet">
          <h4>Pleneta:</h4>
          <p>
            <b>{{ person.planet.name }}</b>
          </p>
          <p>{{person.planet.description}}</p>
        </div>
        <hr />
        <div v-if="person.type">
          <h4>Gatunek:</h4>
          <p>
            <b>{{person.type.name}}</b>
          </p>
          <p>{{person.type.description}}</p>
        </div>
        <hr />
        <div v-if="person.vehicles" v-show="person.vehicles.length">
          <h4>Używane pojazdy:</h4>
          <div v-for="vehicle in person.vehicles">
            <p>
              <b>{{vehicle.name}}</b>
            </p>
            <p>{{vehicle.description}}</p>
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
      fieldsErrors: [],
      errorMessage: null,
      successMessage: null,
      editableFields: {
        name: true,
        culture: true,
        gender: true,
        born: true,
        died: true
      }
    };
  },
  created() {
    let uri = `/api/persons/${this.$route.params.id}`;
    this.axios
      .get(uri)
      .then(response => {
        this.person = response.data;
      })
      .catch(error => {
        if (error.response.status === 404) {
          this.$router.push({ name: "404" });
        }
      });
  },
  methods: {
    switchNameTag: function(fieldName) {
      if (this.person.died === null || !this.person.died.length) {
        this.errorMessage = "Możesz edytować tylko postacie które umarły.";
        return;
      }

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
            this.fieldsErrors = [];

            const errors = error.response.data.errors;

            for (var key in errors) {
              this.fieldsErrors[key] = errors[key][0];
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
      this.fieldsErrors = [];

      setTimeout(() => {
        this.successMessage = null;
      }, time);
    }
  }
};
</script>
<style>
.input-error {
  color: #fff;
  background: 9px 9px no-repeat #cc3b3b;
  padding: 5px 15px 3px 25px;
  font-size: 13px;
  border-radius: 2px;
  margin: 12px 0 0;
  text-align: center;
}
.attention {
  color: #cc3b3b;
  font-weight: 900;
}
.cursor-pointer {
  cursor: pointer;
}
</style>