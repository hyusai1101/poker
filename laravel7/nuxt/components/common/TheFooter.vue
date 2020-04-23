<template>
    <v-card height="65">
      <v-footer
        fixed
        class="font-weight-medium"
      >
        <v-col
          class="text-center"
          cols="12"
        >
          {{ new Date().getFullYear() }} — <strong>Vuetify</strong>
        </v-col>
      </v-footer>
    </v-card>
</template>
<script>
export default {
  name: 'TheFooter'
}
</script>
