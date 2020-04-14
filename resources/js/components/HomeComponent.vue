<template>
  <div>
    <h1>Lista osób</h1>
    <br />
    <div class="row">
      <div class="col-md-12">
        <h4>Filtry</h4>
      </div>
      <div class="col-md-2">
        <label for="name">Imie</label>
        <input type="text" class="form-control" id="name" v-model="name" />
      </div>
      <div class="col-md-2">
        <label for="culture">Kultura</label>
        <input type="text" class="form-control" id="culture" v-model="culture" />
      </div>
      <div class="col-md-2">
        <label for="gender">Płeć:</label>
        <select id="gender" class="form-control" v-model="gender">
          <option valeu="Female">Female</option>
          <option valeu="Male">Male</option>
        </select>
      </div>
      <div class="col-md-4">
        <br />
        <input type="submit" @click="getResults" class="btn btn-info" value="Filtruj" />
      </div>
    </div>
    <br />
    <table class="table table-dark table-hover">
      <thead>
        <tr>
          <th>Id</th>
          <th>Imie</th>
          <th>Kultura</th>
          <th>Urodzony</th>
          <th>Url</th>
          <th>Płeć</th>
          <th>Tytuły</th>
          <th>Akcje</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="person in personsData.data" :key="person.id">
          <td>{{ person.id }}</td>
          <td>{{ person.name }}</td>
          <td>{{ person.culture }}</td>
          <td>{{ person.born }}</td>
          <td>{{ person.url }}</td>
          <td>{{ person.gender }}</td>
          <td>
            <div v-for="title in person.titles">
              <p>{{title}}</p>
            </div>
          </td>
          <td>
            <router-link
              :to="{name: 'personShow', params: { id: person.id }}"
              class="btn btn-success"
            >Strona</router-link>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="pagination">
      <pagination :limit="3" :data="personsData" @pagination-change-page="getResults"></pagination>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      personsData: {},
      name: "",
      gender: "",
      culture: "",
    };
  },
  created() {
    this.getResults();
  },
  methods: {
    getResults(page) {
      this.$root.loading = true;

      if (typeof page === "undefined") {
        page = 1;
      }

      let uri = "/api/persons?page=" + page + "&name=" + this.name+'&gender='+this.gender+'&culture='+this.culture;

      this.axios.get(uri).then(response => {
        this.personsData = response.data;
        this.$root.loading = false;
      });
    }
  }
};
</script>