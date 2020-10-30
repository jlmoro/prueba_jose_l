<template>
  <section>
    <h3 class="text-center">Listar ciudades</h3>
    <div class="row">
      <div class="col-md-6 text-left">
        <b-button variant="primary" @click="modalRegistrarCiudad">Registrar Ciudad</b-button>
      </div>
      <div class="col-md-6 text-right">
        <b-button @click="listar_personas">Listar Personas</b-button>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-12">
        <div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Ciudad</th>
                <!-- <th colspan="2" scope="col">Acciones</th> -->
              </tr>
            </thead>
            <tbody>
              <tr v-for="(data,c) in ciudades" :key="c">
                <th scope="row">{{ c + 1}}</th>
                <td>{{data.text}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <modal-crear ref="modalRegistrarCiudad" :ruta="ruta" @ciudad:registrada="listar_ciudades" />
    <modal-editar ref="modalEditarCiudad" :ruta="ruta" />

  </section>
</template>
<script>
export default {
  components: {
    ModalCrear:()=> import('./components/modalRegistrarCiudad'),
    ModalEditar:()=> import('./components/modalEditarCiudad')
  },
  name: "",
  data(){
    return{
      ruta:'/api/personas',
      ciudades:[],
    }
  },
  mounted(){
    this.listar_ciudades()
  },
  methods: {
    async listar_ciudades() {
      try {
        const {data} = await axios(`${this.ruta}/listar-ciudades`)
        this.ciudades = data
      } catch (e) {
        console.warn(e);
      }
    },
    listar_personas(){
      this.$router.push({
        name: 'principal.listar'
      })
    },
    modalRegistrarCiudad() {
      this.$refs.modalRegistrarCiudad.toggle()
    }
  }
}
</script>
<style lang="scss" scoped>
</style>
