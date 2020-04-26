<template>
  <a @click="$router.push('/hand-range/6')">
    <v-card
      class="mx-auto"
      max-width="400"
    >
      <v-img
        class="white--text align-end"
        height="200px"
        :src="require('@/assets/6max-hand-range.png')"
      >
        <v-card-title>6MAX Opening Ranges</v-card-title>
      </v-img>
    </v-card>
  </a>
</template>

<script>
import Logo from "~/components/Logo.vue";
import VuetifyLogo from "~/components/VuetifyLogo.vue";

export default {
  components: {
    Logo,
    VuetifyLogo,
  },
};
</script>
