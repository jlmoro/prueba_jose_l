<template>
  <section>
    <modal-b ref="modalPersona">
      <div slot="header" class="row">
        <div class="col-12">
          <h5>Registrar Persona</h5>
        </div>
      </div>

      <div  slot="body" class="">


      <b-form-group
        label-cols-sm="5"
        label="Nombre:"
        label-align-sm="right"
        label-for="nombre-per"
      >
        <b-form-input id="nombre-per" v-model="form.nombre"></b-form-input>
      </b-form-group>

      <b-form-group
        label-cols-sm="5"
        label="Apellido:"
        label-align-sm="right"
        label-for="apellido-per"
      >
        <b-form-input id="apellido-per" v-model="form.apellido"></b-form-input>
      </b-form-group>

      <b-form-group
        label-cols-sm="5"
        label="Fecha Nacimiento:"
        label-align-sm="right"
        label-for="fecha_nacimiento"
      >
        <b-form-datepicker id="fecha_nacimiento" v-model="form.fecha_nacimiento" class="mb-2"></b-form-datepicker>
      </b-form-group>

      <b-form-group
        label-cols-sm="5"
        label="Tipo Documento:"
        label-align-sm="right"
        label-for="tipo-doc-per"
      >
        <b-form-select  id="tipo-doc-per" v-model="form.tipo_doc" :options="optionsDoc"></b-form-select>
      </b-form-group>

      <b-form-group
        label-cols-sm="5"
        label="Documento:"
        label-align-sm="right"
        label-for="documento-per"
      >
        <b-form-input type="number" id="documento-per" v-model="form.documento"></b-form-input>
      </b-form-group>

      <b-form-group
        label-cols-sm="5"
        label="Ciudad:"
        label-align-sm="right"
        label-for="ciudad-per"
      >
        <b-form-select id="ciudad-per" v-model="form.id_ciudad" :options="data_ciudades"></b-form-select>

      </b-form-group>


    </b-form-group>

      </div>

      <div slot="footer" class="">
        <b-button variant="primary" @click="crear_persona">Guardar</b-button>
        <button type="button" class="btn-cancelar"  @click="toggle">Cancelar</button>
      </div>

    </modal-b>
  </section>
</template>
<script>
export default {
  props: ['ruta',],
  data(){
    return{
      data_ciudades:[],
      optionsDoc: [
        { value: 1, text: 'C.C.' },
        { value: 2, text: 'C.E.' },
        { value: 3, text: 'T.I.' }
      ],
      form:{
        fecha_nacimiento:'',
        tipo_doc:null,

      }
    }
  },
  mounted(){
    this.listar_ciudades()
  },
  methods: {
    async crear_persona(){
      try {
        const {data} = await axios.post(`${this.ruta}/registrar-persona`,this.form)
        this.$emit('persona:registrada')
        this.form = ''
        this.$refs.modalPersona.toggle()
      } catch (e) {
        console.warn(e);
      }
    },
    async listar_ciudades(){
      try {
        const {data} = await axios(`${this.ruta}/listar-ciudades`)
        this.data_ciudades = data
      } catch (e) {
        console.warn(e);
      }
    },
    toggle(){
      this.$refs.modalPersona.toggle()
    }
  }
}
</script>
<style lang="scss" scoped>
</style>
