<template>
  <div class="example">
    <PokerTable />
    <HandRangeDialog />
    {{getterHandRangeData}}
    <v-btn
      @click="test()"
    >
      ログイン
    </v-btn>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import PokerTable from "../../components/PokerTable";
import HandRangeDialog from "../../components/parts/HandRangeDialog";
export default {
  components: {
    PokerTable,
    HandRangeDialog,
  },
  data() {
    return {
      handRanges: [],
      dialog: false,
    };
  },
  computed: {
    ...mapGetters('api-hand-range', [
      'getterHandRangeData'
    ]),
  },
  methods:{
    ...mapActions('api-hand-range', [
      'getHandRange'
    ]),
  }
}
</script>
