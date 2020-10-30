<template>
  <section>
    <modal-b ref="modalCiudad">
      <div slot="header" class="row">
        <div class="col-12">
          <h5>Registrar Ciudad</h5>
        </div>
      </div>

      <div  slot="body" class="">

        <b-form-group
          label-cols-sm="5"
          label="Ciudad:"
          label-align-sm="right"
          label-for="ciudad"
        >
          <b-form-input id="ciudad" v-model="form.nombre_ciudad"></b-form-input>
        </b-form-group>

      </div>

    <div slot="footer" class="">
      <button type="button" class="btn-crear" @click="crear_ciudad">Guardar</button>
      <button type="button" class="btn-cancelar" @click="toggle">Cancelar</button>
    </div>
  </modal-b>
</section>
</template>
<script>
export default {
  props: ['ruta'],
  name: "",
  data(){
    return{
      form:{},
    }
  },
  methods: {
    async crear_ciudad(){
      try {
        const {data} = await axios.post(`${this.ruta}/registrar-ciudad`,this.form)
        this.$emit('ciudad:registrada')
        this.form = ''
        this.$refs.modalCiudad.toggle()

      } catch (e) {
        console.warn(e);
      }
    },
    toggle(){
      this.$refs.modalCiudad.toggle()
    }
  }
}
</script>
<style lang="scss" scoped>
</style>
