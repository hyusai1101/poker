<template>
  <div>
    <div class="ellipse">
      <a @click="dialog = true"> <img src="/human.png"
class="human"
/></a>
    </div>

    <v-app id="inspire">
      <v-row justify="center">
        <v-btn color="primary" dark @click.stop="dialog = true">
          Open Dialog
        </v-btn>

        <v-dialog v-model="dialog" max-width="290">
          <v-card>
            <v-card-title
class="headline">
              Use Google's location service?
            </v-card-title>

            <table class="table table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th>A</th>
                  <th>K</th>
                  <th>Q</th>
                  <th>J</th>
                </tr>
              </thead>
              <tbody>
                <td>A</td>
                <td>K</td>
                <td>Q</td>
                <td>J</td>
              </tbody>
            </table>
            <v-card-text>
              Let Google help apps determine location. This means sending
              anonymous location data to Google, even when no apps are running.
            </v-card-text>

            <v-card-actions>
              <v-spacer />

              <v-btn color="green darken-1" text @click="dialog = false">
                Disagree
              </v-btn>

              <v-btn color="green darken-1" text @click="dialog = false">
                Agree
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-row>
    </v-app>
  </div>
</template>
<script>
export default {
  name: "PokerTable",
  data() {
    return {
      dialog: false,
      handranges: [{ name: "田中", name: "田中" }],
    };
  },
  methods: {
    clickDialog() {
      console.log("sss");
      alert("aaa");
    },
  },
};
</script>

<style scoped>
.ellipse {
  margin: 0 auto;
  width: 700px;
  height: 400px;
  position: absolute;
  background: rgb(58, 95, 60);
  border-radius: 50%;
  border-style: solid;
  border-width: 10px;
  border-color: #000000 #000000 #000000 #000000;
}

.human {
  width: 200px;
  height: 200px;
  position: relative;
}
</style>
