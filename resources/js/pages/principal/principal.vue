<template>
  <section>
    <h3 class="text-center">Listado de Personas</h3>
    <div class="row">
      <div class="col-md-6 text-left">
        <b-button variant="primary" @click="registrar_persona">Registrar Persona</b-button>
      </div>
      <div class="col-md-6 text-right">
        <b-button @click="listar_ciudades">Listar Ciudades</b-button>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-12">
        <div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Fecha Nacimiento</th>
                <th scope="col">Tipo Documento</th>
                <th scope="col">Documento</th>
                <th scope="col">Ciudad</th>
                <!-- <th colspan="2" scope="col">Acciones</th> -->
              </tr>
            </thead>
            <tbody>
              <tr v-for="(data,p) in personas" :key="p">
                <th scope="row">{{ p + 1}}</th>
                <td>{{data.nombre}}</td>
                <td>{{data.apellido}}</td>
                <td>{{data.fecha_nacimiento}}</td>
                <td>
                  <span v-show="data.tipo_doc == 1">C.C.</span>
                  <span v-show="data.tipo_doc == 2">C.E.</span>
                  <span v-show="data.tipo_doc == 3">T.I</span>
                </td>
                <td>{{data.documento}}</td>
                <td>{{data.ciudad}}</td>

              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <modal-crear ref="modalRegistrarPersona" :ruta="ruta" @persona:registrada="listar_personas"/>
    <!-- <modal-crear ref="modalRegistrarPersona" :ruta="ruta" /> -->
    <modal-editar ref="modalEditarPersona" :ruta="ruta" />

  </section>
</template>
<script>
export default {
  components: {
    ModalCrear:()=> import('./components/modalRegistrarPersona'),
    ModalEditar:()=> import('./components/modalEditarPersona')
  },
  data(){
    return{
      ruta:'/api/personas',
      personas:[],
    }
  },
  mounted(){
    this.listar_personas()
  },
  methods: {
    registrar_persona(){
      this.$refs.modalRegistrarPersona.toggle();
    },
    listar_ciudades(){
      this.$router.push({
        name: 'ciudades.listar'
      })
    },
    async listar_personas() {
      try {
        const {data} = await axios(`${this.ruta}/listar-personas`)
        this.personas = data
      } catch (e) {
        console.warn(e);
      }
    },
  }
}
</script>
<style lang="scss" scoped>
</style>
